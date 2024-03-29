@extends('layouts/contentLayoutMaster')

@section('title', 'Empresas')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                             <div class="float-right">
                                <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Cadastrar Nova Empresa') }}
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
										<th>Fiscal</th>
										<th>Razao Social</th>
										<th>CNPJ</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
											<td>{{ $company->user->name }}</td>
											<td>{{ $company->razao_social }}</td>
											<td>{{ $company->cnpj }}</td>
                                            <td>
                                                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('companies.edit',$company->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
@endsection
