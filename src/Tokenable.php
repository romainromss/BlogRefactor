<?php

namespace Romss;

trait Tokenable
{
    protected function generateToken()
    {
        return hash('sha512', uniqid().'---'.time());
    }
}
