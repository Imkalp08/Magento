<?php

class Essential_Gridmanager_Model_Resource_Essgrid extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('gridmanager/essgrid', 'grid_id');
    }
}