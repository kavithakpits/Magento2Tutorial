<?php

namespace Boolfly\Brand\Controller\Adminhtml\Brand;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }
    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Boolfly_Brand::brand');
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Boolfly_Brand::brand');
        $resultPage->addBreadcrumb(__('Boofly Brand'), __('Brand'));
        $resultPage->addBreadcrumb(__('Manage Boofly Brand'), __('Manage Boofly Brand'));
        $resultPage->getConfig()->getTitle()->prepend(__('Boofly Brand'));

        return $resultPage;
    }
}