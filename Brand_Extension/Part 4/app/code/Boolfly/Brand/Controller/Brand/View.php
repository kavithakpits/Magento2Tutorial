<?php

namespace Boolfly\Brand\Controller\Brand;

use \Magento\Framework\App\Action\Context;

class View extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        Context $context,
        \Boolfly\Brand\Model\BrandFactory $brandFactory
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $title = $this->getRequest()->getParam('id');
    }
}