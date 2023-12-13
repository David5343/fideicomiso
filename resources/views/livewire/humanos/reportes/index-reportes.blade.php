<div>
    <div class="row m-3">
        <div class="d-flex justify-content-center col-6">
            <div class="input-group">
                <select wire:model="reporte" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                  <option selected>Elije un reporte...</option>
                  <option value="1">Tabulador de Salarios</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <button wire:click="seleccion" target="_blank" class="btn btn-outline-success" type="button">Generar</button>
              </div>
        </div>
    </div>
</div>
