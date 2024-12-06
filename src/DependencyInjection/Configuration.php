<?php

declare(strict_types=1);

namespace Vivan\SyliusHasOrderedTodayPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('vivan_sylius_has_ordered_today_plugin');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
