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

use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;
use Sylius\Bundle\FixturesBundle\Suite\SuiteInterface;

final class FixtureEvent
{
    /** @param array<mixed> $fixtureOptions */
    public function __construct(
        private SuiteInterface $suite,
        private FixtureInterface $fixture,
        private array $fixtureOptions,
    ) {
    }

    public function suite(): SuiteInterface
    {
        return $this->suite;
    }

    public function fixture(): FixtureInterface
    {
        return $this->fixture;
    }

    /** @return array<mixed> */
    public function fixtureOptions(): array
    {
        return $this->fixtureOptions;
    }
}
