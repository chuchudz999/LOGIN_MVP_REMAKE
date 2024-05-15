<?php

namespace App\Pages;

use Smarty;

abstract class AbstractPage
{
    protected $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../templates');

    }

    abstract public function render();
}
