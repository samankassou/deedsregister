<?php

namespace App\Models;

use App\Traits\HasRandomId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory, HasRandomId;

    protected $fillable = ['name'];

    public $timestamps = false;
}
