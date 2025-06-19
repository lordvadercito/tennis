<?php declare(strict_types=1);

namespace Tennis\Domain\Shared;

abstract class Collection implements \Countable
{
 public function __construct(protected array $items = [])
 {
    Assert::arrayOf($this->type(), $items);
 }

 abstract protected function type(): string;

protected function items(): array
{
    return $this->items;
}

public function shuffle(): void
{
    shuffle($this->items);
}

public function count(): int
{
    return count($this->items);
}
}