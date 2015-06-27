<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\SearchDoctrineDbalBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Rollerworks\Bundle\SearchDoctrineDbalBundle\DependencyInjection\DependencyInjectionExtension;

final class DependencyInjectionExtensionTest extends AbstractExtensionTestCase
{
    public function testFactoryIsAccessible()
    {
        $this->load();
        $this->compile();

        $this->container->get('rollerworks_search.doctrine_dbal.factory');
    }

    public function tesWithCustomEntityManagers()
    {
        $config = [
            'cache_driver' => 'acme_test.dbal.cache_driver',
        ];

        $this->registerService('acme_test.dbal.cache_driver', 'Doctrine\Common\Cache\PhpFileCache');

        $this->load($config);
        $this->compile();

        $this->assertContainerBuilderHasService(
            'rollerworks_search.doctrine_dbal.cache_driver',
            'Doctrine\Common\Cache\PhpFileCache'
        );
    }

    protected function getContainerExtensions()
    {
        return [
            new DependencyInjectionExtension(),
        ];
    }
}
