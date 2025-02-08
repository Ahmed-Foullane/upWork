<?php
namespace app\routers;
class Routes
{
    const DEFAULT_CONTROLLER = 'home';
    const DEFAULT_METHOD = 'index';
    private $controller;
    private $method;
    private $params = [];
    public function __construct()
    {
        $this->controller = self::DEFAULT_CONTROLLER;
        $this->method = self::DEFAULT_METHOD;
        $url = $this->getUrl();
        if (isset($url[0])) {
            $controllerClass = ucwords($url[0]);
            if (class_exists('\\app\\controllers\\' . $controllerClass . 'Controller')) {
                $this->controller = $controllerClass;
            }
        }
        $controllerClass = '\\app\\controllers\\' . $this->controller . 'Controller';
        $this->controller = new $controllerClass;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            }
        }
        if (!empty($_REQUEST)) {
            $this->params = array_values($_REQUEST);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function getUrl(): array
    {
        $uri = $_SERVER['PATH_INFO'] ?? '/';
        $uri = trim($uri, '/'); 
        return explode('/', $uri);
    }
    private function getBasePaths()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
