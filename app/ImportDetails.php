<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDetails extends Model
{
    //
    protected $table = "ImportDetails";
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function ImportBill()
    {
    	return belongsTo('App\ImportBill','idImportBill','id');
    }
    public function Product()
    {
    	return belongsTo('App\Product','idProduct','id');
    }
}
