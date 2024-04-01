      {{-- ****************************************************************** --}}
      {{-- Nombre --}}
      {{-- ****************************************************************** --}}

        <label >Codigo:</label>
        <br>
        @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror

      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" ><i class="fa fa-tag"></i></span>
          </div>

          <input autofocus type="text" wire:model.defer="codigo" class="form-control" id="_cat" placeholder="Nombre de Codigo" >

      </div>

      {{-- ****************************************************************** --}}
      {{-- Descripcion --}}
      {{-- ****************************************************************** --}}

      <label >Descripcion:</label>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
          <span class="input-group-text" ><i class="fa fa-pen"></i></span>
          </div>
          <input type="text" wire:model.defer="descripcion" class="form-control" placeholder="Descripcion de Codigo" >

      </div>