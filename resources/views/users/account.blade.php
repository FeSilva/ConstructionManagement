@extends('layouts/contentLayoutMaster')

@section('title', 'Conta')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-0 order-md-0">
      <!-- User Card -->
      <div class="card">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
            <img 
                src="{{ $user->profile_photo_url}}"
                class="img-fluid rounded mt-3 mb-2"
                height="80px"
                width="80px"
                alt="User avatar"
                />

              <div class="user-info text-center">
                <h4>{{$user->name}}</h4>
                <span class="badge bg-light-secondary">{{$user->team[0]->name}}</span>
              </div>
            </div>
          </div>
          @if ($user->team[0]->name == 'Fiscal' || $user->team[0]->name == 'Tecnico')
          <div class="d-flex justify-content-around my-2 pt-75">
            <div class="d-flex align-items-start me-2">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="check" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">{{ number_format($accomplished,0,",",".")}}</h4>
                <small>Aprovadas</small>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="briefcase" class="font-medium-2"></i>
              </span>
              <div class="ms-75">
                <h4 class="mb-0">{{ number_format($outstanding,0,",",".")}}</h4>
                <small>Pendentes</small>
              </div>
            </div>
          </div>
          @endif
          <h4 class="fw-bolder border-bottom pb-50 mb-1">Detalhes</h4>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-75">
                <span class="fw-bolder me-25">E-mail:</span>
                <span>{{$user->email}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Permissão:</span>
                <span>{{$user->team[0]->pivot->role}}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Status:</span>
                <span class="badge bg-light-success">{{$user->status ?? 'Ativo'}}</span>
              </li>
      
              <li class="mb-75">
                <span class="fw-bolder me-25">CPF/CNPJ:</span>
                <span>{{$user->tax_id}}</span>
              </li>
            </ul>
            <div class="d-flex justify-content-center pt-2">
              <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                Editar
              </a>
              <a href="javascript:;" class="btn btn-outline-danger suspend-user">Suspender Conta</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!--/ User Sidebar -->

   
    @if ($user->team[0]->name == 'Fiscal' || $user->team[0]->name == 'Tecnico')
    <div class="col-xl-8 col-lg-7 col-md-7 order-1 order-md-1">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

               <div class="float-right">
                  <h3>Vistorias Realizadas Pelo {{$user->team[0]->name}}</h3>
                </div>
          </div>
        </div>
        <div class="card-datatable table-responsive pt-0">
          <table class="surveys-user-list-table table">
            <thead class="thead">
              <tr>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Data da Vistoria</th>
                <th>Status</th>
                <th>Relatório Gerado?</th>
                <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($surveys as $survey)
              <tr>
                <td>{{$survey->intervention_code}}</td>
                <td>{{$survey->typesInspection->name}}</td>
                <td>{{ date("d/m/Y", strtotime($survey->inspection_date))}}</td>
                <td>{{$survey->status}}</td>
                <td>NÃO</td>
              </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
      {{$surveys->links()}}
    </div>
    @else
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <div class="card">
        <h4 class="card-header">Atividades do Usuário</h4>
        <div class="card-body pt-1">
          <ul class="timeline ms-50">
            <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>User login</h6>
                  <span class="timeline-event-time me-1">12 min ago</span>
                </div>
                <p>User login at 2:12pm</p>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Meeting with john</h6>
                  <span class="timeline-event-time me-1">45 min ago</span>
                </div>
                <p>React Project meeting with john @10:15am</p>
                <div class="d-flex flex-row align-items-center mb-50">
                  <div class="avatar me-50">
                    <img
                      src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                      alt="Avatar"
                      width="38"
                      height="38"
                    />
                  </div>
                  <div class="user-info">
                    <h6 class="mb-0">Leona Watkins (Client)</h6>
                    <p class="mb-0">CEO of pixinvent</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Create a new react project for client</h6>
                  <span class="timeline-event-time me-1">2 day ago</span>
                </div>
                <p>Add files to new design folder</p>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Create Invoices for client</h6>
                  <span class="timeline-event-time me-1">12 min ago</span>
                </div>
                <p class="mb-0">Create new Invoices and send to Leona Watkins</p>
                <div class="d-flex flex-row align-items-center mt-50">
                  <img class="me-1" src="{{asset('images/icons/pdf.png')}}" alt="data.json" height="25" />
                  <h6 class="mb-0">Invoices.pdf</h6>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @endif
    <!--/ User Content -->
  </div>

  @if ($user->team[0]->name == 'Fiscal' || $user->team[0]->name == 'Tecnico')
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
        <div class="card">
          <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                 <div class="float-right">
                    <h3>Relatórios Gerados</h3>
                  </div>
            </div>
          </div>
          <div class="card-datatable table-responsive pt-0">
            <table class="work-report-list-table table">
              <thead class="thead">
                <tr>
                  <th>#</th>
                
                  <th></th>
                </tr>
            </thead>
            </table>
          </div>
          
        </div>
      </div>

 
    </div>
  @endif
</section>

@include('users/_component/modal-edit-user')
@include('content/_partials/_modals/modal-upgrade-plan')
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
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
