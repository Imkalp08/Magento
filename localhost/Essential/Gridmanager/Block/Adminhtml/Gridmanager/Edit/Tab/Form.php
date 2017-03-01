<?php

class Essential_Gridmanager_Block_Adminhtml_Gridmanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('gridmanager_form', array('legend'=>Mage::helper('gridmanager')->__('Essential Grid Item')));
		
      $fieldset->addField('name', 'text', array(
          'label'     => Mage::helper('gridmanager')->__('Name'),
          'required'  => true,
          'name'      => 'name',  
      ));
	     $fieldset->addField('alias', 'text', array(
          'label'     => Mage::helper('gridmanager')->__('Alias'),
          'required'  => true,
          'name'      => 'alias',  
      ));
	   $fieldset->addField('type_order', 'text', array(
          'label'     => Mage::helper('gridmanager')->__('Sort Order'),
          'required'  => false,
          'name'      => 'type_order',  
      ));
	  $store_id = Mage::app()->getStore()->getStoreId();
	  $fieldset->addField('store_id', 'hidden', array(
          'label'     => Mage::helper('gridmanager')->__('Store ID'),
          'required'  => false,
          'name'      => 'store_id',  
		  'Value'   =>  $store_id,
      ));
	  $website_id = Mage::app()->getStore()->getWebsiteId();
	  $fieldset->addField('website_id', 'hidden', array(
          'label'     => Mage::helper('gridmanager')->__('Website ID'),
          'required'  => false,
          'name'      => 'website_id',  
		  'Value'   =>  $website_id,
      ));
	
      return parent::_prepareForm();
  }
}

