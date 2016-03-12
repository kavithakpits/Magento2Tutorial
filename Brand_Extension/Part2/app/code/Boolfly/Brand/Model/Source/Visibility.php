<?php

namespace Boolfly\Brand\Model\Source;

class Visibility implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $availableOptions = \Boolfly\Brand\Model\Brand::getVisibilities();
        $options = [];
        foreach($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
