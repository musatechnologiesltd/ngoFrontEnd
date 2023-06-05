<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoStatus extends Model
{
    use HasFactory;

    public $table = "ngo_statuses";

    protected $fillable = [
        'email',
        'reg_type',
        'reg_id',
        'print_date',
        'status',
        'fd_one_form_id',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
