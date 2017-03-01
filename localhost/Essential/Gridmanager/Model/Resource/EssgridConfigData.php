<?php

class Essential_Gridmanager_Model_Resource_EssgridConfigData extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('gridmanager/table_essgrid_config_data', 'grid_config_id');
    }
}