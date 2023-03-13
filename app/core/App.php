<?php

/**
 * 
 */
class App
{
    /* Set Default Value */
    protected $controller = 'Home'; /* default controller */
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if ($url == NULL) {
            $url = [$this->controller];
        }
        /* Controller */
        /* Check if file controller exists */
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            /* Set controller value */
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        /* Method */
        /* Check if method exist */
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        /* Params */
        if (!empty($url)) {
            $this->params = array_values($url);
            //echo '<pre>' . var_export($url, true) . '</pre>';
        }

        /* Run Controller and Method and send Params if exists */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
