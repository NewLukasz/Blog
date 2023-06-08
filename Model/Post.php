<?php

declare(strict_types=1);

namespace STLK\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use STLK\Blog\Api\Data\PostInterface;
use STLK\Blog\Model\ResourceModel\Post as ResourceModel;

class Post extends AbstractModel implements PostInterface
{
    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }


    public function getTitle(): string
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle(string $title): static
    {
        return $this->setData(self::TITLE,$title);
    }

    public function getContent(): string
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent(string $content): static
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt): static
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
