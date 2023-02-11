@extends('layouts/contentLayoutMaster')
@section('title', 'Empreiteiras')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Contractor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contractors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('contractor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
