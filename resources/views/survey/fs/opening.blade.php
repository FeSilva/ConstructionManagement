@extends('layouts/contentLayoutMaster')

@section('title', 'Vistorias - Abertura')
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('surveys.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('survey.fs.forms.openingForm')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
