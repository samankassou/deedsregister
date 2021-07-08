<?php

namespace App\Traits;


trait HasRandomId
{
    /**
     * Get random id or array of ids from database.
     *
     * @param  int  $number
     * @return int|array
     */
    public static function getRandomId(int $number = null)
    {
        if (is_null($number)) {
            return Self::all(['*'])->random(1)->first()->id;
        }
        return
            Self::all(['*'])->random((int)$number)->toArray();
    }
}
