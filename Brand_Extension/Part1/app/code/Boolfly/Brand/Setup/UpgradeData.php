<?php

namespace Boolfly\Brand\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_brandFactory;
    protected $_date;

    public function __construct(
        \Boolfly\Brand\Model\BrandFactory $brandFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    )
    {
        $this->_brandFactory = $brandFactory;
        $this->_date = $date;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $brand = $this->_brandFactory->create();
        $brand->setName('Apple');
        $brand->setUrlKey('apple');
        $brand->setDescription('Apple iPhone - iPad - iPad');
        $brand->setVisibility(0);
        $brand->setCreatedAt($this->_date->gmtDate());
        $brand->setUpdatedAt($this->_date->gmtDate());

        $brand->save();

        $brand = $this->_brandFactory->create();
        $brand->setName('Adidas');
        $brand->setUrlKey('adidas');
        $brand->setDescription('Adidas Adidas');
        $brand->setVisibility(0);
        $brand->setCreatedAt($this->_date->gmtDate());
        $brand->setUpdatedAt($this->_date->gmtDate());

        $brand->save();

        $setup->endSetup();
    }
}