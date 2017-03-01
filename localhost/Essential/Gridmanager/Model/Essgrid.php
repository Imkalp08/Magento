<?php

class Essential_Gridmanager_Model_Essgrid extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('gridmanager/essgrid');
    }
	  public function getGridCollection()
    {
        return $this->getCollection();
    }

}
