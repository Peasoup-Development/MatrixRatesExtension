<?php

namespace Peasoup\MatrixRatesExtension\Setup;


use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.1.0') < 0) {

            $tableName = $setup->getTable('webshopapps_matrixrate');

            if ($setup->getConnection()->isTableExists($tableName) == true) {

                $setup->getConnection()->addColumn(
                    $setup->getTable($tableName),
                    'condition2_from_value',
                    [
                        'type' =>  \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                        'length' => '12,4',
                        'nullable' => true,
                        'comment' => 'Rate condition2 from value',
                        'after' => 'condition_to_value'
                    ]
                );
                $setup->getConnection()->addColumn(
                    $setup->getTable($tableName),
                    'condition2_to_value',
                    [
                        'type' =>  \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                        'length' => '12,4',
                        'nullable' => true,
                        'comment' => 'Rate condition2 to value',
                        'after' => 'condition2_from_value'
                    ]
                );

            }
        }
        $setup->endSetup();
    }
}


