<?php

namespace Your\WebApp;

use Gcd\LeafTest\Index;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Leaf\LeafModule;

class TestApplication extends Application
{
    protected function registerUrlHandlers()
    {
        $this->addUrlHandlers(
            [ "/" => new ClassMappedUrlHandler(Index::class)]
        );
    }

    protected function getModules()
    {
        return [
            new LeafModule()
        ];
    }
}

$application = new TestApplication();