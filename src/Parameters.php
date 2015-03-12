<?php
/**
 * @author Pavel Gajdos (info@pavelgajdos.cz)
 * @date 12.03.15
 */

namespace PG\Config;


use Nette\DI\Container;

class Parameters
{
    private $parameters;

    public function __construct(Container $container)
    {
        $this->parameters = $container->parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getParameter($name)
    {
        return $this->parameters[$name];
    }
} 