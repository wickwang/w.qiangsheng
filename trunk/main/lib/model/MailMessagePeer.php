<?php

/**
 * Skeleton subclass for performing query and update operations on the 'mail_message' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class MailMessagePeer extends BaseMailMessagePeer {

    public static function getSpooledMessages() {
        return self::doSelect(new Criteria());
    }

}

// MailMessagePeer
