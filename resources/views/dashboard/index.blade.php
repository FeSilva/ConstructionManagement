@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('content')
    <!-- Statistics Card -->
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Resumo de </h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon"></i>
                            </div>
                            </div>
                            <div class="my-auto">
                            <h4 class="fw-bolder mb-0">8.549k</h4>
                            <p class="card-text font-small-3 mb-0">Seguidores</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-primary me-2">
                            <div class="avatar-content">
                            <i data-feather="trending-up" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">230k</h4>
                            <p class="card-text font-small-3 mb-0">Serviços Faturados</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-danger me-2">
                        <div class="avatar-content">
                            <i data-feather="box" class="avatar-icon"></i>
                        </div>
                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">1.423k</h4>
                        <p class="card-text font-small-3 mb-0">Gastos</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                        <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                        </div>
                        </div>
                        <div class="my-auto">
                        <h4 class="fw-bolder mb-0">$9745</h4>
                        <p class="card-text font-small-3 mb-0">Meta de Faturamento</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
@endsection
