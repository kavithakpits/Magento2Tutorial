<?php

namespace Boolfly\Brand\Model\Brand;

class Visibility implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return \Boolfly\Brand\Model\Brand::getVisibilities();
    }
}
