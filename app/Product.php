<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "Product";
    protected $primaryKey = 'id';
     public $timestamps = false;

    // public function ExportDetails()
    // {
    // 	return this->hasmany('App\ExportDetails','idProduct','id');
    // }
    // public function ImportDetails()
    // {
    // 	return this->hasmany('App\ImportDetails','idProduct','id');
    // }

}
