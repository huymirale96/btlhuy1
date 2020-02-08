<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected $table = "Warehouse";
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Category()
     {
     	return $this->hasMany('App\Category','idWareHouse','id');
     }
 }