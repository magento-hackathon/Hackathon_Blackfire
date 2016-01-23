<?php

namespace Hackathon\Blackfire\Profiler\Output;

use Magento\Framework\Profiler;
use Magento\Framework\Profiler\Driver\Standard\AbstractOutput;
use Magento\Framework\Profiler\Driver\Standard\Stat;
use Blackfire\Client;

/**
 * Class Blackfire
 * @package Hackathon\Blackfire\Profiler\Output
 */
class Blackfire extends AbstractOutput
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Blackfire constructor.
     *
     * @param array|null $config
     * @param Client $client
     */
    public function __construct($config, Client $client)
    {
        parent::__construct($config);
        $this->client = $client;
    }

    /**
     * Display profiling results in appropriate format
     *
     * @param Stat $stat
     * @return void
     */
    public function display(Stat $stat)
    {
        var_dump('test');
        // TODO: Implement display() method.
    }
}
