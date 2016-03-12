<?php

namespace Boolfly\Brand\Controller\Adminhtml\Brand;

use Magento\Backend\App\Action\Context;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Edit Brand page
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        //Get ID and create model
        $entityId = $this->getRequest()->getParam('entity_id');
        $model = $this->_objectManager->create('Boolfly\Brand\Model\Brand');

        if($entityId) {
            $model->load($entityId);
            if(!$model->getId()) {
                $this->messageManager->addError(__('This brand no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        //Set entered data if was error when do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if(!empty($data)) {
            $model->setData($data);
        }

        //Register model to user later in blocks
        $this->_coreRegistry->register('boolfly_brand', $model);

        //Build edit form
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $entityId ? __('Edit Brand') : __('New Brand'),
            $entityId ? __('Edit Brand') : __('New Brand')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Boolfly Brand'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Brand'));

        return $resultPage;

    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Boolfly_Brand::brand')
            ->addBreadcrumb(__('Boolfly Brand'), __('Brand'))
            ->addBreadcrumb(__('Manage Brand'), __('Manage Brand'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Boolfly_Brand::save');
    }
}