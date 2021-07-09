<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deed extends Model
{
    use HasFactory, SoftDeletes;

    public function pole()
    {
        return $this->belongsTo(Pole::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function typeOfRequests()
    {
        return $this->belongsToMany(TypeOfRequest::class, 'deed_type_of_request', 'deed_id', 'type_of_request_id')->withTimestamps();
    }
}
