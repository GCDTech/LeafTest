<?php

namespace Gcd\LeafTest;

use Rhubarb\Leaf\Views\View;

class IndexView extends View
{
    protected function printViewContent()
    {
        print "Hello";
    }
}