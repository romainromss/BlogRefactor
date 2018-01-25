<?php
namespace Romss;


trait GetField
{
    protected function getField($field)
    {
        if (!empty($_POST) && isset($_POST) )
        return $_POST[$field];
    }

    protected function  getSession($session)
    {
      return $_SESSION[$session] ?? null;
    }
}
