

<!-- Edit User Modal -->
<div class="modal fade" id="generateRelatory" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5 px-sm-5 pt-50">
        <div class="text-center mb-2">
          <h1 class="mb-1">Geração Relatório de Medição</h1>
          <p></p>
        </div>
        <form  class="row gy-1 pt-75">
          <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserFirstName">Medição</label>
              <input
                  type="text"
                  id="modalEditUserFirstName"
                  name="name"
                  class="form-control"
                  placeholder="Medição de Maio/23"
                  value=""
                  data-msg=""
              />
          </div>
          <div class="col-md-6">
              <label class="form-label" for="modalEditUserFirstName">Fiscais</label>
              {{ Form::select('user_id', $supervisors, $user->id ?? '', ['class' => 'select2 select2-size-sm form-control', 'id' => 'small-select', 'placeholder' => 'Selecione', 'disabled'=> $block,  'multiple' => $multiple])}}
          </div>
          <div class="col-6">
            <label class="form-label" for="modalEditUserName">Data de Inicio</label>
            <input
              type="date"
              id="medicao_dt_init"
              name="medicao_dt_init"
              class="form-control"
              value=""
              placeholder="john.doe.007"
            />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserEmail">Data Final</label>
            <input
              type="date"
              id="medicao_dt_end"
              name="medicao_dt_end"
              class="form-control"
              value=""
              placeholder="example@domain.com"
            />
          </div>
      
          <div class="col-12 text-center mt-2 pt-50">
            <a class="btn btn-outline-success me-1" id="position-bottom-end">Gerar Relatório</a>
            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
              Cancelar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!--/ Edit User Modal -->
