<?php

namespace Romss\Render;


interface IRender
{
    /**
     * @param string $namespace
     * @param null|string $path
     */
    public  function addPath(string $namespace, ?string $path = null): void;

    /**
     * @param string $view
     * @return mixed
     */
    public  function  render(string  $view,  array $params = null);

    /**
     * @param string $key
     * @param $value
     */
    public function  addGlobal(string  $key, $value): void;

}