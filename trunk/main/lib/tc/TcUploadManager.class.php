<?php

/**
 * @uses
 * $tc_upload_manager = new TcUploadManager($object, 1);
 * $base_path = $tc_upload_manager->getBasePath();
 * 
 */
class TcUploadManager{
    
    private $accessory_path;
    
    public function __construct($object) {
        $this->accessory_path = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'accessory';
        $this->object = $object;
    }
    
    public function getBasePath() {
        $raw_peer = $this->object->getPeer();
        $peer = is_a($raw_peer, 'sfOutputEscaperObjectDecorator') ? $raw_peer->getRawValue() : $raw_peer;
        $hashing_path = $this->HashingPath($this->object->getId());

        $result = $this->accessory_path . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR .$hashing_path. DIRECTORY_SEPARATOR . $this->object->getId();
        return $result;
    }
    
    public function getBasePathDir() {
        $raw_peer = $this->object->getPeer();
        $peer = is_a($raw_peer, 'sfOutputEscaperObjectDecorator') ? $raw_peer->getRawValue() : $raw_peer;
        $hashing_path = $this->HashingPath($this->object->getId());
        $temp_hashing_path = explode(DIRECTORY_SEPARATOR, $hashing_path);
        $result = $this->accessory_path . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR .$temp_hashing_path[0];
        return $result;
    }
    
    public function getBaseUrl() {
        $raw_peer = $object->getPeer();
        $peer = is_a($raw_peer, 'sfOutputEscaperObjectDecorator') ? $raw_peer->getRawValue() : $raw_peer;
        $table_name = $peer::TABLE_NAME;
        $hashing_path = $this->HashingPath($object->getId());
        $result = '/uploads/accessory/';
        
        $code = $this->upload_block->getCode();
        $result .= '/'.$table_name . '/files/' . $hashing_path. '/' . $this->object->getId();
        return $result;
    }

    
    public function deleteObject() {
        $bath_path = $this->getBasePath();
        UtilsFile::deleteDirectory($bath_path);
    }
    
    /**
     * Get folder hashing path, design for 256*256=65536 folders as containers
     * 
     * @param type $key
     * @return string of 2 levels folder path
     */
    public function HashingPath($key, $is_url=false) {
        $hash_str = md5($key);
        $level = 2;
        $hash_dir = array();
        for ($i = 0; $i < $level; $i++) {
            $hash_dir[] = substr($hash_str, $i, 2);
        }
        
        return $is_url ? implode('/', $hash_dir) : implode(DIRECTORY_SEPARATOR, $hash_dir);;
    }
    
    public function getMultiUploadFiles(){
        $c = new Criteria();
        $c->add(UploadFilePeer::UPLOAD_BLOCK_ID,$this->upload_block->getId());
        $c->add(UploadFilePeer::OBJECT_ID,  $this->object->getId());
        return UploadFilePeer::doSelect($c);
    }
    
    public function getUrl(){
        return '/landing.php/f/get/'. $this->upload_register->getId().'/'. $this->object->getId();
    }
    
    public function deletelUrl(){
        return '/landing.php/f/delete/' . $this->upload_register->getId() . '/' .$this->getId();
    }
}
?>
