<?php namespace Chekote\NounStore;

use ArrayAccess;

class Arr
{
    /**
     * Determines whether the given value is array accessible.
     *
     * @param  mixed $value the value to check.
     * @return bool  true if the value is an array or implements ArrayAccess, false if not.
     */
    public static function accessible(mixed $value): bool
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }

    /**
     * Retrieves a value from an array, an ArrayAccess instance, or an object property.
     *
     * @param  mixed      $target the array or object to retrieve the value from.
     * @param  string|int $key    the array key or object property to retrieve.
     * @return mixed       the value, or null if it does not exist on the target.
     */
    public static function get(mixed $target, string|int $key): mixed
    {
        if (is_array($target)) {
            return array_key_exists($key, $target) ? $target[$key] : null;
        }

        if ($target instanceof ArrayAccess) {
            return $target->offsetExists($key) ? $target[$key] : null;
        }

        if (is_object($target)) {
            return get_object_vars($target)[$key] ?? null;
        }

        return null;
    }
}
