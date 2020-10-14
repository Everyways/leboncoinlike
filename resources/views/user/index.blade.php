@extends('layouts.user')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Annonces actives</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adActivesCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hiking fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Annonces en attente</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adAttenteCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Annonces obsolètes</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adPerimesCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-end fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection