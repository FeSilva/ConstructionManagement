@extends('layouts.contentLayoutMaster')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('title', 'Empreiteiras')

@section('content')
<!-- Basic table -->
<section id="basic-datatable">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body py-2 my-25">
            <table class="datatables-basic table  table-responsive">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th>id</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  <th>Ações</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in">
      <div class="modal-dialog sidebar-sm">
        <form class="add-new-contractors modal-content pt-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Empreiteira</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-fullname">Razão Social</label>
              <input
                type="text"
                name="fantasy_name"
                class="form-control dt-fantasy_name"
                id="basic-icon-default-fantasy_name"
                placeholder="John Doe"
                aria-label="John Doe"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-post">CNPJ/CPF</label>
              <input
                type="text"
                name="tax_id"
                id="basic-icon-default-tax_id"
                class="form-control dt-tax_id"
                placeholder="Web Developer"
                aria-label="Web Developer"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-email">Telefone</label>
              <input
                type="text"
                name="phone"
                id="basic-icon-default-phone"
                class="form-control dt-phone"
                placeholder="john.doe@example.com"
                aria-label="john.doe@example.com"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-date">Contato</label>
              <input
                type="text"
                name="contact_name"
                class="form-control dt-contact_name"
                id="basic-icon-default-contact_name"
             
              />
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-date">E-mail</label>
                <input
                  type="text"
                  name="email"
                  class="form-control dt-email"
                  id="basic-icon-default-email"
                />
              </div>
            <button type="button" class="btn btn-primary data-submit me-1">Salvar</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--/ Basic table -->
  
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/contractors.js')) }}"></script>
@endsection