@extends('layouts.app')

@section('template_title')
    Update Survey
@endsection

@section('content')
    <section class="container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Survey</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('surveys.update', $survey->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('survey.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
