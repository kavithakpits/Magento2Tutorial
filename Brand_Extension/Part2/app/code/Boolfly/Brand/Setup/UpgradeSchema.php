<?php

namespace Boolfly\Brand\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $brandEntityTable = 'boolfly_brand_entity';

        $setup->getConnection()
            ->addColumn(
                $setup->getTable($brandEntityTable),
                'created_at',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                    'nullable' => false,
                    'comment' => 'Created At'
                ]
                );
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($brandEntityTable),
                'updated_at',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                    'nullable' => false,
                    'comment' => 'Updated At'
                ]
                );

        $setup->endSetup();
    }
}