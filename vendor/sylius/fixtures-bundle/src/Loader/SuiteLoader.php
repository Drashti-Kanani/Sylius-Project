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

namespace Sylius\Bundle\FixturesBundle\Loader;

use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;
use Sylius\Bundle\FixturesBundle\Suite\SuiteInterface;

final class SuiteLoader implements SuiteLoaderInterface
{
    public function __construct(private FixtureLoaderInterface $fixtureLoader)
    {
    }

    public function load(SuiteInterface $suite): void
    {
        /** @var FixtureInterface $fixture */
        foreach ($suite->getFixtures() as $fixture => $fixtureOptions) {
            $this->fixtureLoader->load($suite, $fixture, $fixtureOptions);
        }
    }
}
