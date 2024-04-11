<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CustomersModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'customers';
    protected $guarded=[];



    public function towns_rltn()
    {
        return $this->belongsTo(TownsModel::class, 'town_id');
    }


    public function district_rltn()
    {
        return $this->belongsTo(DistrictsModel::class, 'district_id');
    }


    // public function serepta_rltn()
    // {
    //     return $this->belongsTo(SereptaModel::class, 'serepta_id');
    // }


    // public function tannourine_rltn()
    // {
    //     return $this->belongsTo(TannourineModel::class, 'tannouurine_id');
    // }

    public function driver_rltn()
    {
        return $this->belongsTo(DriversModel::class, 'driver_id');
    }


}
