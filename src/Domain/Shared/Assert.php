<?php declare(strict_types=1);

namespace Tennis\Domain\Shared;

use InvalidArgumentException;

final class Assert
{
    public static function arrayOf(string $class, array $items): void
    {
        foreach ($items as $item) {
            self::instanceOf($class, $item);
        }
    }

  public static function instanceOf(string $class, $item): void
{
    if (!$item instanceof $class) {
        $type = is_object($item) ? get_class($item) : gettype($item);
        throw new InvalidArgumentException(
            sprintf('The object <%s> is not an instance of <%s>', $class, $type)
        );
    }
}
}
