<?php
namespace SimpleWrapper;

use Klein\Klein;
use Guzzle\Http\Message\Request;
use Portfolio\Portfolio;
use Twig_Environment as Twig;

class SimpleWrapper
{
    /*
     * @var Twig
     */
    protected $twig;

    /*
     * @var array
     */
    protected $config;

    /**
     * @var Klein
     */
    protected $router;

    /**
     * @var string
     */
    protected $route;

    public function __construct($route, Twig $twig, Klein $router, $config)
    {
        $this->route = $route;
        $this->twig = $twig;
        $this->router = $router;
        $this->config = $config;
    }

    public function routeOrPrepare()
    {
        $route = $this->route;
        // Quickly check for a direct, easy match...
        if (isset($this->config["routes"]) && array_key_exists($route, $this->config["routes"])) {
            $route = $this->config["routes"][$route];
            $controller = new $route["controller"]($this->twig, $this->config);
            $controller->$route["method"]();
        } else {
            $this->matchRoutes();
        }
    }

    public function matchRoutes()
    {
        $twig = $this->twig;
        $config = $this->config;

        $this->router->respond("GET", "/", function() {
            echo $this->twig->loadTemplate(Portfolio::SITE_PREFIX . "/index.html.twig")->render([]);
        });

        $this->router->respond("GET", "/[:name]", function($request) use ($twig, $config){
            $controller = new Portfolio($twig, $config);
            $controller->aboutMe(["name" => $request->name]);
        });

        $this->router->dispatch();
    }
}
