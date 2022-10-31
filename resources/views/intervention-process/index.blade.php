
@extends('layouts/contentLayoutMaster')
@section('title', 'Processo de Intervenção')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="float-right">
                                <a href="{{ route('intervention_process.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Cadastrar Novo') }}
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
                                        <th>No</th>
                                        
										<th>Empreiteira</th>
										<th>Prédio</th>
										<th>Total Price</th>
										<th>Total de Dias</th>
										<th>Objeto do PI</th>
										<th>Data de Assinatura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($interventionProcesses as $interventionProcess)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $interventionProcess->contractor->fantasy_name }}</td>
											<td>{{ $interventionProcess->building->name }}</td>
											<td>{{ $interventionProcess->total_price }}</td>
											<td>{{ $interventionProcess->total_term }}</td>
											<td>{{ $interventionProcess->pi_object }}</td>
											<td>{{ date("d/m/Y", strtotime($interventionProcess->signature_date)) }}</td>

                                            <td>
                                                <form action="{{ route('intervention_process.destroy',$interventionProcess->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('intervention_process.show',$interventionProcess->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('intervention_process.edit',$interventionProcess->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $interventionProcesses->links() !!}
            </div>
        </div>
    </div>
@endsection
