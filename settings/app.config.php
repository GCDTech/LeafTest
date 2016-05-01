<?php

namespace Your\WebApp;

use Gcd\LeafTest\Index;
use Gcd\LeafTest\LayoutProviders\FieldSetWithLabelsLayoutProvider;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Leaf\LayoutProviders\LayoutProvider;
use Rhubarb\Leaf\LeafModule;

class TestApplication extends Application
{
    protected function initialise()
    {
        parent::initialise();

        LayoutProvider::setProviderClassName(FieldSetWithLabelsLayoutProvider::class);
    }


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