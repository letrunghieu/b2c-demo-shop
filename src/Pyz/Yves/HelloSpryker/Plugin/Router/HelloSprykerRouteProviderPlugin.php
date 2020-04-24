<?php declare(strict_types = 1);

namespace Pyz\Yves\HelloSpryker\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class HelloSprykerRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    private const ROUTE_HELLO_SPRYKER_INDEX = 'hello-spryker-index';

    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addHelloSprykerIndexRoute($routeCollection);

        return $routeCollection;
    }

    protected function addHelloSprykerIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute(
            '/hello-spryker',
            'HelloSpryker',
            'Index',
            'indexAction'
        );
        $routeCollection->add(static::ROUTE_HELLO_SPRYKER_INDEX, $route);

        return $routeCollection;
    }
}
