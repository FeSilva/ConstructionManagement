@extends('layouts/fullLayoutMaster')

@section('title', 'Pré-Agendamento')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
    <section>
        <div class="row">
            <div class="col-12 p-4">

                <h1 class="text-center mb-1" id="shareProjectTitle">REGRA DO CORTE</h1>
                <p class="text-center">SEJA BEM-VINDO AO REGRA DO CORTE.</p>

                <label class="form-label fw-bolder font-size font-small-4 mb-50" for="addMemberSelect"> Buscar Estabelecimento </label>
                <select class="select2 form-select" id="select2-basic">

                    @forelse  ($companys as $company)
                        <option value="{{$company->id}}">{{$company->fantasia}}</option>
                    @empty
                        <option select>NENHUM ESTABELECIMENTO PARA SELEÇÃO</option>
                    @endforelse
                </select>

                <p class="fw-bolder pt-50 mt-2">Favoritos</p>

                <!-- member's list  -->
                <ul class="list-group list-group-flush mb-2">
                    <li class="list-group-item d-flex align-items-start border-0 px-0">
                        <div class="avatar me-75">
                        <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="avatar" width="38" height="38" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="me-1">
                            <h5 class="mb-25">Lester Palmer</h5>
                            <span>pe@vogeiz.net</span>
                        </div>

                        <div class="dropdown">
                            <button
                            class="btn btn-flat-primary dropdown-toggle"
                            type="button"
                            id="member1"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            >
                            <span class="d-none d-lg-inline-block">o que fazer ?</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="member1">
                                <li><a class="dropdown-item" href="javascript:void(0)">Visitar Estabelecimento</a></li>
                                <li><a class="dropdown-item active" href="javascript:void(0)">Realizar Reagendamento</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Historico</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Excluir Estabelecimento</a></li>

                            </ul>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
