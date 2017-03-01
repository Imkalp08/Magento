<?php
class Essential_Gridmanager_Block_Adminhtml_Globalsetting extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
    {
        $this->_controller = 'adminhtml_globalsetting';
        $this->_blockGroup = 'gridmanager';
        $this->_headerText = Mage::helper('gridmanager')->__('Global Settings');
		 $this->removeButton('add');
        parent::__construct();
    }
}