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

    public function setDateOfReceiptOfTheRequestAttribute($value)
    {
        if ($value)
            $this->attributes['date_of_receipt_of_the_request'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setWrittingEndDateAttribute($value)
    {
        if ($value)
            $this->attributes['writting_end_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setSignatureDateAttribute($value)
    {
        if ($value)
            $this->attributes['signature_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setWrittingCompletionDateAttribute($value)
    {
        if ($value)
            $this->attributes['writting_completion_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setRegistrationSendingDateAttribute($value)
    {
        if ($value)
            $this->attributes['registration_sending_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setRegistrationReturnDateAttribute($value)
    {
        if ($value)
            $this->attributes['registration_return_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setFileCompletionDateAttribute($value)
    {
        if ($value)
            $this->attributes['file_completion_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setFilingDateAttribute($value)
    {
        if ($value)
            $this->attributes['filing_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setFileWithdrawalDateAttribute($value)
    {
        if ($value)
            $this->attributes['file_withdrawal_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDateOfTransmissionToTheBOAttribute($value)
    {
        if ($value)
            $this->attributes['date_of_transmission_to_the_BO'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

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
