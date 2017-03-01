<?php

class Essential_Gridmanager_Model_EssgridSkin extends Mage_Core_Model_Abstract
{
    private $_static_conflicts = false;
    public function getStaticConflicts()
    {
        if ($this->_static_conflicts)
        {
            return $this->_static_conflicts;
        }

        $predefined_arr = Mage::helper('gridmanager/essgridConfig')->getPredefined();
        $skin_install_data = $predefined_arr[$this->getSkin()]['install'];
        if (isset($skin_install_data['blocks']))
        {
            foreach ($skin_install_data['blocks'] AS $identifier => $block_data)
            {
                foreach ($this->getStores() AS $store_id)
                {
                    $block  = Mage::getModel('cms/block')->setStoreId($store_id)->load($identifier);
                    if ($block->getId())
                    {
                        $store_ids = Mage::getResourceModel('cms/block')->lookupStoreIds($block->getId());
                        if (in_array($store_id ,$store_ids))
                        {
                            $this->_static_conflicts[$store_id]['block-store'][$identifier] = $block->getTitle();
                        }
                        elseif (in_array(0 ,$store_ids))
                        {
                            $this->_static_conflicts[$store_id]['block-all'][$identifier] = $block->getTitle();
                        }
                    }
                }
            }
        }
        if (isset($skin_install_data['pages']))
        {
            foreach ($skin_install_data['pages'] AS $identifier => $page_data)
            {
                foreach ($this->getStores() AS $store_id)
                {
                    $page  = Mage::getModel('cms/page')->setStoreId($store_id)->load($identifier);
                    if ($page->getId())
                    {
                        $store_ids = Mage::getResourceModel('cms/page')->lookupStoreIds($page->getId());
                        if (in_array($store_id ,$store_ids))
                        {
                            $this->_static_conflicts[$store_id]['page'][$identifier] = $page->getTitle();
                        }
                    }
                }
            }
        }
        return $this->_static_conflicts;
    }


 
 


}
