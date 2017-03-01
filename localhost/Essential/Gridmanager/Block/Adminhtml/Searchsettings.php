<?php
class Essential_Gridmanager_Block_Adminhtml_Searchsettings extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
    {
        $this->_controller = 'adminhtml_searchsettings';
        $this->_blockGroup = 'gridmanager';
        $this->_headerText = Mage::helper('gridmanager')->__('Search Settings');
		$this->removeButton('add');
        parent::__construct();
    }
}