<?php

namespace Boolfly\Brand\Block;

use Magento\Framework\View\Element\Template\Context;
use Boolfly\Brand\Model\ResourceModel\Brand\CollectionFactory as BrandCollectionFactory;

class BrandList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Boolfly\Brand\Model\ResourceModel\Brand\CollectionFactory
     */
    protected $_brandCollectionFactory;


    /**
     * Brand Listing constructor.
     * @param Context $context
     * @param BrandCollectionFactory $brandCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        BrandCollectionFactory $brandCollectionFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_brandCollectionFactory = $brandCollectionFactory;
    }

    public function getBrandsList()
    {
        if (!$this->hasData('brands')) {
            $brands = $this->_brandCollectionFactory
                ->create()
                ->addFilter('visibility', 1);
            $this->setData('brands', $brands);
        }
        return $this->getData('brands');
    }
}