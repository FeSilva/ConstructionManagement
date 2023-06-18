
@extends('layouts/contentLayoutMaster')
@section('title', 'Empreiteiras')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="float-right">
                                <a href="{{ route('contractors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Nome Fantasia</th>
										<th>CPF/CNPJ</th>
										<th>E-MAIL</th>
										<th>Nome do Contato</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contractors as $contractor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $contractor->fantasy_name }}</td>
											<td>{{ $contractor->tax_id }}</td>
											<td>{{ $contractor->email }}</td>
											<td>{{ $contractor->contact_name }}</td>
                                            <td>
                                                <form action="{{ route('contractors.destroy',$contractor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('contractors.edit',$contractor->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $contractors->links() !!}
            </div>
        </div>
    </div>
@endsection
