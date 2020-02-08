<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportBill extends Model
{
    //
    protected $table = "ImportBill";
    protected $primaryKey = 'id';
    public $timestamps = false;

     public function Category()
    {
    	return $this->belongsto('App\Category','idCategoty','id');
    }
    public function ImportDetails()
    {
    	return hasmany('App\ImportDetails','idImportBill','id');
    }
}
