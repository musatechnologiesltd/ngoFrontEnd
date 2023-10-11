<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoRenew extends Model
{
    use HasFactory;

    public $table = "ngo_renews";

    protected $fillable = [

        'fd_one_form_id',
        'status',
        'comment',
        'time_for_api',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }


}
