<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sucursal;

class Sucursals extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $telefono, $calle, $colonia, $cp, $numeroPlazas;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sucursals.view', [
            'sucursals' => Sucursal::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('calle', 'LIKE', $keyWord)
						->orWhere('colonia', 'LIKE', $keyWord)
						->orWhere('cp', 'LIKE', $keyWord)
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
		'numeroPlazas' => 'required',
        ]);

        Sucursal::create([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'calle' => $this-> calle,
			'colonia' => $this-> colonia,
			'cp' => $this-> cp,
			'numeroPlazas' => $this-> numeroPlazas
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Sucursal Successfully created.');
    }

    public function edit($id)
    {
        $record = Sucursal::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->telefono = $record-> telefono;
		$this->calle = $record-> calle;
		$this->colonia = $record-> colonia;
		$this->cp = $record-> cp;
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
		'numeroPlazas' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sucursal::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'calle' => $this-> calle,
			'colonia' => $this-> colonia,
			'cp' => $this-> cp,
			'numeroPlazas' => $this-> numeroPlazas
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Sucursal Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Sucursal::where('id', $id);
            $record->delete();
        }
    }
}
