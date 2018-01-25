<?php
namespace Romss;

trait GetField
{
    /**
     * @param array $field
     * @return null
     */
    protected function getField($field)
    {
        return $_POST[$field] ?? null;
    }

    /**
     * @param array $session
     * @return null
     */
    protected function  getSession($session)
    {
      return $_SESSION[$session] ?? null;
    }

    /**
     * @param array $files
     * @return null
     */
    protected function getFiles($files)
    {
        return $_FILES[$files] ?? null;
    }
}
