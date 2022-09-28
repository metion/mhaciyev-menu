<?php

if (!function_exists('getCacheNameFromClass')) {
    function getCacheNameFromClass($className): string
    {
        return \Str::slug(class_basename($className) . "_cache", '_');
    }
}
