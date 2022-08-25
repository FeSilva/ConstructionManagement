@extends('layouts/contentLayoutMaster')

@section('content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastro de Empresa</h4>
                </div>
                <div class="card-body">
                    <form class="form" id="form-company">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Razão Social</label>
                                    <input
                                        type="text"
                                        id="social_reason"
                                        class="form-control"
                                        placeholder="Ex.: Regra do Corte Sistema de Gerenciamento LTDA."
                                        name="social_reason"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">CPF / CNPJ</label>
                                    <input
                                        type="text"
                                        id="tax_id1"
                                        class="form-control"
                                        placeholder=""
                                        name="tax_id1"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Fantasia</label>
                                    <input
                                        type="text"
                                        id="fantasy_name"
                                        class="form-control"
                                        placeholder="Last Name"
                                        name="fantasy_name"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">CEP</label>
                                    <input
                                        type="text"
                                        id="zipcode"
                                        class="form-control"
                                        name="zipcode"
                                        placeholder="zipcode"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="complement">Complemento</label>
                                    <input
                                        type="text"
                                        id="complement"
                                        class="form-control"
                                        name="complement"
                                        placeholder="Email"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Cidade</label>
                                    <input type="text" id="city" class="form-control" placeholder="City" name="city" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Estado</label>
                                    <input
                                        type="text"
                                        id="country"
                                        class="form-control"
                                        name="country"
                                        placeholder="Country"
                                    />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="employess">Qtd. Funcionários</label>
                                    <input type="number" id="employess" class="form-control" name="employess" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="annual_billing">Faturamento Anual $</label>
                                    <input
                                        type="number"
                                        id="annual_billing"
                                        class="form-control"
                                        name="annual_billing"
                                    />
                                </div>
                            </div>
                            <!---<div class="col-md-12 col-12">
                                <div class="form-group">
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <p class="mb-50">Deseja realizar uma projeção futura ?</p>
                                        <input type="checkbox" class="custom-control-input" id="future-projection-switch" />
                                        <label class="custom-control-label" for="future-projection-switch"></label>
                                    </div>
                                </div>
                            </div>--->
                            <div class="col-md-6 col-12" style="display:none" class="future-projection">
                                <div class="form-group">
                                    <label for="city-column">Qtd. Funcionários</label>
                                    <input type="number" id="employess_future" class="form-control" name="employess_future" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12" style="display:none" class="future-projection">
                                <div class="form-group">
                                    <label for="country-floating">Faturamento Anual $</label>
                                    <input
                                        type="number"
                                        id="annual_billing_future"
                                        class="form-control"
                                        name="annual_billing_future"
                                    />
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary mr-1" onClick="store('company')">Salvar</button>
                                <button type="reset" class="btn btn-outline-secondary">Limpar Tudo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-company.js')) }}"></script>
@endsection