<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sucursals';

    protected $fillable = ['nombre','telefono','calle','colonia','cp','numeroPlazas'];
	
}
