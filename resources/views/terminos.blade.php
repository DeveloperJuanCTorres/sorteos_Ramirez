@extends('layouts.app')

@section('content')

<div class="bg-light min-vh-100 py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10 pb-5">

                <!-- Card -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <!-- Header -->
                    <div class="bg-primary text-white p-5">

                        <h1 class="fw-bold mb-3">
                            Términos y Condiciones
                        </h1>

                        <p class="mb-0 opacity-75">
                            Última actualización:
                            {{ now()->format('d/m/Y') }}
                        </p>

                    </div>

                    <!-- Body -->
                    <div class="card-body p-4 p-md-5">

                        {!! $empresa->terminos !!}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection