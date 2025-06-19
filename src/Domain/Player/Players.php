<?php declare(strict_types=1);

namespace Tennis\Domain\Player;

use ArrayAccess;
use Tennis\Domain\Shared\Collection;

class Players extends Collection implements ArrayAccess
{
  /**
   * @var array
   */
  protected function type(): string
  {
    return Player::class;
  }

  public function offsetExists($offset): bool
  {
    return isset($this->items[$offset]);
  }

  public function offsetGet($offset): mixed
  {
    return $this->items[$offset] ?? null;
  }

  public function offsetSet($offset, $value): void
  {
    if ($value === null) {
      throw new \InvalidArgumentException('Cannot set null value in Players collection');
    }
    
    if ($offset === null) {
      $this->items[] = $value;
    } else {
      $this->items[$offset] = $value;
    }
  }

  public function offsetUnset($offset): void
  {
    unset($this->items[$offset]);
  }
}