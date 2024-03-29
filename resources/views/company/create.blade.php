@extends('layouts/contentLayoutMaster')
@section('title', 'Empresas')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Company</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('company.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
