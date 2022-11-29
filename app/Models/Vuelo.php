<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'vuelos';

    protected $fillable = ['fecha','hora','numeroPlazas','ciudadOrigen','estadoOrigen','paisOrigen','ciudadDestino','estadoDestino','paisDestino'];
	
}
