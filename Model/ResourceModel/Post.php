<?php

declare(strict_types=1);

namespace STLK\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    const MAIN_TABLE = 'stlk_blog_post';
    const ID_FIELD_NAME = 'id';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
