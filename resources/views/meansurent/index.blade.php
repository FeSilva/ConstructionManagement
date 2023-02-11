
@extends('layouts/contentLayoutMaster')
@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
  <link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">
@endsection

@section('title', 'Relatórios')
@section('content')
    <div class="container-fluid">
        <div class="row" id="table-hover-animation">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <a href="javascript:;" class="btn btn-outline-primary" data-bs-target="#generateRelatory" data-bs-toggle="modal">
                        Gerar Relatório
                    </a>
                
                </div>
            
                <div class="table-responsive">
                    <table class="table table-hover-animation">
                    <thead>
                        <tr>
                        <th>Medição</th>
                        <th>Total Vinculadas</th>
                        <th>Fiscais</th>
                        <th>DATA INICIO</th>
                        <th>DATA FIM</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <span class="font-weight-bold">Angular Project</span>
                        </td>
                        <td>Peter Charls</td>
                        <td>
                            <div class="avatar-group">
                            <div
                                data-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-placement="top"
                                title=""
                                class="avatar pull-up my-0"
                                data-original-title="Lilian Nenez">
                                <img
                                src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                                alt="Avatar"
                                height="26"
                                width="26"
                                />
                            </div>
                            <div
                                data-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-placement="top"
                                title=""
                                class="avatar pull-up my-0"
                                data-original-title="Alberto Glotzbach"
                            >
                                <img
                                src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                                alt="Avatar"
                                height="26"
                                width="26"
                                />
                            </div>
                            <div
                                data-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-placement="top"
                                title=""
                                class="avatar pull-up my-0"
                                data-original-title="Alberto Glotzbach"
                            >
                                <img
                                src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                                alt="Avatar"
                                height="26"
                                width="26"
                                />
                            </div>
                            </div>
                        </td>
                        <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                        <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                    <i data-feather="edit-2" class="mr-50"></i>
                                    <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                    <i data-feather="trash" class="mr-50"></i>
                                    <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
    </div>
    @include('users/_component/modal-create-medicao',['multiple' => true, 'block' => false])
@endsection


@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  {{-- data table --}}
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-alertMeansurent.js')) }}"></script>

@endsection


