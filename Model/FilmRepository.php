<?php

declare(strict_types=1);

namespace Wtc\Film\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Wtc\Film\Api\Data\FilmInterface;
use Wtc\Film\Api\Data\FilmSearchResultInterface;
use Wtc\Film\Api\Data\FilmSearchResultInterfaceFactory;
use Wtc\Film\Api\FilmRepositoryInterface;
use Wtc\Film\Model\ResourceModel\Films\CollectionFactory as
    FilmCollectionFactory;
use Wtc\Film\Model\ResourceModel\Films\Collection;

class FilmRepository implements FilmRepositoryInterface
{
    private FilmFactory $filmFactory;

    private FilmCollectionFactory $filmCollectionFactory;

    private FilmSearchResultInterfaceFactory $searchResultFactory;

    public function __construct(
        FilmFactory                      $filmFactory,
        FilmCollectionFactory            $filmCollectionFactory,
        FilmSearchResultInterfaceFactory $filmSearchResultInterfaceFactory
    ) {
        $this->filmFactory = $filmFactory;
        $this->filmCollectionFactory = $filmCollectionFactory;
        $this->searchResultFactory = $filmSearchResultInterfaceFactory;
    }

    public function getById($id) : FilmInterface
    {
        $film = $this->filmFactory->create();
        $film->getResource()->load($film, $id);
        if (!$film->getId())
        {
            throw new NoSuchEntityException(__('Unable to find Film with ID "%1"', $id));
        }
        return $film;
    }

    public function save(\Wtc\Film\Api\Wtc\Film\Api\Data\FilmInterface
                         $film): FilmInterface
    {
        $film->getResource()->save($film);
        return $film;
    }

    public function delete(\Wtc\Film\Api\Wtc\Film\Api\Data\FilmInterface $film) : void
    {
        $film->getResource()->delete($film);
    }

    public function getList(SearchCriteriaInterface $searchCriteria): FilmSearchResultInterface
    {
        $collection = $this->filmCollectionFactory->create();
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        $collection->load();
        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface
                                            $searchCriteria, Collection
    $collection) : void
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface
                                               $searchCriteria, Collection
    $collection) : void
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface
                                           $searchCriteria, Collection
    $collection): void
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface
                                       $searchCriteria, Collection
    $collection): object
    {
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
