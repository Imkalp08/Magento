<?php

class Essential_Gridmanager_Block_Adminhtml_Gridmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'gridmanager';
        $this->_controller = 'adminhtml_gridmanager';
        
        $this->_updateButton('save', 'label', Mage::helper('gridmanager')->__('Save Grid'));
        $this->_updateButton('delete', 'label', Mage::helper('gridmanager')->__('Delete Grid'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('gridmanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'gridmanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'gridmanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('gridmanager_data') && Mage::registry('gridmanager_data')->getId() ) {
            return Mage::helper('gridmanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('gridmanager_data')->getTitle()));
        } else {
            return Mage::helper('gridmanager')->__('Essential Grid Item');
        }
    }
}