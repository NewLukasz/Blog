<?php
declare(strict_types=1);

namespace STLK\Blog\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use STLK\Blog\Api\Data\PostRepositoryInterface;

class BlogPostById implements ResolverInterface
{
    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        private readonly PostRepositoryInterface $postRepository
    ) {}

    /**
     * @param Field $field
     * @param $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return Value|mixed|\STLK\Blog\Api\Data\PostInterface
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function resolve(
        Field       $field,
                    $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    )
    {
        $postId = $args['id'] ?? null;
        if (!$postId) {
            throw new NoSuchEntityException(__('Blog post ID is required.'));
        }
        if(!$post = $this->postRepository->getById($postId)){
            throw new NoSuchEntityException(__('Blog post not found.'));
        }
        return $post;
    }
}
