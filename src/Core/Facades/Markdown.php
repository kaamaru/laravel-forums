<?php namespace B50\Forums\Core\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Parsedown facade
 *
 * @package App\Facades
 */
class Markdown extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'markdown';
    }
}
