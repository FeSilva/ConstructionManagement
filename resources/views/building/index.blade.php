
@extends('layouts/contentLayoutMaster')
@section('title', 'Prédios')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                             <div class="float-right">
                                <a href="{{ route('buildings.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Novo Prédio') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
										<th>Codigo</th>
										<th>Name</th>
										<th>Endereco</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buildings as $building)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $building->codigo }}</td>
											<td>{{ $building->name }}</td>
											<td>{{ $building->endereco }}</td>
                                            <td>
                                                    <a class="btn btn-sm btn-success" href="{{ route('buildings.edit',$building->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                   
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $buildings->links() !!}
            </div>
        </div>
    </div>
@endsection
