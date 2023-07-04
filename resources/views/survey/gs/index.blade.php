@extends('layouts/contentLayoutMaster')

@section('title', 'Vistorias Específicas')
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action=""  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('survey.gs.gsForm')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
