<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Send emails stored in a queue.
 *
 * @package    symfony
 * @subpackage task
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfProjectSendEmailsTask.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminSendEmailsTask extends sfBaseTask {

    /**
     * @see sfTask
     */
    protected function configure() {
        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', true),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('message-limit', null, sfCommandOption::PARAMETER_OPTIONAL, 'The maximum number of messages to send', 0),
            new sfCommandOption('time-limit', null, sfCommandOption::PARAMETER_OPTIONAL, 'The time limit for sending messages (in seconds)', 0),
        ));

        $this->namespace = 'admin';
        $this->name = 'send-emails';

        $this->briefDescription = 'Sends emails stored in a queue';

        $this->detailedDescription = <<<EOF
The [admin:send-emails|INFO] sends emails stored in a queue:

  [php symfony admin:send-emails|INFO]

You can limit the number of messages to send:

  [php symfony admin:send-emails --message-limit=10|INFO]

Or limit to time (in seconds):

  [php symfony admin:send-emails --time-limit=10|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);

        $spool = $this->getMailer()->getSpool();
        $spool->setMessageLimit($options['message-limit']);
        $spool->setTimeLimit($options['time-limit']);

        $sent = $this->getMailer()->flushQueue();

        $this->logSection('project', sprintf('sent %s emails', $sent));
    }

    protected function getMailer() {
        if (!$this->mailer) {
            $this->mailer = $this->initializeMailer();
        }

        return $this->mailer;
    }

    protected function initializeMailer() {
        require_once sfConfig::get('sf_symfony_lib_dir') . '/vendor/swiftmailer/classes/Swift.php';
        Swift::registerAutoload();
        sfMailer::initialize();

        $delivery_strategy = "spool";

        $options = (array(
            'class' => 'sfMailer',
            'charset' => 'UTF-8',
            'logging' => false,
            'spool_class' => 'Swift_PropelSpool',
            'spool_arguments' => array('MailMessage', 'message', 'getSpooledMessages'),
            'delivery_strategy' => $delivery_strategy,
            'transport' => array(
                'class' => 'Swift_SmtpTransport',
                'param' => array(
                    'host' => SettingGeneralPeer::getSetting()->getSystemEmailSmtpHost(),
                    'port' => SettingGeneralPeer::getSetting()->getSystemEmailSmtpPort(),
                    'encryption' => SettingGeneralPeer::getSystemEmailSmtpUseSslStatus(),
                    'username' => SettingGeneralPeer::getSetting()->getSystemEmailSmtpUsername(),
                    'password' => SettingGeneralPeer::getSetting()->getSystemEmailSmtpPassword(),
                ),
                )));

        return new sfMailer($this->dispatcher, $options);
    }

}
