<?php

class Essential_Gridmanager_Block_Adminhtml_Gridmanager_Renderer_Setting extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $url = $this->getUrl('*/*/settingConfig', array('grid_id' => $row->getId()));
        $tr_class = 'ConfigType-'.$row->getType();

        return '<a href="'.$url.'" class="edit-btn" data-parent-tr-class="'.$tr_class.'" type="button" title="Edit "><i class="fa fa-pencil-square-o"></i>
                        '.((Mage::getSingleton('admin/session')->isAllowed('essential/gridmanager/setting')) ? Mage::helper('catalog')->__('Setting') : Mage::helper('catalog')->__('Setting') ).'</a>';
    }

}