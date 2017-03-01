<?php
class Essential_Gridmanager_Block_Adminhtml_Gridmanager_Grid extends Mage_Adminhtml_Block_Widget_Grid {

   protected function _prepareCollection()
    {
        $this->setPagerVisibility(false);
        $this->setFilterVisibility(false);
         $collection = Mage::getModel('gridmanager/essgrid')->getGridCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
  protected function _prepareColumns() {
   $this->addColumn('grid_id', array(
          'header'    => Mage::helper('gridmanager')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'grid_id',
      ));

      $this->addColumn('name', array(
          'header'    => Mage::helper('gridmanager')->__('Name'),
          'align'     =>'left',
          'index'     => 'name',
      ));
	   $this->addColumn('alias', array(
          'header'    => Mage::helper('gridmanager')->__('Alias'),
          'align'     =>'left',
          'index'     =>'alias',
      ));
	   $this->addColumn('content', array(
          'header'    => Mage::helper('gridmanager')->__('Content'),
          'align'     =>'left',
          'index'     => 'content',
      ));
          $this->addColumn('Edit',
            array(
                'header'=> (Mage::getSingleton('admin/session')->isAllowed('essential/gridmanager/setting')) ? Mage::helper('catalog')->__('Setting') : Mage::helper('catalog')->__('Setting'),
                'index' => 'edit',
                'renderer'  => 'Essential_Gridmanager_Block_Adminhtml_Gridmanager_Renderer_Setting',
                'width' => '70px',
                'filter' => false,
                'sortable' => false,
            ));
		
	$this->addColumn('skinedit',
            array(
                'header'    =>  Mage::helper('gridmanager')->__(''),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('gridmanager')->__('Edit Skin'),
                        'url'       => array('base'=> '*/*/editskin'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
	  $this->addColumn('delete',
            array(
                'header'    =>  Mage::helper('gridmanager')->__(''),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('gridmanager')->__('Delete'),
                        'url'       => array('base'=> '*/*/delete'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		$this->addColumn('Clone',
                array(
                    'header' => Mage::helper('catalog')->__('Clone'),
                    'index' => 'clone',
                    'renderer' => 'Essential_Gridmanager_Block_Adminhtml_Gridmanager_Renderer_Clone',
                    'width' => '70px',
                    'filter' => false,
                    'sortable' => false,
                ));
      return parent::_prepareColumns();
  }

}
