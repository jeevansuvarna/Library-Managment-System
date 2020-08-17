<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class library extends Model
{
    protected  $table='libraries';
	protected $fillable=['book_name','Author_name','genre','summary','edition','copies','images'];
    protected $primarykey='id';
}