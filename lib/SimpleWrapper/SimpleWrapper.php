<?php
namespace SimpleWrapper;

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

    public function __construct(Twig $twig, $config)
    {
        $this->twig = $twig;
        $this->config = $config;
    }

    public function routeOrPrepare($request)
    {
        $route = $request["REQUEST_URI"];
        // Quickly check for a direct, easy match...
        if (array_key_exists($route, $this->config["routes"])) {
            $route = $this->config["routes"][$route];
            $controller = new $route["controller"]($this->twig, $this->config);
            $controller->$route["method"]();
        } else {
            return [
                "route" => $route
            ];
        }
    }
}
