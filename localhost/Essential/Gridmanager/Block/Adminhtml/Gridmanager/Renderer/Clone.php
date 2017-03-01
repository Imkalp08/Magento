<?php

class Essential_Gridmanager_Block_Adminhtml_Gridmanager_Renderer_Clone extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $helper = Mage::helper('gridmanager');
        $url = $this->getUrl('*/*/getNewConfig', array('essgrid'=>'', 'clone'=>1, 'grid_id' => $row->getId()));
        return '<button type="button" title="Clone" onclick="cloneConfig(\''.$url.'\')"><i class="fa fa-files-o"></i>Clone</button>';
    }

}//