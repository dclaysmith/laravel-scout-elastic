<?php
namespace dclaysmith\LaravelAWSElasticsearch;

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\ElasticsearchService\ElasticsearchPhpHandler;
use Elasticsearch\ClientBuilder;

class SignedElasticsearchEngine extends ElasticsearchEngine
{
    /**
     * Create a new signed elasticsearch engine instance
     */
    public function __construct()
    {
        $handler = new ElasticsearchPhpHandler('eu-west-1');
        
        $elasticsearch = ClientBuilder::create()
            ->setHandler($handler)
            ->setHosts(config('scout.elasticsearch.config.hosts'))
            ->build();

        $this->elasticsearch = $elasticsearch;
        $this->index = config('scout.elasticsearch.index');
    }
}