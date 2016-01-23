<?php

namespace Hackathon\Blackfire\Plugin;

use Blackfire\Client;
use Symfony\Component\Config\Definition\Exception\Exception;

class BlackfireProductPlugin
{
    protected $blackFireClientId = '';
    protected $blackFireClientToken = '';

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