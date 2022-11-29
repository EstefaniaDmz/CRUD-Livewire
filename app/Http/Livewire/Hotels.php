<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Hotel;

class Hotels extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $telefono, $calle, $colonia, $cp, $ciudad, $estado, $pais, $numeroPlazas;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.hotels.view', [
            'hotels' => Hotel::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('calle', 'LIKE', $keyWord)
						->orWhere('colonia', 'LIKE', $keyWord)
						->orWhere('cp', 'LIKE', $keyWord)
						->orWhere('ciudad', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('pais', 'LIKE', $keyWord)
						->orWhere('numeroPlazas', 'LIKE', $keyWord)
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
		$this->telefono = null;
		$this->calle = null;
		$this->colonia = null;
		$this->cp = null;
		$this->ciudad = null;
		$this->estado = null;
		$this->pais = null;
		$this->numeroPlazas = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'telefono' => 'required',
		'calle' => 'required',
		'colonia' => 'required',
		'cp' => 'required',
		'ciudad' => 'required',
		'estado' => 'required',
		'pais' => 'required',
		'numeroPlazas' => 'required',
        ]);

        Hotel::create([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'calle' => $this-> calle,
			'colonia' => $this-> colonia,
			'cp' => $this-> cp,
			'ciudad' => $this-> ciudad,
			'estado' => $this-> estado,
			'pais' => $this-> pais,
			'numeroPlazas' => $this-> numeroPlazas
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Hotel Successfully created.');
    }

    public function edit($id)
    {
        $record = Hotel::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->telefono = $record-> telefono;
		$this->calle = $record-> calle;
		$this->colonia = $record-> colonia;
		$this->cp = $record-> cp;
		$this->ciudad = $record-> ciudad;
		$this->estado = $record-> estado;
		$this->pais = $record-> pais;
		$this->numeroPlazas = $record-> numeroPlazas;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'telefono' => 'required',
		'calle' => 'required',
		'colonia' => 'required',
		'cp' => 'required',
		'ciudad' => 'required',
		'estado' => 'required',
		'pais' => 'required',
		'numeroPlazas' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Hotel::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'calle' => $this-> calle,
			'colonia' => $this-> colonia,
			'cp' => $this-> cp,
			'ciudad' => $this-> ciudad,
			'estado' => $this-> estado,
			'pais' => $this-> pais,
			'numeroPlazas' => $this-> numeroPlazas
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Hotel Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Hotel::where('id', $id);
            $record->delete();
        }
    }
}
