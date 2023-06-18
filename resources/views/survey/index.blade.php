
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Codigo</th>
										<th>Tipo</th>
										<th>Progresso</th>
										<th>Responsável</th>
										<th>Prazo Final</th>
										<th>Data da Vistoria</th>
										<th>Progresso Fisico</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $surveys->links() !!}
            </div>
        </div>
    </div>
@endsection
