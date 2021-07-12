<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class popularDestination extends Model
{
    public $table='popularDestination';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
