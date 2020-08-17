<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected  $table='admins';
	protected $fillable=['name','password','phone'];
    protected $primarykey='id';
}
