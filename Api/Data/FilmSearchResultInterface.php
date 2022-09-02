<?php

declare(strict_types=1);

namespace Wtc\Film\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FilmSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return Wtc\Film\Api\Data\FilmInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return void
     */
    public function setItems(array $items);
}
