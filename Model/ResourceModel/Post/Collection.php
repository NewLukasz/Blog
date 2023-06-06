<?php

declare(strict_types=1);

namespace STLK\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use STLK\Blog\Model\Post as Model;
use STLK\Blog\Model\ResourceModel\Post as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
