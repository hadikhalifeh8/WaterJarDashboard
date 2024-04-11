<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DriversModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'drivers';
    protected $guarded=[];



    // public function customer_rltn()
    // {
    //     return $this->belongsTo(CustomersModel::class, 'customer_id');
    // }


}
