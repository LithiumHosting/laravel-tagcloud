<?php

namespace LithiumDev\TagCloud\Facade;


use Illuminate\Support\Facades\Facade;

class TagCloud extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TagCloud';
    }
}
