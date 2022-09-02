<?php

declare(strict_types=1);

namespace Wtc\Film\Controller\Adminhtml;

use Magento\Backend\Model\View\Result\Redirect;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Controller\Adminhtml\Page\PostDataProcessor;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;

class Save implements HttpPostActionInterface
{
    protected PostDataProcessor $dataProcessor;

    protected DataPersistorInterface $dataPersistor;

    private PageFactory $pageFactory;

    private PageRepositoryInterface $pageRepository;

    public function __construct(
        PostDataProcessor $dataProcessor,
        DataPersistorInterface $dataPersistor,
        PageFactory $pageFactory = null,
        PageRepositoryInterface $pageRepository = null
    ) {
        $this->dataProcessor = $dataProcessor;
        $this->dataPersistor = $dataPersistor;
        $this->pageFactory = $pageFactory;
        $this->pageRepository = $pageRepository;
    }

    public function execute() {
        $data = $this->getRequest()->getPostValue();
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            die('hello world');
        }
        return $resultRedirect->setPath('*/*/index');
    }
}
