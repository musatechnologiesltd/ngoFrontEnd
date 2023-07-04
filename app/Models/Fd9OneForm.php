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
        'expire_date',
        'attestation_of_appointment_letter',
        'copy_of_form_nine',
        'foreigner_image',
        'arrival_date_in_nvisa',
        'copy_of_nvisa',

];

public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
