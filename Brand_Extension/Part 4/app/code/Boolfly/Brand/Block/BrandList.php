<?php

namespace Boolfly\Brand\Block;

use Magento\Framework\View\Element\Template\Context;
use Boolfly\Brand\Model\ResourceModel\Brand\CollectionFactory as BrandCollection;

class BrandList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Boolfly\Brand\Model\ResourceModel\Brand\CollectionFactory
     */
    protected $_brandCollectionFactory;


    /**
     * Brand Listing constructor.
     * @param Context $context
     * @param BrandCollection $brandCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        BrandCollection $brandCollectionFactory,
        array $data)
    {
        parent::__construct($context, $data);
        $this->_brandCollectionFactory = $brandCollectionFactory;
    }

    public function getBrandList()
    {

    }
}