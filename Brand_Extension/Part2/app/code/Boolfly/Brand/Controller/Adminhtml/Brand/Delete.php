<?php

namespace Boolfly\Brand\Controller\Adminhtml\Brand;

class Delete extends \Magento\Backend\App\Action
{

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $entity_id = $this->getRequest()->getParam('entity_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if($entity_id) {
            try {
              //Init model and delete
                $model = $this->_objectManager->create('Boolfly\Brand\Model\Brand');
                $model->load($entity_id);
                $model->delete();
                //Display success message
                $this->messageManager->addSuccess(__('The brand has been deleted.'));

                //Go to grid
                return $resultRedirect->setPath('*/*/');

            } catch(\Exception $e) {
                //Display error message
                $this->messageManager->addError($e->getMessage());
                //Go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['entity_id' => $entity_id]);
            }
        }

        //Display error message
        $this->messageManager->addError(__('We can\'t find a brand to delete.'));
        //Go to grid
        return $resultRedirect->setPath('*/*');
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Boolfly_Brand::delete');
    }
}