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

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use Rollerworks\Bundle\SearchDoctrineDbalBundle\DependencyInjection\Configuration;
use Rollerworks\Bundle\SearchDoctrineDbalBundle\DependencyInjection\DependencyInjectionExtension;

class ExtensionConfigurationTest extends AbstractExtensionConfigurationTestCase
{
    public function testSupportsAllConfigFormats()
    {
        $expectedConfiguration = [
            'cache_driver' => null,
        ];

        $formats = array_map(
            function ($path) {
                return __DIR__.'/../Resources/Fixtures/'.$path;
            },
            [
                'config/config.yml',
                'config/config.xml',
                'config/config.php',
            ]
        );

        foreach ($formats as $format) {
            $this->assertProcessedConfigurationEquals($expectedConfiguration, [$format]);
        }
    }

    protected function getContainerExtension()
    {
        return new DependencyInjectionExtension();
    }

    protected function getConfiguration()
    {
        return new Configuration(DependencyInjectionExtension::EXTENSION_ALIAS);
    }
}
