<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\SearchDoctrineDbalBundle\Tests;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Rollerworks\Bundle\SearchDoctrineDbalBundle\DependencyInjection\DependencyInjectionExtension;

final class SearchExtensionTest extends AbstractExtensionTestCase
{
    public function testServicesAreValid()
    {
        $this->load();

        $serviceIds = array_keys($this->container->findTaggedServiceIds('rollerworks_search.type_extension'));

        foreach ($serviceIds as $service) {
            $this->container->get($service);
        }
    }

    protected function getContainerExtensions()
    {
        return [
            new DependencyInjectionExtension(),
        ];
    }
}
