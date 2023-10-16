<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoNameChange extends Model
{
    use HasFactory;

    protected $table = "ngo_name_changes";

    protected $fillable = [
        'fd_one_form_id',
        'previous_name_eng',
        'previous_name_ban',
        'present_name_eng',
        'present_name_ban',
        'status',
        'time_for_api',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
