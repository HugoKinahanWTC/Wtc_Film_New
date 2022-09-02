<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider as
    UiDataProvider;

class DataProvider extends UiDataProvider
{
    public function getData(): array
    {
        return [];
    }
}