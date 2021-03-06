<?php

declare(strict_types=1);

namespace MezzioTest\Tooling\Factory\TestAsset;

use Psr\Container\ContainerInterface;

class InvokableObjectFactory
{
    public function __invoke(ContainerInterface $container) : InvokableObject
    {
        return new InvokableObject();
    }
}
