<?php
declare(strict_types=1);

namespace STLK\Blog\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use STLK\Blog\Api\Data\PostInterface;
use STLK\Blog\Api\Data\PostRepositoryInterface;
use STLK\Blog\Model\ResourceModel\Post as PostResourceModel;
use STLK\Blog\Model\PostFactory;
use Exception;

class PostRepository implements PostRepositoryInterface
{

    public function __construct(
        private PostResourceModel $postResourceModel,
        private PostFactory $postFactory
    )
    {
    }

    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResourceModel->load($post,$id);
        if(!$post->getId()){
            throw new NoSuchEntityException(__('Post with id: "%1" does not exist', $id));
        }
        return $post;
    }

    public function save(PostInterface $post): PostInterface
    {
        try{
            $this->postResourceModel->save($post);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $post;
    }

    public function deleteById(int $id): bool
    {
        $post = $this->getById($id);
        try{
            $this->postResourceModel->delete($post);
        } catch (Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
}
