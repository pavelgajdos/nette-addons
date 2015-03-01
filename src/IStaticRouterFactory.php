<?php

namespace PG\Routing\Factory;

interface IStaticRouterFactory
{
    public static function addRoutes(\Nette\Application\Routers\RouteList $router);
}