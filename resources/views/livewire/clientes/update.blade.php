<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="apellidoPaterno"></label>
                <input wire:model="apellidoPaterno" type="text" class="form-control" id="apellidoPaterno" placeholder="Apellidopaterno">@error('apellidoPaterno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="apellidoMaterno"></label>
                <input wire:model="apellidoMaterno" type="text" class="form-control" id="apellidoMaterno" placeholder="Apellidomaterno">@error('apellidoMaterno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="telefono"></label>
                <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Telefono">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="calle"></label>
                <input wire:model="calle" type="text" class="form-control" id="calle" placeholder="Calle">@error('calle') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="colonia"></label>
                <input wire:model="colonia" type="text" class="form-control" id="colonia" placeholder="Colonia">@error('colonia') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cp"></label>
                <input wire:model="cp" type="text" class="form-control" id="cp" placeholder="Cp">@error('cp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="idHotel"></label>
                <input wire:model="idHotel" type="text" class="form-control" id="idHotel" placeholder="Idhotel">@error('idHotel') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="regimenHotel"></label>
                <input wire:model="regimenHotel" type="text" class="form-control" id="regimenHotel" placeholder="Regimenhotel">@error('regimenHotel') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="idSucursal"></label>
                <input wire:model="idSucursal" type="text" class="form-control" id="idSucursal" placeholder="Idsucursal">@error('idSucursal') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="idVuelo"></label>
                <input wire:model="idVuelo" type="text" class="form-control" id="idVuelo" placeholder="Idvuelo">@error('idVuelo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="claseVuelo"></label>
                <input wire:model="claseVuelo" type="text" class="form-control" id="claseVuelo" placeholder="Clasevuelo">@error('claseVuelo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
