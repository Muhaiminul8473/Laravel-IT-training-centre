<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_model extends Model
{
    public $table='contact';
    public $primaryKey='id';
    public $incrementing = true;
    public $keyType = 'int'; 
    public $timestamps=false;
}
