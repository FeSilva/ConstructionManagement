@extends('layouts/contentLayoutMaster')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-datatable table-responsive">
              <table class="datatables-permissions table">
                <thead class="table-light">
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Razão Social</th>
                    <th>CNPJ/CPF</th>
                    <th>Fiscal</th>
                    <th>Ações</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

