@extends('layouts/contentLayoutMaster')

@section('title', 'Vistorias Específicas')
@section('content')
    @component('components.messages._messages')@endcomponent
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('surveys.specific.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('survey.specific.specificForm')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
