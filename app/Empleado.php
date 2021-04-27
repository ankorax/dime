<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "empleados";
    protected $primaryKey = "empleado_id";
    protected $fillable = ["empleado_id","empleado_nombres", "empleado_boletin", "empleado_email", "empleado_sexo", "area_id", "empleado_experiencia", "rol_id", "created_at", "updated_at"];

    //Relations
    public function area() {
        return $this->belongsTo('App\Area', 'area_id', 'area_id');
    }
}
