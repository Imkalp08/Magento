<?php
class Essential_Gridmanager_Block_Adminhtml_Settingconfig extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    static $grid_id = false;
    private static $_static_blocks = false;
    private static $_static_pages = false;

    protected function _construct()
    {
        $this->_blockGroup = 'gridmanager';
        $this->_controller = 'adminhtml_settingconfig';
        $this->_mode = 'options';
        self::$grid_id = Mage::app()->getRequest()->getParam('grid_id');
		$this->removeButton('add');
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('gridmanager');
        $grid_config_data = Mage::getModel('gridmanager/essgrid')->load(self::$grid_id);

        $this->removeButton('save');

        if(Mage::getSingleton('admin/session')->isAllowed('essential/gridmanager/edit'))
        {
            $this->_addButton('save', array(
                'label'     => $helper->__('<i class="fa fa-floppy-o"></i>Save'),
                'name'     => 'save',
                'onclick'   => 'save()'
            ), 2, 6);

            $this->_addButton('save_and_stay', array(
                'label'     => $helper->__('<i class="fa fa-floppy-o"></i>Save and continue edit'),
                'name'     => 'save_and_stay',
                'onclick'   => 'saveAndStay()'
            ), 1, 5);
        }
        $url = $this->getUrl("*/*/gridConfig", array('grid'=> ''));
        $this->_addButton('back_to_list', array(
            'label'     => $helper->__('<i class="fa fa-chevron-left"></i>Back'),
            'name'     => 'back_to_list',
            'onclick'   => 'reloadTo(\''.$url.'\')',
            'class'     => 'back'
        ), 1, 1);

        $this->removeButton('reset');
        $this->removeButton('back');
        return $helper->__("Essentail Grid Settings") . '<span class="GridName">('.$grid_config_data->getName().')<span>' ;
    }

    public function getHeaderHtml()
    {
        return parent::getHeaderHtml() . $this->getHeaderCustomHtml();
    }

}

