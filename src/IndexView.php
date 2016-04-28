<?php

namespace Gcd\LeafTest;

use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Views\View;

class IndexView extends View
{
    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            new TextBox("Forename"),
            $button = new Button("Submit", "Continue", function(){
                $this->model->message = "Goats";
            })
        );

        $button->addCssClassNames("goat", "bot");
    }

    protected function printViewContent()
    {
        print $this->model->message;

        print "Hello";
        print $this->leaves["Forename"];
        print $this->leaves["Submit"];
    }
}