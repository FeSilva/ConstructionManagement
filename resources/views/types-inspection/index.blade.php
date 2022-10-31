@extends('layouts.app')

@section('template_title')
    Types Inspection
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Types Inspection') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('types_inspection.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Name</th>
										<th>Sigla</th>
										<th>Description</th>
										<th>Status</th>
										<th>Price</th>
										<th>Amount To Receive</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typesInspections as $typesInspection)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $typesInspection->name }}</td>
											<td>{{ $typesInspection->sigla }}</td>
											<td>{{ $typesInspection->description }}</td>
											<td>{{ $typesInspection->status }}</td>
											<td>{{ $typesInspection->price }}</td>
											<td>{{ $typesInspection->amount_to_receive }}</td>

                                            <td>
                                                <form action="{{ route('types_inspection.destroy',$typesInspection->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('types_inspection.show',$typesInspection->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('types_inspection.edit',$typesInspection->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $typesInspections->links() !!}
            </div>
        </div>
    </div>
@endsection
