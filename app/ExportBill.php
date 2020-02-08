<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportBill extends Model
{
    //
    protected $table = "ExportBill";
    protected $primaryKey = 'id';
     public $timestamps = false;
    public function category()
    {
    	return $this->belongsto('App\Category','idCategory','id');
    }
    public function ExportDetails()
    {
    	return $this->hasMany('App\ExportDetails','idExportBill','id');
    }
    public function staff()
    {
    	{
    	return $this->belongsto('App\Staff','idStaff','id');
    }
    }
}
