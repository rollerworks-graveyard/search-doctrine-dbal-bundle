<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\SearchDoctrineDbalBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    private $rootName;

    public function __construct($rootName)
    {
        $this->rootName = $rootName;
    }

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root($this->rootName);
        $rootNode
            ->children()
                ->scalarNode('cache_driver')->defaultValue('rollerworks_search.doctrine_dbal.cache.array_driver')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
