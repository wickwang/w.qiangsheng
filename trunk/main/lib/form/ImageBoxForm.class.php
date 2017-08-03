<?php

/**
 * ImageBox form.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
class ImageBoxForm extends BaseImageBoxForm {

    public function configure() {
        $obj = $this->getObject();
        $this->widgetSchema['box_type_text'] = new sfWidgetFormPlain(array('default' => self::getBoxTypeName()));
        if (is_object($obj)) {
            $this->widgetSchema['image_src'] = new sfWidgetFormInputFileEditable(array(
                        'label' => 'Image',
                        'file_src' => $this->getObject()->getImagePath(),
                        'is_image' => true,
                        'edit_mode' => !$this->isNew(),
                        'delete_label' => '移除现在的图片',
                        'template' => '<table id="image_upload_table">
                            <tr><td>' . $this->getImageLinkHtml('image_src') . '</td></tr>
                            <tr><td>%input%</td></tr>
                            <tr><td>图片类型:*.jpg,png 图片尺寸:'.$obj->getWidth().'px 宽，'.$obj->getHeight().'px 高 图片大小：2MB</td></tr>
                            <tr><td>%delete% %delete_label%</td></tr>
                        </table>
                        ',
                    ));
            $this->validatorSchema['image_src'] = new mysfValidatorFileImage(array(
                        'required' => false,
                        'mime_types' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/jpg'),
                        'max_size' => 1024 * 1024 * 2,
                        'size_x' => $obj->getWidth(),
                        'size_y' => $obj->getHeight(),
                    ));

            $this->validatorSchema['image_src_delete'] = new sfValidatorPass();
        }
    }

    private function getImageLinkHtml($img_src_field) {
        $obj = $this->getObject();
        
        switch ($img_src_field) {
            case 'image_src':
                $img_file_name = $this->getObject()->getImageSrc() ? true : false;
                $img_src = '/uploads/image_box/' . $this->getObject()->getId() . '/' . $this->getObject()->getImageSrc();
                $filebasepath = $this->getObject()->getImageBasePath() . DIRECTORY_SEPARATOR . $this->getObject()->getImageSrc();
                $width = (is_object($obj) ? ceil($obj->getWidth()/2) : 0);
                $height = (is_object($obj) ? ceil($obj->getHeight()/2) : 0);
                break;
            default:
                break;
        }

        if (file_exists($filebasepath) && $img_file_name) {
            $result = '<img src="' . $img_src . '" width="' . $width . '" height="' . $height . '"/><br /><br />';
        } else {
            $result = '';
        }

        return $result;
    }

    public function doSave($con = null) {
        $o = $this->getObject();
        // check if need delete current one
        if (isset($_POST['image_box']['image_src_delete']) || (isset($_FILES['image_box']['name']['image_src']) && $_FILES['image_box']['name']['image_src'] != '' && !$o->isNew())) {
            $o->deleteImage('image_src');
        }
        // save first, so we get id for image path\
        parent::doSave($con);
        // process images
        $this->processImage();
    }

    private function processImage() {
        $o = $this->getObject();
        // upload if need
        $files = $_FILES['image_box'];
        $dest_base_path = $o->getImageBasePath();

        if ($files['error']['image_src'] == UPLOAD_ERR_OK) {
            // get file extension
            $tmep_c = explode('.', $files['name']['image_src']);
            $file_extension_c = $tmep_c[count($tmep_c) - 1];
            $image_secrect_c = md5(uniqid(rand())) . '.' . $file_extension_c;

            $image_path_c = $files['tmp_name']['image_src'];
            $o->setImageSrc($image_secrect_c);
            $o->save();
            if (is_file($image_path_c)) {
                $target_path_c = $dest_base_path . DIRECTORY_SEPARATOR . $image_secrect_c;
                @mkdir($dest_base_path . '/', 0777, true);
                move_uploaded_file($image_path_c, $target_path_c);
                @unlink($image_path_c);
            }
        }
    }
    
    private function getBoxTypeName(){
        $obj = BoxTypePeer::retrieveByPK($this->getObject()->getBoxTypeId());
        return is_object($obj) ? $obj->getValue() : "";
    }

}
