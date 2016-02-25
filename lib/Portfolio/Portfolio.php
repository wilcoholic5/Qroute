<?php
namespace Portfolio;

class Portfolio extends AbstractController
{
    CONST SITE_PREFIX = "portfolio";

    public function index()
    {
        echo $this->twig->loadTemplate(SELF::SITE_PREFIX . "/index.html.twig")->render(["root" => $this->config["publicRoot"]]);
    }
}