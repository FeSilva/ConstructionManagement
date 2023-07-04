@extends('layouts/contentLayoutMaster')

@section('title', 'Vistorias - Transferência')
@section('content')
    @component('components.messages._messages')@endcomponent
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Cadastro de Vistoria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route("surveys.transfer.store")}}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('survey.fs.forms.transferForm')
                            <hr />
                            @include('survey.fs.forms.itemsForm')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#infos').hide();
        $('#ultimasVistorias').hide();
        //MASK
        //$('#intervention_code').mask('0000/00000');
        /*$('#codigo_predio').mask('00.00.000');
        $('#telefone').mask('(00) 00000-0000');
        $('#media_global').mask('##0,00', {reverse: true});
        $('#valor_total').mask('#.##0,00', {
            reverse: true
        });*/
        $("#intervention_code").change(function () {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                type: 'POST',
                url: "{{ route('surveys.opening.load.pi')}}",
                data: 'intervention_code=' + $(this).val(),
                success: function (data) {
                    $('#ultimasVistorias').show();
                    $("#building_id").val(data.building.name);
                    $("#diretory").val(data.building.diretoria);
                    $('#assinatura').val(data.signatureDate);
                    $('#valor_total').val(data.total_price);
                    $('#fiscal').val(data.user.name);
                    $("#empresa_contratada").val(data.contractors_name);
                    $('#codigo_predio').val(data.building.codigo)
                    $("#diretoria_modal").val(data.building.diretoria);
                    $("#prazo_total").val(data.total_term);
                    $("#objeto_pi").val(data.pi_object);
            
                    if (data.items.length > 0) {
                        $("#itens").html('');
                        $.each(data.items, function (key, value) {
                            console.log(value);

                            if (value.survey_item_progress) {
                                var progress = value.survey_item_progress.progress;
                            } else {
                                var progress = '';
                            }

                            if (value.date_open) {
                                var abertura = value.date_open.replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1');
                            } else {
                                var abertura = '';
                            }
                            var maxValue = '100,00';
                            var msgValue = 'O valor não pode ser maior que 100,00%';
                            $("#itens").append(
                                "<tr>" +
                                "<input type='hidden' name='progressLast_" + value.id + "' id='progressLast_" + value.id + "' value='" + progress + "'>" +
                                "<td>" + value.num_item + "</td>" +
                                "<td>" + value.tipo_item + "</td>" +
                                "<td>" + value.prazo + "</td>" +
                                "<td>" + value.price + "</td>" +
                                "<td>" + abertura + "</td>" +
                                "<td>" + progress + "</td>" +
                                "<td><input type='text' class='form-control porcentagemAtual' name='item_" + value.id + "' id='item_" + value.id + "'maxlength='6' onblur=valideValue("+value.id+")></td>" +
                                "</tr>");
                            let itemId = value.id;

                        });
                    } else {
                        $("#itens").html('');
                    }
                }
            });
        });
    });
    </script>
@endpush