@if (session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success d-flex align-items-center" role="alert">
        <span class="alert-icon text-success me-2">
            <i class="ti ti-check ti-xs"></i>
        </span>
            Sucesso — {{ session('success') }}
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-ban ti-xs"></i>
            </span>
            Atenção ! - {{ session('error') }}</span>
        </div>
    </div>
@endif