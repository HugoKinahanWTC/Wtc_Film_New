<?php

namespace Wtc\Film\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Wtc\Film\Api\Data\FilmInterface;
use Wtc\Film\Api\Data\FilmSearchResultInterface;

interface FilmRepositoryInterface
{

    public function getById($id): FilmInterface;

    public function save(Wtc\Film\Api\Data\FilmInterface $film): FilmInterface;

    public function delete(Wtc\Film\Api\Data\FilmInterface $film) : void;

    public function getList(SearchCriteriaInterface $searchCriteria):
    FilmSearchResultInterface;
}
