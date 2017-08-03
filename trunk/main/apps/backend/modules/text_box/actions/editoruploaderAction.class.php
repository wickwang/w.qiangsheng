<?php

class editoruploaderAction extends sfAction {

    public function execute($request) {
        KindeditorUploader::process();
    }

}

?>