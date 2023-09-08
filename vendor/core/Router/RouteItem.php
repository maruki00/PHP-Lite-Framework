<?php

namespace Core\Router;

class RouteItem
{
    private string $prefix      = '';
    private string $route       = '';
    private string $action      = '';
    private array  $middlwares  = [];
    private string $httpMethod  = '';
    private        $callback    = null;

    /**
     * @return null
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param null $callback
     */
    public function setCallback(callable $callback): void
    {
        $this->callback = $callback;
    }
    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getMiddlwares()
    {
        return $this->middlwares;
    }

    /**
     * @param string $middlware
     */
    public function setMiddlware(array $middlwares)
    {
        $this->middlwares = $middlwares;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @param string $httpMethod
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

}