<?php
declare(strict_types=1);

namespace Solid\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Details implements HttpGetActionInterface
{
    public function execute()
    {
        die('Details action.');
    }
}
