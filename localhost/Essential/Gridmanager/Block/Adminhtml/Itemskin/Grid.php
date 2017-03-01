<?php
class Essential_Gridmanager_Block_Adminhtml_Itemskin_Grid extends Mage_Adminhtml_Block_Widget_Grid {
   
	protected function _prepareCollection()
    {
		
        $this->setPagerVisibility(false);
        $this->setFilterVisibility(false);
        //$collection = Mage::getModel('gridmanager/essgrid')->getGridCollection();
        $this->setCollection($collection);
		$this->setSaveParametersInSession(true);
        return parent::_prepareCollection();
		
    }
	
	protected function _prepareColumns() {
		
		$this->setTemplate('gridmanager/skintemplate.phtml');	
		return parent::_prepareColumns();
	}

  
}
