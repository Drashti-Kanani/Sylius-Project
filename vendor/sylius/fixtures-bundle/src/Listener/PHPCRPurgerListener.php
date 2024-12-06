<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\FixturesBundle\Listener;

use Doctrine\Common\DataFixtures\Purger\PHPCRPurger;
use Doctrine\ODM\PHPCR\DocumentManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class PHPCRPurgerListener extends AbstractListener implements BeforeSuiteListenerInterface
{
    public function __construct(private ManagerRegistry $managerRegistry)
    {
    }

    /** @param array{managers: string[]} $options */
    public function beforeSuite(SuiteEvent $suiteEvent, array $options): void
    {
        foreach ($options['managers'] as $managerName) {
            /** @var DocumentManagerInterface $manager */
            $manager = $this->managerRegistry->getManager($managerName);

            $purger = new PHPCRPurger($manager);
            $purger->purge();
        }
    }

    public function getName(): string
    {
        return 'phpcr_purger';
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->arrayNode('managers')
                    ->defaultValue([null])
                    ->scalarPrototype()
        ;
    }
}
