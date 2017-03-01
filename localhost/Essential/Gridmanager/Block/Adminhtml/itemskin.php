<?php
class Essential_Gridmanager_Block_Adminhtml_Itemskin extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
    {
		$this->_controller = 'adminhtml_itemskin';
        $this->_blockGroup = 'gridmanager';
        $this->_headerText = Mage::helper('gridmanager')->__('Item Skin Editor');
        $this->_addButtonLabel = Mage::helper('gridmanager')->__('Add Skin');
        //$this->_addButtonUrl = Mage::helper('gridmanager')->__('Add Skin');
		
        parent::__construct(); 
    }
	
	protected function _prepareLayout()
    {
		//$this->setTemplate('gridmanager/skintemplate.phtml');
        return parent::_prepareLayout();
    }
	
	
}