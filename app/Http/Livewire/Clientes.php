<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;

class Clientes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $calle, $colonia, $cp, $idHotel, $regimenHotel, $idSucursal, $idVuelo, $claseVuelo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.clientes.view', [
            'clientes' => Cliente::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidoPaterno', 'LIKE', $keyWord)
						->orWhere('apellidoMaterno', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('calle', 'LIKE', $keyWord)
						->orWhere('colonia', 'LIKE', $keyWord)
						->orWhere('cp', 'LIKE', $keyWord)
						->orWhere('idHotel', 'LIKE', $keyWord)
						->orWhere('regimenHotel', 'LIKE', $keyWord)
						->orWhere('idSucursal', 'LIKE', $keyWord)
						->orWhere('idVuelo', 'LIKE', $keyWord)
						->orWhere('claseVuelo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellidoPaterno = null;
		$this->apellidoMaterno = null;
		$this->telefono = null;
		$this->calle = null;
		$this->colonia = null;
		$this->cp = null;
		$this->idHotel = null;
		$this->regimenHotel = null;
		$this->idSucursal = null;
		$this->idVuelo = null;
		$this->claseVuelo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidoPaterno' => 'required',
		'apellidoMaterno' => 'required',
		'telefono' => 'required',
		'calle' => 'required',
		'colonia' => 'required',
		'cp' => 'required',
		'idHotel' => 'required',
		'regimenHotel' => 'required',
		'idSucursal' => 'required',
		'idVuelo' => 'required',
		'claseVuelo' => 'required',
        ]);

        Cliente::create([ 
			'nombre' => $this-> nombre,
			'apellidoPaterno' => $this-> apellidoPaterno,
			'apellidoMaterno' => $this-> apellidoMaterno,
			'telefono' => $this-> telefono,
			'calle' => $this-> calle,
			'colonia' => $this-> colonia,
			'cp' => $this-> cp,
			'idHotel' => $this-> idHotel,
			'regimenHotel' => $this-> regimenHotel,
			'idSucursal' => $this-> idSucursal,
			'idVuelo' => $this-> idVuelo,
			'claseVuelo' => $this-> claseVuelo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Cliente Successfully created.');
    }

    public function edit($id)
    {
        $record = Cliente::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellidoPaterno = $record-> apellidoPaterno;
		$this->apellidoMaterno = $record-> apellidoMaterno;
		$this->telefono = $record-> telefono;
		$this->calle = $record-> calle;
		$this->colonia = $record-> colonia;
		$this->cp = $record-> cp;
		$this->idHotel = $record-> idHotel;
		$this->regimenHotel = $record-> regimenHotel;
		$this->idSucursal = $record-> idSucursal;
		$this->idVuelo = $record-> idVuelo;
		$this->claseVuelo = $record-> claseVuelo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidoPaterno' => 'required',
		'apellidoMaterno' => 'required',
		'telefono' => 'required',
		'calle' => 'required',
		'colonia' => 'required',
		'cp' => 'required',
		'idHotel' => 'required',
		'regimenHotel' => 'required',
		'idSucursal' => 'required',
		'idVuelo' => 'required',
		'claseVuelo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cliente::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidoPaterno' => $this-> apellidoPaterno,
			'apellidoMaterno' => $this-> apellidoMaterno,
			'telefono' => $this-> telefono,
			'calle' => $this-> calle,
			'colonia' => $this-> colonia,
			'cp' => $this-> cp,
			'idHotel' => $this-> idHotel,
			'regimenHotel' => $this-> regimenHotel,
			'idSucursal' => $this-> idSucursal,
			'idVuelo' => $this-> idVuelo,
			'claseVuelo' => $this-> claseVuelo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Cliente Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Cliente::where('id', $id);
            $record->delete();
        }
    }
}
