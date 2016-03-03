<?php

namespace Boolfly\Brand\Model\Source;

use Boolfly\Brand\Model\ResourceModel\Brand\CollectionFactory;

class Brand extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    protected $_brandsFactory;


    public function __construct(CollectionFactory $brandsFactory)
    {
        $this->_brandsFactory = $brandsFactory;
    }

    public function getAllOptions($withEmpty = true)
    {
        if(!$this->_options) {

            $brandsCollection = $this->_brandsFactory->create();

            foreach($brandsCollection as $brand) {
                $this->_options[] = [
                    'label' => $brand->getName(),
                    'value' => $brand->getEntityId()
                ];
            }
        }

        $none = [
            ['label' => __('None'), 'value' => '0']
        ];

        if($withEmpty) {
            if(!$this->_options) {
                return $none;
            } else {
                return array_merge($none, $this->_options);
            }
        }

        return $this->_options;

    }
}