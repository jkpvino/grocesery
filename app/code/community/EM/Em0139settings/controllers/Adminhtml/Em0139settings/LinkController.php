<?php
class EM_Em0139settings_Adminhtml_Em0139settings_LinkController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction(){
		$this->_initAction()
			->renderLayout();
	}

	public function userguideAction(){
		$this->getResponse()->setRedirect('http://www.emthemes.com/faqs');
	}
}