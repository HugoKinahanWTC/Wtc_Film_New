<?php

declare(strict_types=1);

namespace Wtc\Film\Model\ResourceModel\Films;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Wtc\Film\Model\Film;
use Wtc\Film\Model\ResourceModel\Film as ResourceFilm;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(Film::class,
            ResourceFilm::class);
    }
}
