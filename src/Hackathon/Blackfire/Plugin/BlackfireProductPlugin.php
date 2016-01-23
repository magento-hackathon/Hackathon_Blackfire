<?php

namespace Hackathon\Blackfire\Plugin;

use Blackfire\Client;
use Symfony\Component\Config\Definition\Exception\Exception;

class BlackfireProductPlugin
{
    protected $blackFireClientId = '5f56facb-be1e-4845-a26b-ca040e979f09';
    protected $blackFireClientToken = '32c0ad06b18a8b46ae0b7b522ed7501d33cbeac71120250e829eb76e1f29e3bd';

    /**
    * Profile before and after product load, using Blackfire
    *
    * @param \Magento\Catalog\Model\Product $subject
    * @param callable $proceed
    * @param int $modelId
    * @param null $field
    * @return \Magento\Catalog\Model\Product
    * @SuppressWarnings(PHPMD.UnusedFormalParameter)
    */
    public function aroundLoad(
        \Magento\Catalog\Model\Product $subject,
        \Closure $proceed,
        $modelId,
        $field = null
    ) {
        // obtain a Blackfire client
        $blackfire = new Client(
            new \Blackfire\ClientConfiguration($this->blackFireClientId,
                $this->blackFireClientToken)
        );

        // start Backfire probing
        $probe = $blackfire->createProbe();

        // perform the actual product load
        /** @var \Magento\Catalog\Model\Product $product */
        $product = $proceed($modelId, $field);

        // end Blackfire probing
        $blackfire->endProbe($probe);

        return $product;
    }

}