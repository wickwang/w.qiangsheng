<?php

/**
 * simple messager based on sf session
 *
 * @author Bob
 */
class TcMessager {
    
    const ATTR_NAME = '_tc_messager_holder';
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'error';
    
    /**
     * add a message
     * 
     * @uses
     * 
     * TcMessager::add('I am a message');                // default as success message
     * TcMessager::add('I am a message', TcMessager::TYPE_SUCCESS);     // added as a success message
     * TcMessager::add('I am a message', TcMessager::TYPE_ERROR);       // added as an error message
     * 
     * 
     * 
     * @param string $message  message body
     * @param string $type     message type     
     */
    public static function add($message, $type=TcMessager::TYPE_SUCCESS){
        $_tc_messager_holder = sfContext::getInstance()->getUser()->getAttribute(self::ATTR_NAME);
        $_tc_messager_holder[] = array($type, $message);
        sfContext::getInstance()->getUser()->setAttribute(self::ATTR_NAME, $_tc_messager_holder);
    }
    
    /**
     * get all messages
     * 
     * $messages = TcMessager::getMessages();
     * foreach($messages as $type=>$message){
     * ...
     * }
     * 
     * @return array of message
     */
    public static function getMessages(){
        $_tc_messager_holder = sfContext::getInstance()->getUser()->getAttribute(self::ATTR_NAME);
        self::clear();
        return is_array($_tc_messager_holder) ? $_tc_messager_holder : array();
    }
    
    /**
     * Remove all messages
     */
    private static function clear(){
        sfContext::getInstance()->getUser()->setAttribute(self::ATTR_NAME, null);           
    }
    
}

?>
