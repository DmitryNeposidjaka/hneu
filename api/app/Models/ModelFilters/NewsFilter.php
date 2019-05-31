<?php namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class NewsFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function lang($lang)
    {
        return $this->where('lang',  $lang);
    }

    public function type($type)
    {
        return $this->where('type', $type);
    }

    public function title($name)
    {
        return $this->where('title', 'like', "%{$name}%");
    }
/*    public function name($name)
    {
        return $this->where('firstname', 'like', "%{$name}%")->orWhere('lastname', 'like', "%{$name}%");
    }

    public function email($email)
    {
        return $this->where('email', 'like', "%{$email}%");
    }

    public function username($username)
    {
        return $this->where('username', 'like', "%{$username}%");
    }*/
}
