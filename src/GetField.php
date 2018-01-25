<?php
namespace Romss;

trait GetField
{
    protected function getField($field)
    {
        return $_POST[$field] ?? null;
    }
}