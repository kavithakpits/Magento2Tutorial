<?php

namespace Boolfly\Brand\Model\ResourceModel;

class Brand extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('boolfly_brand_entity', 'entity_id');
    }
}