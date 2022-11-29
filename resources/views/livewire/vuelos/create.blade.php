<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Vuelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="fecha"></label>
                <input wire:model="fecha" type="text" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="hora"></label>
                <input wire:model="hora" type="text" class="form-control" id="hora" placeholder="Hora">@error('hora') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="numeroPlazas"></label>
                <input wire:model="numeroPlazas" type="text" class="form-control" id="numeroPlazas" placeholder="Numeroplazas">@error('numeroPlazas') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ciudadOrigen"></label>
                <input wire:model="ciudadOrigen" type="text" class="form-control" id="ciudadOrigen" placeholder="Ciudadorigen">@error('ciudadOrigen') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="estadoOrigen"></label>
                <input wire:model="estadoOrigen" type="text" class="form-control" id="estadoOrigen" placeholder="Estadoorigen">@error('estadoOrigen') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="paisOrigen"></label>
                <input wire:model="paisOrigen" type="text" class="form-control" id="paisOrigen" placeholder="Paisorigen">@error('paisOrigen') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ciudadDestino"></label>
                <input wire:model="ciudadDestino" type="text" class="form-control" id="ciudadDestino" placeholder="Ciudaddestino">@error('ciudadDestino') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="estadoDestino"></label>
                <input wire:model="estadoDestino" type="text" class="form-control" id="estadoDestino" placeholder="Estadodestino">@error('estadoDestino') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="paisDestino"></label>
                <input wire:model="paisDestino" type="text" class="form-control" id="paisDestino" placeholder="Paisdestino">@error('paisDestino') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
