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


            $installer = $setup;

            $eavTable = $setup->getTable('webshopapps_matrixrate');

            if ($setup->getConnection()->isTableExists($eavTable) == true) {


                $installer->getConnection()->dropTable($installer->getConnection()->getTableName('webshopapps_matrixrate'));

            }

            $setup->endSetup();


    }
}
