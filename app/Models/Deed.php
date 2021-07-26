<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Deed extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_of_receipt_of_the_request' => 'date:Y-m-d',
        'writting_end_date'              => 'date:Y-m-d',
        'signature_date'                 => 'date:Y-m-d',
        'writting_completion_date'       => 'date:Y-m-d',
        'registration_sending_date'      => 'date:Y-m-d',
        'registration_return_date'       => 'date:Y-m-d',
        'file_completion_date'           => 'date:Y-m-d',
        'filing_date'                    => 'date:Y-m-d',
        'file_withdrawal_date'           => 'date:Y-m-d',
        'date_of_transmission_to_the_BO' => 'date:Y-m-d'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client', 'client_code', 'notary', 'correspondent_of_the_notary',
        'purpose_of_the_credit',
        'reference_of_credit_decision', 'date_of_receipt_of_the_request',
        'tax_notice_reference', 'debit_advice_notified', 'writting_end_date',
        'signature_date', 'writting_completion_date', 'writting_amount',
        'registration_sending_date', 'registration_return_date',
        'registration_amount', 'file_completion_date', 'filing_date', 'file_withdrawal_date',
        'date_of_transmission_to_the_BO', 'inscription_amount', 'pole_id',
        'warranty_id', 'agency_id', 'updated_by',
        'created_by', 'deleted_by'
    ];

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

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function typeOfRequests()
    {
        return $this->belongsToMany(TypeOfRequest::class, 'deed_type_of_request', 'deed_id', 'type_of_request_id')->withTimestamps();
    }
}
