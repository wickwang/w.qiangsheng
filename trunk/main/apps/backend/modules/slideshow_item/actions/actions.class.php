<?php

require_once dirname(__FILE__) . '/../lib/slideshow_itemGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/slideshow_itemGeneratorHelper.class.php';

/**
 * slideshow_item actions.
 *
 * @package    j.shangzhi.wiki
 * @subpackage slideshow_item
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class slideshow_itemActions extends autoSlideshow_itemActions {

    public function preExecute() {
        
        $this->configuration = new slideshow_itemGeneratorConfiguration();

        if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName()))) {
            $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
        }

        $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

        $this->helper = new slideshow_itemGeneratorHelper();
        
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();
        $this->SlideshowItem = $this->form->getObject();
        unset($this->form['photo']);
        unset($this->form['image_token']);
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        $this->getRoute()->getObject()->delete();

        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

        $this->redirect('@slideshow_item');
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $count = 0;
        foreach (SlideshowItemPeer::retrieveByPks($ids) as $object) {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));

            $object->delete();
            if ($object->isDeleted()) {
                $count++;
            }
        }

        if ($count >= count($ids)) {
            $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        } else {
            $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items.');
        }

        $this->redirect('@slideshow_item');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            $SlideshowItem = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $SlideshowItem)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@slideshow_item_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'slideshow_item_edit', 'sf_subject' => $SlideshowItem));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeUp() {
        $o = $this->getRoute()->getObject();
        $o->moveUp();

        $this->getUser()->setFlash('notice', 'Position was update successfully.');
        $this->redirect('@slideshow_item');
    }

    public function executeDown() {
        $o = $this->getRoute()->getObject();
        $o->moveDown();

        $this->getUser()->setFlash('notice', 'Position was update successfully.');
        $this->redirect('@slideshow_item');
    }

}