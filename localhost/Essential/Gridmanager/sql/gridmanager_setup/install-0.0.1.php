<?php
$installer = $this;
$installer->startSetup();


$gridtables = $installer->getConnection()->newTable($installer->getTable('gridmanager/table_essgrid'))
    ->addColumn('grid_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Essential Grid Id')

    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 100, array(
        'nullable' => false,
    ), 'Name')
	 ->addColumn('alias', Varien_Db_Ddl_Table::TYPE_TEXT, 100, array(
        'nullable' => false,
    ), 'Alias')
	 ->addColumn('cssid', Varien_Db_Ddl_Table::TYPE_TEXT, 100, array(
        'nullable' => false,
    ), 'CSS ID')
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, 100, array(
        'nullable' => false,
        'index' => 'content'
     ), 'Essential Grid Contet')

    ->addColumn('type_order', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false,
        'default' => 0
    ), 'Type Order')

    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false,
        'unsigned' => true,
        'index' => 'store_id'
    ), 'store_id')
	  ->addColumn('website_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false,
        'unsigned' => true,
        'index' => 'website_id'
    ), 'website_id')

    ->addColumn('create_date', Varien_Db_Ddl_Table::TYPE_INTEGER, 15, array(
        'unsigned' => true,
    ), 'create_date')

    ->addColumn('modified_date', Varien_Db_Ddl_Table::TYPE_INTEGER, 15, array(
        'unsigned' => true,
    ), 'modified date')
    ->addIndex($installer->getIdxName('gridmanager/table_essgrid', array('content')),
        array('content'))
    ->addIndex($installer->getIdxName('gridmanager/table_essgrid', array('type_order')),
        array('type_order'))
    ->addIndex($installer->getIdxName('gridmanager/table_essgrid', array('store_id')),
        array('store_id'))
    ->addIndex($installer->getIdxName('gridmanager/table_essgrid', array('website_id')),
        array('website_id'));

$gridtables = $installer->getConnection()->newTable($installer->getTable('gridmanager/table_essgrid_config_data'))
    ->addColumn('grid_config_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'essential grid config data Id')

    ->addColumn('grid_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false,
        'unsigned' => true,
        'index' => 'grid_id'
    ), 'grid id')

    ->addColumn('alias', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => false,
    ), 'alias')

    ->addColumn('value', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'value')

    ->addColumn('is_system', Varien_Db_Ddl_Table::TYPE_TEXT, 1, array(
        'nullable' => false,
        'default' => 'N'
    ), 'is_system')
	
	->addColumn('create_date', Varien_Db_Ddl_Table::TYPE_INTEGER, 15, array(
        'unsigned' => true,
    ), 'create_date')
	
    ->addIndex($installer->getIdxName('gridmanager/table_essgrid_config_data', array('grid_id')),
        array('grid_id'))
		
    ->addIndex($installer->getIdxName('gridmanager/table_essgrid_config_data', array('alias')),
        array('alias'))
		
    ->addForeignKey($installer->getFkName('gridmanager/table_essgrid_config_data', 'grid_id', 'gridmanager/table_essgrid_config_data', 'grid_id'),
	
    'grid_id', $installer->getTable('gridmanager/table_essgrid_config_data'), 'grid_id',
    Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);

$installer->addAttribute('catalog_product', 'grid_config_id', array(
    'type'          => 'int',
//    'input_renderer'    => 'grid/catalog_product_helper_form_example',
    "backend"  => false,
    "frontend" => false,
    'default' => 0,
    'default_value' => 0,
    'sort_order' => 5,
    "label"    => "Essential Grid Product",
    'is_visible'       => false,
    'required'      => false,
    'user_defined' => 0,
    'searchable' => false,
    'filterable' => false,
    'comparable'    => false,
    'visible_on_front' => false,
    'visible_in_advanced_search'  => false,
    'is_html_allowed_on_front' => false,
    'global'     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    "note"       => "Do not change value! Is used by Essential Grid."
));


$installer->addAttribute("catalog_category", "grid_config_id",  array(
    "type"     => "int",
    "backend"  => false,
    "frontend" => false,
    "label"    => "Essential Grid Category",
    "class"    => "",
    "source"   => "",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    "is_visible" => false,
    "required" => false,
    "user_defined"  => 0,
    "default" => "",
    'default_value' => 0,
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
    "visible_on_front"  => false,
    'visible_in_advanced_search'  => false,
    "note"       => "Do not change value! Is used by Essential Grid."

));

$installer->getConnection()->createTable($gridtables);
$installer->endSetup();