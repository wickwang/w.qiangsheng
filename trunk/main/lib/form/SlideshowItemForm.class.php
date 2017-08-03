<?php

/**
 * SlideshowItem form.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
class SlideshowItemForm extends BaseSlideshowItemForm {

    public function configure() {
        $this->widgetSchema['slideshow_id'] = new sfWidgetFormSelect(array('choices' => self::buildMenuOptions()));
        if (!$this->isNew()) {
            $o = $this->getObject();
            $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
                        'label' => 'Image',
                        'file_src' => $this->getObject()->getImagePath(),
                        'is_image' => true,
                        'edit_mode' => !$this->isNew(),
                        'delete_label' => '移除现在的图片',
                        'template' => '<table id="image_upload_table">
                            <tr><td>' . $this->getImageLinkHtml() . '</td></tr>
                            <tr><td>%input%</td></tr>
                            <tr><td>图片类型:*.jpg,png 图片尺寸:' . $o->getSlideshow()->getImageWidth() . 'px 宽，' . $o->getSlideshow()->getImageHeight() . 'px 高  图片大小: 2MB</td></tr>
                            <tr><td>%delete% %delete_label%</td></tr>
                        </table>
                        ',
                    ));
            $this->validatorSchema['photo'] = new mysfValidatorFileImage(array(
                        'required' => false,
                        'mime_types' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/jpg'),
                        'max_size' => 1024 * 1024 * 2,
                        'size_x' => $o->getSlideshow()->getImageWidth(),
                        'size_y' => $o->getSlideshow()->getImageHeight(),
                    ));
        } else {
            $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
                        'label' => 'Image',
                        'file_src' => $this->getObject()->getImagePath(),
                        'is_image' => true,
                        'edit_mode' => !$this->isNew(),
                        'delete_label' => '移除现在的图片',
                        'template' => '<table id="image_upload_table">
                            <tr><td>' . $this->getImageLinkHtml() . '</td></tr>
                            <tr><td>%input%</td></tr>
                            <tr><td>%delete% %delete_label%</td></tr>
                        </table>
                        ',
                    ));
            $this->validatorSchema['photo'] = new sfValidatorFileImage(array(
                        'required' => false,
                        'mime_types' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/jpg'),
                        'max_size' => 1024 * 1024 * 2,
                    ));
        }

        $this->validatorSchema['photo_delete'] = new sfValidatorPass();
    }

    private function getImageLinkHtml() {
        if ($this->getObject()->getImageToken()) {
            $basepath = $this->getObject()->getImageBasePath();
            if (file_exists($basepath . DIRECTORY_SEPARATOR . $this->getObject()->getImageToken())) {
                $result = '<img src="/uploads/slideshow_item/' . $this->getObject()->getId() . '/' . $this->getObject()->getImageToken() . '" width="700" height="253"/><br /><br />';
            } else {
                $result = '';
            }
        } else {
            $result = '';
        }
        return $result;
    }

    public function doSave($con = null) {
        $o = $this->getObject();
        // check if need delete current one
        if (isset($_POST['slideshow_item']['photo_delete']) || (isset($_FILES['slideshow_item']['name']['photo']) && $_FILES['slideshow_item']['name']['photo'] != ''  && !$o->isNew())) {
            $o->deleteImage();
        }
        // save first, so we get id for image path
        parent::doSave($con);
        // process images
        $this->processImage();
    }

    private function processImage() {
        $o = $this->getObject();

        // upload if need
        $files = $_FILES['slideshow_item'];
        $dest_base_path = $o->getImageBasePath();
        if ($files['error']['photo'] == UPLOAD_ERR_OK) {
            $tmep_e = explode('.', $files['name']['photo']);
            $file_extension = $tmep_e[count($tmep_e) - 1];
            $image_secrect = md5(uniqid(rand())) . '.' . $file_extension;

            $image_path = $files['tmp_name']['photo'];
            $o->setImageToken($image_secrect);
            $o->setPhoto('');
            $o->save();
            if (is_file($image_path)) {
                $target_path = $dest_base_path . DIRECTORY_SEPARATOR . $image_secrect;
                @mkdir($dest_base_path . '/', 0777, true);
                move_uploaded_file($image_path, $target_path);
                @unlink($image_path);
            }
        }
    }

    public static function buildMenuOptions() {
        if (isset($_SESSION['slideshow_id'])) {
            $result = array();
            if (SlideshowPeer::retrieveByPK($_SESSION['slideshow_id'])) {
                $slideshows = SlideshowPeer::retrieveByPK($_SESSION['slideshow_id']);
                $result[$slideshows->getId()] = $slideshows;
            }
            return $result;
        }
    }

}
