<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deed extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_of_receipt_of_the_request', 'writting_end_date', 'signature_date',
        'writting_completion_date', 'registration_sending_date',
        'registration_return_date', 'file_completion_date', 'filing_date',
        'file_withdrawal_date', 'date_of_transmission_to_the_BO'
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
        'warranty_id', 'agency_id'
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

    public function typeOfRequests()
    {
        return $this->belongsToMany(TypeOfRequest::class, 'deed_type_of_request', 'deed_id', 'type_of_request_id')->withTimestamps();
    }
}
