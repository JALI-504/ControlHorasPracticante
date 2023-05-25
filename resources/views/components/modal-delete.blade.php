<div>
    <div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="Modal para eliminar"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Eliminar Horas</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="color: black">
            <p>¿Desea eliminar horas registradas?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-outline-danger" {{$attributes->whereStartsWith('wire:click')}}>Eliminar</button>
          </div>
        </div>
      </div>
    </div>
</div>