@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="jumbotron">
                        <h1 class="display-4">LegalPro!</h1>
                        <p class="lead">Firma de abogados "LegalPro".</p>
                        <hr class="my-4">
                        <p>Sistema de gestión de casos.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
