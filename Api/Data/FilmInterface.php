<?php

declare(strict_types=1);

namespace Wtc\Film\Api\Data;

interface FilmInterface
{

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title);

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status);
}
