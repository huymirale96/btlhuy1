<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "Category";
    protected $primaryKey = 'id';

    public function Warehouse()
    {
    	return $this->belongsto('App\Warehouse','idWareHouse','id');
    }
    public function ExportBill()
    {
    	return $this->hasmany('ExportBill','idCategory','id');
    }
    public function ImportBill()
    {
    	return $this->hasmany('ImportBill','idCategory','id');
    }
}
