<?php
class Essential_Gridmanager_Block_Adminhtml_Itemskin_Newitemskin extends Mage_Adminhtml_Block_Widget_Grid {
   
	public function _prepareCollection()
    {
		 $this->setPagerVisibility(false);
        $this->setFilterVisibility(false);
        //$collection = Mage::getModel('gridmanager/essgrid')->getGridCollection();
        $this->setCollection($collection);
		$this->setSaveParametersInSession(true);
        return parent::_prepareCollection();
    }
	
	protected function _prepareColumns()
    {
		
		$this->setTemplate('gridmanager/newskintemplate.phtml');
        return parent::_prepareColumns();
    }

  
}
