<?php

if (!function_exists('isNotNullAndNotEmptyString')) {
    function isNotNullAndNotEmptyString($value): bool
    {
        return !is_null($value) && $value !== '';
    }
}
