<?php

namespace Boolfly\Brand\Model\Source;

use Boolfly\Brand\Model\BrandFactory;

class Brand extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    protected $brandFactory;


    public function __construct(BrandFactory $brandFactory)
    {
        $this->brandFactory = $brandFactory;
    }

    public function getAllOptions()
    {
        $i = 1;
        $brandsCollection = $this->brandFactory->create()->getCollection();

        $option = [
            'label' => __('Select'),
            'value' => __('')
        ];
        foreach($brandsCollection as $brand) {
            $option[] = [
                'label' => $brand->getName(),
                'value' => $brand->getEntityId()
            ];
        }
        return $option;

    }
}