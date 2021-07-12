<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class popularPlacesModel extends Model
{
    
    public $table='popularPlaces';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
