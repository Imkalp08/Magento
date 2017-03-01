<?php
class Essential_Gridmanager_Block_Adminhtml_Imexport extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
    {
        $this->_controller = 'adminhtml_imexport';
        $this->_blockGroup = 'gridmanager';
        $this->_headerText = Mage::helper('gridmanager')->__('Import Export');
       // $this->_addButtonLabel = Mage::helper('gridmanager')->__('Add Grid');
	    $this->removeButton('add');
        parent::__construct();
    }
}