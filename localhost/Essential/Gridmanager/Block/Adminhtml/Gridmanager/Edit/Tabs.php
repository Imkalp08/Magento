<?php

class Essential_Gridmanager_Block_Adminhtml_Gridmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('gridmanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('gridmanager')->__('Essential Grid'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('gridmanager')->__('Essential Grid'),
          'title'     => Mage::helper('gridmanager')->__('Essential Grid'),
          'content'   => $this->getLayout()->createBlock('gridmanager/adminhtml_gridmanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}