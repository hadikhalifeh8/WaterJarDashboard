<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DistrictsModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'districts';
    protected $guarded=[];




     public function towns_rltn()
     {
         return $this->belongsTo(TownsModel::class, 'town_id');
     }
}
