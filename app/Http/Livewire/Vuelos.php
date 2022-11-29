<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vuelo;

class Vuelos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $hora, $numeroPlazas, $ciudadOrigen, $estadoOrigen, $paisOrigen, $ciudadDestino, $estadoDestino, $paisDestino;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.vuelos.view', [
            'vuelos' => Vuelo::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('hora', 'LIKE', $keyWord)
						->orWhere('numeroPlazas', 'LIKE', $keyWord)
						->orWhere('ciudadOrigen', 'LIKE', $keyWord)
						->orWhere('estadoOrigen', 'LIKE', $keyWord)
						->orWhere('paisOrigen', 'LIKE', $keyWord)
						->orWhere('ciudadDestino', 'LIKE', $keyWord)
						->orWhere('estadoDestino', 'LIKE', $keyWord)
						->orWhere('paisDestino', 'LIKE', $keyWord)
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
		$this->fecha = null;
		$this->hora = null;
		$this->numeroPlazas = null;
		$this->ciudadOrigen = null;
		$this->estadoOrigen = null;
		$this->paisOrigen = null;
		$this->ciudadDestino = null;
		$this->estadoDestino = null;
		$this->paisDestino = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'numeroPlazas' => 'required',
		'ciudadOrigen' => 'required',
		'estadoOrigen' => 'required',
		'paisOrigen' => 'required',
		'ciudadDestino' => 'required',
		'estadoDestino' => 'required',
		'paisDestino' => 'required',
        ]);

        Vuelo::create([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'numeroPlazas' => $this-> numeroPlazas,
			'ciudadOrigen' => $this-> ciudadOrigen,
			'estadoOrigen' => $this-> estadoOrigen,
			'paisOrigen' => $this-> paisOrigen,
			'ciudadDestino' => $this-> ciudadDestino,
			'estadoDestino' => $this-> estadoDestino,
			'paisDestino' => $this-> paisDestino
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Vuelo Successfully created.');
    }

    public function edit($id)
    {
        $record = Vuelo::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->hora = $record-> hora;
		$this->numeroPlazas = $record-> numeroPlazas;
		$this->ciudadOrigen = $record-> ciudadOrigen;
		$this->estadoOrigen = $record-> estadoOrigen;
		$this->paisOrigen = $record-> paisOrigen;
		$this->ciudadDestino = $record-> ciudadDestino;
		$this->estadoDestino = $record-> estadoDestino;
		$this->paisDestino = $record-> paisDestino;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'numeroPlazas' => 'required',
		'ciudadOrigen' => 'required',
		'estadoOrigen' => 'required',
		'paisOrigen' => 'required',
		'ciudadDestino' => 'required',
		'estadoDestino' => 'required',
		'paisDestino' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Vuelo::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'numeroPlazas' => $this-> numeroPlazas,
			'ciudadOrigen' => $this-> ciudadOrigen,
			'estadoOrigen' => $this-> estadoOrigen,
			'paisOrigen' => $this-> paisOrigen,
			'ciudadDestino' => $this-> ciudadDestino,
			'estadoDestino' => $this-> estadoDestino,
			'paisDestino' => $this-> paisDestino
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Vuelo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Vuelo::where('id', $id);
            $record->delete();
        }
    }
}
