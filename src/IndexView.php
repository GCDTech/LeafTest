<?php

namespace Gcd\LeafTest;

use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Checkbox\Checkbox;
use Rhubarb\Leaf\Controls\Common\Text\PasswordTextBox;
use Rhubarb\Leaf\Controls\Common\Text\TextArea;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Views\View;

class IndexView extends View
{
    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            new TextBox("Forename"),
            new TextArea("Notes"),
            new PasswordTextBox("Password"),
            new Checkbox("Terms"),
            $button = new Button("Submit", "Continue", function(){
                $this->model->message = "Goats";
            })
        );

        $button->addCssClassNames("goat", "bot");
    }

    protected function printViewContent()
    {
        print $this->model->message;

        $this->layoutItemsWithContainer( "Hello", [
            "Notes",
            "Password",
            "Terms",
            "" => "Submit"
        ]);

        $this->leaves["Forename"]->printWithIndex(1);
        $this->leaves["Forename"]->printWithIndex(2);
    }
}