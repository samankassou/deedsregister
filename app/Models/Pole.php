<?php

namespace App\Models;

use App\Traits\HasRandomId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pole extends Model
{
    use HasFactory, HasRandomId;

    public $timestamps = false;

    public function deeds()
    {
        return $this->hasMany(Deed::class);
    }
}
