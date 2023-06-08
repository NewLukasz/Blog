<?php
declare(strict_types=1);

namespace STLK\Blog\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use STLK\Blog\Model\PostFactory;
use STLK\Blog\Api\Data\PostRepositoryInterface;
use STLK\Blog\Api\Data\PostInterface;

class PopulateBlogPosts implements DataPatchInterface
{

    const NUMBER_OF_POSTS = 5;

    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository
    )
    {
    }

    public static function getDependencies() : array
    {
        return [];
    }

    public function getAliases() : array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        for($i=1;$i<=self::NUMBER_OF_POSTS;$i++){
            /** @var PostInterface $post */
            $post = $this->postFactory->create();
            $post->setTitle('Exmple title'.$i);
            $post->setContent('Example content'.$i);
            $this->postRepository->save($post);
        }

        $this->moduleDataSetup->endSetup();
    }
}
