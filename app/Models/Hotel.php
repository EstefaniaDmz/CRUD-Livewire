<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'hotels';

    protected $fillable = ['nombre','telefono','calle','colonia','cp','ciudad','estado','pais','numeroPlazas'];
	
}
