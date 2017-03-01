<?php
class Essential_Gridmanager_Adminhtml_ItemskinController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction()
    {
		$this->loadLayout();
        $contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_itemskin');
        $this->_addContent($contentBlock);
        $this->renderLayout();	
    }
	
	public function newAction() {
		$this->loadLayout();
		$contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_itemskin_newitemskin');
        $this->_addContent($contentBlock);
		$this->renderLayout();
	}
	
	public function editAction()
	{
		$this->loadLayout();
		echo "Edit screen here";
		$this->renderLayout();

	}
}