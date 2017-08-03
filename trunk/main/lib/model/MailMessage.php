<?php

/**
 * Skeleton subclass for representing a row from the 'mail_message' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class MailMessage extends BaseMailMessage {

    public function getMessage() {
        $msg = stream_get_contents(parent::getMessage());
        return $msg;
    }

}

// MailMessage
