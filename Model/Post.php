<?php

declare(strict_types=1);

namespace STLK\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use STLK\Blog\Model\ResourceModel\Post as ResourceModel;

class Post extends AbstractModel
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
}
