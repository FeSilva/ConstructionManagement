@extends('layouts/contentLayoutMaster')

@section('title', 'Sua Empresa')

@section('content')
<!-- Responsive Datatable -->
<section id="responsive-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Empresa</h4>
                    <a  class="btn btn-primary" href="{{ route('company.create') }}" > + Cadastrar</a>
                </div>
                <div class="card-datatable">
                    <table class="dt-responsive table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Razão Social</th>
                            <th></th>
                            <th>Fantasia</th>
                            <th>CPF / CNPJ</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Bairro</th>
                            <th>Funcionários</th>
                            <th>Satisfação do Cliente</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($companys as $company)
                                    <td>{{ $company->company_id }}</td>
                                    <td colspan="2">{{ $company->social_reason }}</td>
                                    <td>{{ $company->fantasy_name }}</td>
                                    <td>{{ $company->tax_id1 }}</td>
                                    <td>{{ $company->city }}</td>
                                    <td>{{ $company->country }}</td>
                                    <td>{{ $company->complement }}</td>
                                    <td>{{ $company->employess }}</td>
                                    <td>5 estrelas</td>
                                @empty

                                <td colspan="8" align="center">Nenhum Registro Encontrado</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Responsive Datatable -->
@endsection



