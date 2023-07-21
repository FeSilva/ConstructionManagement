
@extends('layouts/contentLayoutMaster')
@section('title', 'Vistorias')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-datatable table-responsive pt-0">
                        <table class="surveys-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th>Código</th>
                                    <th>Tipo</th>
                                    <th>Progresso</th>
                                    <th>Responsável</th>
                                    <th>Prazo Final</th>
                                    <th>Data da Vistoria</th>
                                    <th>Progresso Fisico</th>
                                    <th>Status</th>
                                    <th>Data de Cadastro</th>
                                    <th></th>
                                </tr>
                            </thead>
                        @php /* <tbody class="table-border-bottom-0">
                                @foreach ($surveys as $survey)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $survey->interventionProcess->code }}</td>
                                        <td>{{ $survey->typesInspection->name ?? null }}</td>
                                        <td>{{ $survey->progress->name ?? null}}</td>
                                        <td>{{ $survey->user->name }}</td>
                                        <td>{{ date("d/m/Y", strtotime($survey->date_close)) }}</td>
                                        <td>{{ date("d/m/Y", strtotime($survey->inspection_date)) }}</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width:{{ $survey->physical_progress ?? 0 }}%;" aria-valuenow="{{ $survey->physical_progress ?? 0 }}" aria-valuemin="0" aria-valuemax="100" title="{{ $survey->physical_progress ?? 0 }}%">{{ $survey->physical_progress ?? 0 }}%</div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('surveys.destroy',$survey->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('surveys.show',$survey->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('surveys.edit',$survey->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>*/@endphp
                        </table>
                    </div>
                </div>
     
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-surveys-list.js')) }}"></script>
@endsection
