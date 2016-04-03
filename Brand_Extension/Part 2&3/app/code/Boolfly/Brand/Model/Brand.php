<?php

namespace Boolfly\Brand\Model;

class Brand extends \Magento\Framework\Model\AbstractModel
{
    const VISIBILITY_HIDDEN = 0;
    const VISIBILITY_SHOW = 1;

    protected function _construct()
    {
        $this->_init('Boolfly\Brand\Model\ResourceModel\Brand');
    }

    public static function getVisibilities()
    {
        return [
            self::VISIBILITY_HIDDEN => __('Hidden'),
            self::VISIBILITY_SHOW => __('Visible')
        ];
    }
}