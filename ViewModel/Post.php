<?php
declare(strict_types=1);

namespace STLK\Blog\ViewModel;

use STLK\Blog\Api\Data\PostRepositoryInterface;
use STLK\Blog\Api\Data\PostInterface;
use STLK\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\RequestInterface;

class Post implements ArgumentInterface
{

    public function __construct(
        private PostCollection $postCollection,
        private PostRepositoryInterface $postRepository,
        private RequestInterface $request
    )
    {
    }

    /**
     * @return array
     */
    public function getList() : array
    {
        return $this->postCollection->getItems();
    }

    /**
     * @return int
     */
    public function getCount() : int
    {
        return $this->postCollection->count();
    }

    /**
     * @throws LocalizedException
     */
    public function getDetails() : PostInterface
    {
        $id = $this->request->getParam('id');
        return $this->postRepository->getById($id);
    }
}
