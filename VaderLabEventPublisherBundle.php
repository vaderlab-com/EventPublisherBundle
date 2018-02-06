<?php

namespace VaderLab\EventPublisherBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use VaderLab\EventPublisherBundle\DependencyInjection\VaderLabEventPublisherExtension;

class VaderLabEventPublisherBundle extends Bundle
{

    public function getContainerExtension()
    {
        return new VaderLabEventPublisherExtension();
    }
}
