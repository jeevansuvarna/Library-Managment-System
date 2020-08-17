<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class people extends Model
{
    protected  $table='people';
	protected $fillable=['name','email','password','phone'];
    protected $primarykey='id';
}
