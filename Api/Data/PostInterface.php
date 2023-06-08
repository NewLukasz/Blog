<?php
declare(strict_types=1);

namespace STLK\Blog\Api\Data;

Interface PostInterface
{
    const ID = 'id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';

    /**
     * @return string
     */
    public function getTitle() : string;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title) : static;

    /**
     * @return string
     */
    public function getContent() : string;

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content) : static;

    /**
     * @return string
     */
    public function getCreatedAt() : string;

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt) : static;
}
