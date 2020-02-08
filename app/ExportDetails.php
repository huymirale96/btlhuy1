<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportDetails extends Model
{
    //
    protected $table = "ExportDetails";
    protected $primaryKey = 'id';
     public $timestamps = false;
    public function ExportBill()
    {
    	return belongsTo('App\ExportBill','idExportBill','id');
    }
    public function product()
    {
    	return belongsTo('App\Product','idProduct','id');
    }
}
