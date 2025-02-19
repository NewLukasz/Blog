<?php
declare(strict_types=1);

namespace STLK\Blog\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use STLK\Blog\Api\Data\PostRepositoryInterface;

class FirstBlogPostContent implements ResolverInterface
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
     * @return Value|mixed|string
     */
    public function resolve(
        Field       $field,
                    $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    )
    {
        return $this->postRepository->getFirstBlogPost()->getContent();
    }
}
