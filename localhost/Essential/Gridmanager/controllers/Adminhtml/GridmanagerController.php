<?php
class Essential_Gridmanager_Adminhtml_GridmanagerController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction()
    {
         $this->loadLayout();
        $contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_gridmanager');
        $this->_addContent($contentBlock);
        $this->renderLayout(); 
    }
	


   public function newAction() {
		$this->_forward('edit');
	}
	
   public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('gridmanager/essgrid')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('gridmanager_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('gridmanager/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('gridmanager/adminhtml_gridmanager_edit'))
				->_addLeft($this->getLayout()->createBlock('gridmanager/adminhtml_gridmanager_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gridmanager')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
	
 	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			$model = Mage::getModel('gridmanager/essgrid');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('gridmanager')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gridmanager')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}
     public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('gridmanager/essgrid');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
	
	public function getNewConfigAction() {
		$this->loadLayout();
		$this->addJsCss();
		$html = $this->getLayout()->getBlock('head')->toHtml();
		$grid_config_id = 0;
		if ($this->getRequest()->getParam('saveConfig'))
		{
			$clone_config_id = $this->getRequest()->getParam('cloneConfigId');
			$grid_config_id = Mage::getModel('gridmanager/essgrid')->setTheme($this->getRequest()->getParams());
			Mage::getModel('gridmanager/essgridConfigData')->cloneConfig($clone_config_id, $grid_config_id);
		}
		Mage::register('grid_config_id', $grid_config_id);
		$html .= $this->getLayout()->createBlock('gridmanager/adminhtml_thems_addConfigForm')->toHtml();
		$this->getResponse()->setBody($html);        
    }
	
	public function settingConfigAction() {
		$this->loadLayout();
		$this->_setActiveMenu('gridmanager');
		$contentBlockLeft = $this->getLayout()->createBlock('gridmanager/adminhtml_settingconfig_tabs');
		$this->_addLeft($contentBlockLeft);
		$contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_settingconfig');
		$this->_addContent($contentBlock);
	   // $this->addJsCss('thememanager-editconfig-adm');
		$this->renderLayout();
	}
	
	public function datahandlingAction() {
		$this->loadLayout();
		$contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_datahandling');
		$this->_addContent($contentBlock);
		$this->renderLayout();
	}   
	
	public function globalsettingAction()
	{
		$this->loadLayout();
		$contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_globalsetting');
        $this->_addContent($contentBlock);
        $this->renderLayout();
	}
	
	public function searchsettingsAction()
	{
		$this->loadLayout();
		$contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_searchsettings');
        $this->_addContent($contentBlock);
        $this->renderLayout();
	}
	
	
	public function imexportAction()
    {
		$this->loadLayout();
		$contentBlock = $this->getLayout()->createBlock('gridmanager/adminhtml_imexport');
		$this->_addContent($contentBlock);
		$this->renderLayout();

	}
	
	private function getConfigArray()
    {
        return Mage::helper('gridmanager/gridConfig')->getThemeConfigTree();
    }
}