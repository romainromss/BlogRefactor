<?php

namespace Romss;

class ActionsControllers
{
    public function setFlash($type, $content)
    {
        $_SESSION['flash'] = compact('type', 'content');
    }

    public function redirect($url)
    {
        header('HTTP/1.1 301 Moved Permanently', false, 301);
        header('Location: ' . $url);
        exit();
    }
}