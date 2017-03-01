<?php
class Essential_Gridmanager_Block_Adminhtml_Datahandling extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
    {
		parent::__construct(); 
        $this->_controller = 'adminhtml_datahandling';
        $this->_blockGroup = 'gridmanager';
        $this->_headerText = Mage::helper('gridmanager')->__('Data Handling Essential Grid');
        $this->_addButtonLabel = Mage::helper('gridmanager')->__('Add Grid');
        
    }
}