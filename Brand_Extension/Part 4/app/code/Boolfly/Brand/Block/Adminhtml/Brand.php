<?php

namespace Boolfly\Brand\Block\Adminhtml;

class Brand extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_brand';
        $this->_blockGroup = 'Boolfly_Brand';
        $this->_headerText = __('Brands');

        parent::_construct();
    }
}