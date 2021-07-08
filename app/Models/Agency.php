<?php

namespace App\Models;

use App\Traits\HasRandomId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory, HasRandomId;

    public $timestamps = false;
}
