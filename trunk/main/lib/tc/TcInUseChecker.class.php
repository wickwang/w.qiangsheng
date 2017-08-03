<?php


/**
 *
 */
class TcInUseChecker {
    
    // given in use check obj
    private $obj;
    
    // given in use check array( name => fk in propel ), or array( name => array(fk1,fk2) in propel )
    private $fks;
    
    // PK in Propel function name format
    private $pk;
    
    // in use bool
    private $is_in_use = false;
    
    // fk linked in use by object
    private $fk_obj = null;
    
    // detailed in use message
    private $msg;
    
    public function __construct($obj, $fks, $pk='Id'){
        $this->obj = $obj;
        $this->fks = $fks;
        $this->pk = $pk;
    }
    
    public function check(){
        foreach($this->fks as $k => $fk){
            
            // multi
            if(is_array($fk)){
                foreach ($fk as $_fk) {

                    $this->fk_obj = $this->_check($_fk);
                    if($this->fk_obj){
                        $this->is_in_use = true;
                        $this->msg = 'The item is in use by '.$k.' ['.$this->fk_obj->__toString().']';
                        break;
                    }
            
                }
            // single    
            }else{
                
                    $this->fk_obj = $this->_check($fk);
                    if ($this->fk_obj) {
                        $this->is_in_use = true;
                        $this->msg = 'The item is in use by ' . $k . ' [' . $this->fk_obj->__toString() . ']';
                        break;
                    }

            
            }
        }
    }
    
    public function getMsg(){
        return $this->msg;
    }
    
    public function getIsInUse(){
        return $this->is_in_use;
    }
    
    public function getFkObj(){
        return $this->fk_obj;
    }
    
    private function _check($fk){
        $table = self::getFkTable($fk);

        $c = new Criteria();
        eval('$c->add('.$fk.', $this->obj->get'.$this->pk.'());');
        eval('$fk_obj = '.$table.'::doSelectOne($c);');
        return $fk_obj;
    }
    
    private static function getFkTable($fk){
        $parts = explode('::', $fk);
        return $parts[0];
    }
    
}

?>
