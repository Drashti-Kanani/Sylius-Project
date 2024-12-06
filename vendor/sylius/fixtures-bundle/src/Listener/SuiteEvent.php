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

use Sylius\Bundle\FixturesBundle\Suite\SuiteInterface;

final class SuiteEvent
{
    public function __construct(private SuiteInterface $suite)
    {
    }

    public function suite(): SuiteInterface
    {
        return $this->suite;
    }
}
