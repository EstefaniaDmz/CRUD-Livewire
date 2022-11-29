<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'clientes';

    protected $fillable = ['nombre','apellidoPaterno','apellidoMaterno','telefono','calle','colonia','cp','idHotel','regimenHotel','idSucursal','idVuelo','claseVuelo'];
	
}
