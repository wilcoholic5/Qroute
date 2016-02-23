<?php
namespace Portfolio;

use \Twig_Environment as Twig;

class AbstractController
{
    /*
     * @var Twig
     */
    protected $twig;

    /*
     * @var array
     */
    protected $config;

    public function __construct(Twig $twig, $config)
    {
        $this->twig = $twig;
        $this->config = $config;
    }
}