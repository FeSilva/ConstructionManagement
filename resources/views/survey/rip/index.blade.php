@extends('layouts/contentLayoutMaster')

@section('title', 'Relatório de Inspeção Predial')
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
                            @include('survey.rip.ripForm')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#infos').hide();
        $('#ultimasVistorias').hide();
        //MASK
        $('#intervention_code').mask('0000/00000');
        $('#building_code').mask('00.00.000');
     
        $("#building_code").change(function(){
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                type: 'POST',
                url: "{{ route('getBuilding')}}",
                data: 'code='+ $(this).val(),
                success: function (data) {
                    if(data.diretoria) {
                        $("#diretory").val(data.diretoria);
                        $("#building_id").val(data.name);
                    } else { 
                        $("#building_code").focus().val('');
                        alert("Predio não encontrado");
                    }
                },
                error: function(error){
          
                }
            });

        });

    
    });
</script>
@endpush