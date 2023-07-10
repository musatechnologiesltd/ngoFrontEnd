<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd9OneForm extends Model
{
    use HasFactory;

    public $table = "fd9_one_forms";

    protected $fillable = [
        'fd_one_form_id',
        'foreigner_name_for_subject',
        'sarok_number',
        'application_date',
        'institute_name',
        'prokolpo_name',
        'designation_name',
        'foreigner_name_for_body',
        'expire_from_date',
        'expire_to_date',
        'attestation_of_appointment_letter',
        'copy_of_form_nine',
        'foreigner_image',
        'proposed_from_date',
        'proposed_to_date',
        'arrival_date_in_nvisa',
        'copy_of_nvisa',
        'verified_fd_nine_one_form',
        'status',

];

public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}