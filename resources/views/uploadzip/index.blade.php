@extends('layouts/contentLayoutMaster')

@section('title', 'Anexar Comprovante de Aprovação')
@section('content')
    @component('components.messages._messages')@endcomponent
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        @component('components._form',[
                            'method' => 'POST',
                            'action' => "/uploadzip/descompact",
                            'attributes' => 'enctype=multipart/form-data accept=application/pdf'
                        ])
                            @slot('slot')
                                <div class="row">
                                    @component('components._input',[
                                        'size' => '12',
                                        'type' => 'file',
                                        'label' => 'Descompactar arquivo de vistoria: ',
                                        'name' => 'zipArchive',
                                        'id' => 'zipArchive',
                                        'attributes' => "accept=zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed",
                                        'value' => old('zipArchive')
                                    ])
                                    @endcomponent
                                </div>
                                @component('components.buttons._submit', ['attributes' => "style=margin-top:40px"])@endcomponent
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

