<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";
    protected $primaryKey = "area_id";
    protected $fillable = ["area_id", "area_nombre"];
    public $timestamps = false;

    //Relations
    public function empleados() {
        return $this->hasMany('App\Empleado', 'area_id', 'area_id');
    }
}
