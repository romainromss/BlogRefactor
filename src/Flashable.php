<?php

namespace Romss;

trait Flashable
{
    protected function setFlash($type, $content)
    {
        $_SESSION['flash'] = compact('type', 'content');
    }
}
