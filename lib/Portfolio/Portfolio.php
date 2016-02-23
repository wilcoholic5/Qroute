<?php
namespace Portfolio;

class Portfolio extends AbstractController
{
    public function index()
    {
        echo $this->twig->loadTemplate("portfolio/index.php")->render([]);
    }
}