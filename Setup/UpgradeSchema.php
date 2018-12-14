<?php

namespace Peasoup\Matrixratesextension\Setup;


use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();


        $installer = $setup;
        if (version_compare($context->getVersion(), '1.1.0') < 0) {

            $tableName = $setup->getTable('webshopapps_matrixrate');

            if ($setup->getConnection()->isTableExists($tableName) == true) {

                $installer->getConnection()->dropTable($installer->getConnection()->getTableName('webshopapps_matrixrate'));

            }
        }

        if (version_compare($context->getVersion(), '1.2.0') < 0) {


            $setup->startSetup();

            $table = $setup->getConnection()->newTable(
                $installer->getTable('webshopapps_matrixrate')
            )->addColumn(
                'pk',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Primary key'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false, 'default' => '0'],
                'Website Id'
            )->addColumn(
                'dest_country_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                4,
                ['nullable' => false, 'default' => '0'],
                'Destination coutry ISO/2 or ISO/3 code'
            )->addColumn(
                'dest_region_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false, 'default' => '0'],
                'Destination Region Id'
            )->addColumn(
                'dest_city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false, 'default' => ''],
                'Destination City'
            )->addColumn(
                'dest_zip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false, 'default' => '*'],
                'Destination Post Code (Zip)'
            )->addColumn(
                'dest_zip_to',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false, 'default' => '*'],
                'Destination Post Code To (Zip)'
            )->addColumn(
                'condition_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false],
                'Rate Condition name'
            )->addColumn(
                'condition_from_value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Rate condition from value'
            )->addColumn(
                'condition_to_value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Rate condition to value'
            )->addColumn(
                'condition2_from_value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Rate condition 2 from value'
            )->addColumn(
                'condition2_to_value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Rate condition 2 to value'
            )->addColumn(
                'price',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Price'
            )->addColumn(
                'cost',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Cost'
            )->addColumn(
                'shipping_method',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Shipping Method'
            )->addIndex(
                $setup->getIdxName(
                    'webshopapps_matrixrate',
                    ['website_id', 'dest_country_id', 'dest_region_id', 'dest_city', 'dest_zip', 'condition_name',
                        'condition_from_value', 'condition_to_value', 'condition2_from_value', 'condition2_to_value', 'shipping_method'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
                ),
                ['website_id', 'dest_country_id', 'dest_region_id', 'dest_city', 'dest_zip', 'condition_name',
                    'condition_from_value', 'condition_to_value', 'condition2_from_value', 'condition2_to_value', 'shipping_method'],
                ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )->setComment(
                'WebShopApps Shipping MatrixRate'
            );;
            $setup->getConnection()->createTable($table);



        }


        $setup->endSetup();
    }
}


