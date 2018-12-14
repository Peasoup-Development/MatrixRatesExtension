<?php

namespace Peasoup\Matrixratesextension\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;

class UninstallSchema implements UninstallInterface
{
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();
            // Version of module in setup table is less then the give value.


            // get table customer_entity
            $eavTable = $setup->getTable('webshopapps_matrixrate');

            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($eavTable) == true) {
                $connection = $setup->getConnection();

                $connection->dropColumn($eavTable, 'condition_name2');
                $connection->dropColumn($eavTable, 'condition2_from_value');
                $connection->dropColumn($eavTable, 'condition2_to_value');
            }

            $setup->endSetup();


    }
}
