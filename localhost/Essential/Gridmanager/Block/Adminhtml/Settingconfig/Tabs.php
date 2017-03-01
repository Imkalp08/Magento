<?php

class Essential_Gridmanager_Block_Adminhtml_Settingconfig_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    static $activeTab = false;
    static $_current = null;
    private $group_namespace;

    public function __construct()
    {
        $helper = Mage::helper('gridmanager');

        parent::__construct();
        $this->setId('tabs_id');
        $this->setDestElementId('edit_form');
       // $this->setTitle($helper->__('Essential Grid Information'));
		$this->setTemplate('gridmanager/settingtemplate.phtml');
    }

}