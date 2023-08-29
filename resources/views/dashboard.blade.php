@extends('master')
@section('title','Dashboard')
@section('content')

<div class="container-fluid p-4">
<div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-4">
                        <!-- card -->
                        <div class="card h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-12">
                                        <span class="fw-semibold text-uppercase fs-6">Clientes</span>
                                    </div>
                                    <!-- col -->
                                    <div class="col-6">
                                        <h1 class="fw-bold mt-2 mb-0 h2">@php echo count($dados['clientes']) @endphp</h1>
                                        <p class="text-success fw-semibold mb-0"><i class="fe fe-trending-up me-1"></i>Ativos</p>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-4">
                        <!-- card -->
                        <div class="card h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-12">
                                        <span class="fw-semibold text-uppercase fs-6">Produtos</span>
                                    </div>
                                    <!-- col -->
                                    <div class="col-6">
                                        <h1 class="fw-bold mt-2 mb-0 h2">@php echo count($dados['produtos']) @endphp</h1>
                                        <p class="text-success fw-semibold mb-0"><i class="fe fe-trending-up me-1"></i>Ativos</p>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-4">
                        <!-- card -->
                        <div class="card h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-12">
                                        <span class="fw-semibold text-uppercase fs-6">Custo</span>
                                    </div>
                                    <!-- col -->
                                    <div class="col-12">
                                        <h1 class="fw-bold mt-2 mb-0 h2">R$ 11,93</h1>
                                        <p class="text-danger fw-semibold mb-0"><i class="fe fe-trending-up me-1"></i>Ativos</p>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-4">
                        <!-- card -->
                        <div class="card h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-12">
                                        <span class="fw-semibold text-uppercase fs-6">Lucro</span>
                                    </div>
                                    <!-- col -->
                                    <div class="col-12">
                                        <h1 class="fw-bold mt-2 mb-0 h2">R$ 11,93</h1>
                                        <p class="text-success fw-semibold mb-0"><i class="fe fe-trending-up me-1"></i>Ativos</p>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
    </div>
@endsection