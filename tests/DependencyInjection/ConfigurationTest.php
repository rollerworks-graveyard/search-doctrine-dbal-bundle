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

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use Rollerworks\Bundle\SearchDoctrineDbalBundle\DependencyInjection\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    public function testDefaultsAreValid()
    {
        $this->assertProcessedConfigurationEquals(
            [
                [],
            ],
            [
                'cache_driver' => 'rollerworks_search.doctrine_dbal.cache.array_driver',
            ]
        );
    }

    protected function getConfiguration()
    {
        return new Configuration('search_dbal');
    }
}
