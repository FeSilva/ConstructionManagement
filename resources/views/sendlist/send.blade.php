@extends('layouts/contentLayoutMaster')

@section('title', 'Lista de Envio')
@section('content')
  @component('components.messages._messages')@endcomponent
  <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4 col-md-12">
                <div class="card">
                  <div class="card-body pt-2">
                    <div class="row gy-3">
                      <div class="col-md-2 col-6">
                        <div class="d-flex align-items-center">
                          <div class="card-info">
                            <h5 class="mb-0">{{$fiscalization}}</h5>
                            <small>Fiscalização</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-6">
                        <div class="d-flex align-items-center">
                          <div class="card-info">
                            <h5 class="mb-0">{{$securityOfWork}}</h5>
                            <small>Segurança</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-6">
                        <div class="d-flex align-items-center">
                          <div class="card-info">
                            <h5 class="mb-0">{{$budgetSimple}}</h5>
                            <small>Orçamento Simples</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-6">
                        <div class="d-flex align-items-center">
                          <div class="card-info">
                            <h5 class="mb-0">{{$budgetComplex}}</h5>
                            <small>Orçamento Complexo</small>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2 col-6">
                        <div class="d-flex align-items-center">
                          <div class="card-info">
                            <h5 class="mb-0">{{$specific}}</h5>
                            <small>Especifica</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-6">
                        <div class="d-flex align-items-center">
                          <div class="card-info">
                            <h5 class="mb-0">{{$management}}</h5>
                            <small>Gestão Social</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="row">
        
          @component('components._card', [
              'title' => 'Lista de Envios',
          ])
              @slot('body')

                  @component('components._form', [
                      'action' => route('shippinglist.store'),
                      'method' => 'POST',
                      'id' => 'formListaEnvios'
                  ])
                  @slot('slot')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right" style="position: relative; top: -50px">
                                    <input type="checkbox" name="survey_send" id="survey_send"> Vistorias Enviadas
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-md- col-form-label">Tipo de Vistoria:</label>
                                <div class="form-group">
                                    <select class="form-control" name="type_id" id="type_id">
                                        <option>Escolha o Tipo</option>
                                        @foreach($tipos as $id => $tipo)
                                            <option value="{{$id}}">{{$tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-md- col-form-label">Mês:</label>
                                <div class="form-group">
                                    <select class="form-control" name="month" id="month" onChange="consultaListaMes(this.value)" readonly="true">
                                        <option>Escolha o mês</option>
                                        <option value="01">Janeiro</option>
                                        <option value="02">Fevereiro</option>
                                        <option value="03">Março</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Maio</option>
                                        <option value="06">Junho</option>
                                        <option value="07">Julho</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                            </div>
                            @component('components._input', [
                                'size' => '4',
                                'label' => 'Código:',
                                'type' => 'text',
                                'name' => 'code',
                                'id' => 'code',
                                'attributes' => 'readonly'
                            ])
                            @endcomponent
                        </div>
                        <div class="row">
                          <small>
                              <center>O Código e sequência pode ser alterado pelo usuário, caso a lista escolhida já
                                  exista o sistema irá informar.
                              <center>
                          </small>
                        </div>
                        <div class="row" id="buttons">
                            <div class="col-md-6">
                                @component('components.buttons._submit', [
                                    'title' => 'Gerar Lista',
                                    'type' => 'button',
                                    'attributes' => 'onclick=getList()'
                                ])
                                @endcomponent
                            </div>
                            <div class="col-md-6" style="left:5px;">
                                <button type="submit" class="btn btn-primary btn-round"
                                        name="buttonEnviarEmail" id="buttonEnviarEmail" readonly="true">
                                    Enviar Email
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="CountMemory" id="countMemory"/>
                                <span id="memorySize" style="position:left;"></span>
                            </div>
                        </div>

                        <div class="row" id="listaEnvios">
                            <table class="table">
                                <tr>
                                    <th>Codigo Vistoria</th>
                                    <th>Data Vistoria</th>
                                    <th>Status</th>
                                    <th><input type="checkbox" id="checkAll" onclick="checkAllcheckbox()"></th>
                                </tr>
                                <tbody id="listagem">
                                </tbody>
                            </table>
                        </div>
                  @endslot
                  @endcomponent
              @endslot
          @endcomponent
        </div>
  </section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#listaEnvios").hide();
            $("#buttonEnviarEmail").hide();
            $("#buttonEnviarEmail").click(function() {
                $('#largeModal').show();
            });
        });

        function  consultaListaMes(mes){
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                type: 'post',
                url: '{{route('shippingList.consultMonth')}}',
                data: {'month':mes, 'typeId':$('#type_id').val()},
                success: function (data) {
                    $("#code").val(data)
                    $("#code").removeAttr('readonly');
                },
                beforeSend: function () {
                    $("#code").val();
                },
                error: function () {
                    alert('Erro ao gerar a listagem')
                }
            });
        }

        function checkAllcheckbox() {
            let checkboxs = $('input[type="checkbox"]');
            $.each(checkboxs, function (index, checkbox) {
                if ($(checkbox).val() != 'on') {
                    somaBytes($(checkbox).val());
                }

                if ($(checkbox).is(':checked')) {
                    $(checkbox).removeAttr('checked');
                    subBytes($(checkbox).val(), 2, 'subTotal');

                } else {
                    $(checkbox).attr('checked', 'checked');
                }
            })
            $("#survey_send").removeAttr('checked');
        }


        function check(id) {
            let checkbox = $(`#checkbox_${id}`);
            if ($(checkbox).is(':checked')) {
                somaBytes(id)
            } else {
                subBytes(id)
            }
        }

        function subBytes(id, decimals = 2, type = 'sub') {
            var newByte = totalBytes(id, decimals, type);
            var bytes = parseInt($('#valueSizeKb_' + id).val());
            if (bytes === 0) return '0 Bytes';

            if (newByte[0] > 0) {
                $("#countMemory").val(newByte[0]);
                $("#memorySize").html("<strong>" + newByte[0] + ' ' + newByte[1] + " para envio</strong>");
            } else {
                $("#countMemory").val(totalBytes(bytes, memorySize, 'sub'));
                $("#memorySize").html("<strong>" + newByte[0] + ' ' + newByte[1] + "para envio</strong>");
            }
        }

        function somaBytes(id, decimals = 2) {
            var bytes = parseInt($('#valueSizeKb_' + id).val());
            var newByte = totalBytes(id, decimals, 'soma');

            if (bytes === 0) return '0 Bytes';

            if (newByte[0] > 0) {
                $("#countMemory").val(newByte[0]);
                $("#memorySize").html("<strong>" + newByte[0] + ' ' + newByte[1] + " para envio</strong>");
            } else {
                $("#countMemory").val(totalBytes(bytes, memorySize, 'soma'));
                $("#memorySize").html("<strong>" + newByte[0] + ' ' + newByte[1] + "para envio</strong>");
            }
            //return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }

        function totalBytes(id, decimals = 2, type) {
            var bytes = parseInt($('#valueSizeKb_' + id).val());
            var memorySize = parseInt($("#countMemory").val());
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

            const i = Math.floor(Math.log(bytes) / Math.log(k));
            if (isNaN(memorySize)) {
                memorySize = 0;
            }
            if (type == 'subTotal') {
                return [
                    0,
                    'KB'
                ]
            }
            if (type == 'soma') {
                return [
                    parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + parseInt(memorySize),
                    sizes[i]
                ];
            } else {

                return [
                    parseInt(memorySize) - parseFloat((bytes / Math.pow(k, i)).toFixed(dm)),
                    sizes[i]
                ];
            }
        }

        function getList() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                type: 'POST',
                url: "{{route('shippinglist.getList')}}",
                data: "typeId="+$('#type_id').val(),
                success: function (data) {
                    console.log(data);
                    $('#listagem').html('');
                    if (data[0]) {
                        $('#listaEnvios').show();
                        $.each(data, function (index, value) {
                            if (index != 'totalSizeBytes' &&
                                index != 'totalSizeMb'
                            ) {
                                let dtVistoria = value.data.split('-').reverse().join("/");
                                $('#listagem').append('<tr>' +
                                    `<input type='hidden' name='valueSizeKb_${value.id}' id='valueSizeKb_${value.id}' value='${value.size}'>` +
                                    "<td>" + value.codigo + '</td>' +
                                    "<td>" + dtVistoria + '</td>' +
                                    "<td>" + value.status + '</td>' +
                                    `<td><input type='checkbox' id="checkbox_${value.id}" value='${value.id}' name='surveys_id[]' onchange='check(this.value)'> </td>` +
                                    '</tr>');
                            }
                        });

                        $("#listagem").show();
                        $("#TotalMemorySize").html("<strong>" + data.totalSizeMb + "</strong>");
                        $("#buttonEnviarEmail").show();
                        $("#month").removeAttr("readonly");
                        $('#largeModal').hide();
                        checkAllcheckbox();
                    } else {
                        $('#largeModal').hide();
                        alert('Não existem vistorias para serem enviadas.');
                    }
                },
                beforeSend: function () {
                    $('#largeModal').show('3');
                },
                error: function () {
                    alert('Erro ao gerar a listagem')
                }
            });
        }
    </script>
@endpush
