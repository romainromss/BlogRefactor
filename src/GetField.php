<?php
namespace Romss;

trait GetField
{
    protected function getField($field)
    {
        return $_POST[$field] ?? null;
    }

    protected function  getSession($session)
    {
      return $_SESSION[$session] ?? null;
    }
}
