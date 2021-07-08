<?php

namespace App\Models;

use App\Traits\HasRandomId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfRequest extends Model
{
    use HasFactory, HasRandomId;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_of_requests';

    public $timestamps = false;
}
