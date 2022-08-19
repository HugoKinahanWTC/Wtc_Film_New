<?php
namespace Wtc\Film\Block\Adminhtml;

class Film extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_film';
        $this->_blockGroup = 'Wtc_Film';
        $this->_headerText = __('Films');
        $this->_addButtonLabel = __('Add New Film');
        parent::_construct();
    }
}
