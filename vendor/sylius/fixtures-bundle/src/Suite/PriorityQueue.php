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

namespace Sylius\Bundle\FixturesBundle\Suite;

/**
 * @internal
 *
 * @implements \IteratorAggregate<int, array<mixed>>
 */
final class PriorityQueue implements \IteratorAggregate
{
    /** @var array<int, array{data: array<mixed>, priority: int}> */
    private array $records = [];

    private bool $sorted = false;

    /** @param array<mixed> $data */
    public function insert(array $data, int $priority = 0): void
    {
        $this->records[] = ['priority' => $priority, 'data' => $data];
        $this->sorted = false;
    }

    /** @return \Traversable<array<mixed>> */
    public function getIterator(): \Traversable
    {
        if ($this->sorted === false) {
            array_multisort(
                /** @phpstan-ignore-next-line Doing PHP magic, it works this way */
                array_column($this->records, 'priority'),
                \SORT_DESC,
                array_keys($this->records),
                \SORT_ASC,
                $this->records,
            );

            $this->sorted = true;
        }

        foreach ($this->records as $record) {
            yield $record['data'];
        }
    }
}
