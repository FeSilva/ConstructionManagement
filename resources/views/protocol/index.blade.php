@extends('layouts/contentLayoutMaster')

@section('title', 'Protocolos')
@section('content')
    @component('components.messages._messages')@endcomponent
    <section class="container-fluid">
        <div class="card">
   
            <div class="card-datatable table-responsive pt-0">
              <table class="user-list-table table">
                <thead class="table-light">
                  <tr>
                    <th></th>
                    <th>Código</th>
                    <th>Qtd Vistorias</th>
                    <th>Tipo Protocolo</th>
                    <th>Status</th>
                    <th>Ações</th>
                  </tr>
                </thead>
              </table>
            </div>
    </section>
    
@endsection

@push('scripts')
    <script type="text/javascript">

	

    </script>
@endpush