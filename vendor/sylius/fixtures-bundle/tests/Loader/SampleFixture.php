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

namespace Sylius\Bundle\FixturesBundle\Tests\Loader;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;

final class SampleFixture extends AbstractFixture
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /** @param array<string, array<mixed>> $options */
    public function load(array $options): void
    {
        $statement = $this->entityManager
            ->getConnection()
            ->prepare('INSERT INTO testTable VALUES (:test);')
        ;

        $statement->bindValue('test', 'test');
        $statement->executeStatement();
    }

    public function getName(): string
    {
        return 'sample_fixture';
    }
}
