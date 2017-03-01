<?php
class Essential_Gridmanager_Block_Adminhtml_Gridmanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
    {
        $this->_controller = 'adminhtml_gridmanager';
        $this->_blockGroup = 'gridmanager';
        $this->_headerText = Mage::helper('gridmanager')->__('Essential Grid');
        $this->_addButtonLabel = Mage::helper('gridmanager')->__('Add Grid');
        parent::__construct();
    }
}