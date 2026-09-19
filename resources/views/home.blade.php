@extends('layouts.app')

@section('content')

<!-- Hero Section: Featured Sweepstakes -->
<!-- HERO FULL WIDTH -->
<section class="hero-moto hero-fullwidth relative overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[620px]">

        <!-- LADO IZQUIERDO -->
        <div class="p-8 md:p-14 lg:pl-20 xl:pl-28 flex flex-col justify-center relative z-10">

            <div class="hero-chip mb-5">
                <i class="fa-solid fa-motorcycle me-2"></i>
                SORTEO OFICIAL DE VEHÍCULOS
            </div>

            <h1 class="text-5xl md:text-7xl font-black leading-[0.9] uppercase tracking-tight mb-5">
                GANA TU
                <span class="text-primary block">MOTOTAXI</span>
                O <span class="text-primary">MOTO CARGUERA</span>
            </h1>

            <p class="text-lg text-gray-300 max-w-xl mb-8 leading-relaxed">
                Participa por vehículos listos para trabajar y generar ingresos.
                Cada ticket te acerca a estrenar una moto, mototaxi o trimoto carguera.
            </p>

            <div class="flex flex-wrap gap-3 mb-8">
                <div class="feature-pill"><i class="fa-solid fa-ticket"></i> Tickets digitales</div>
                <div class="feature-pill"><i class="fa-solid fa-shield-halved"></i> Sorteo transparente</div>
                <div class="feature-pill"><i class="fa-solid fa-video"></i> En vivo</div>
            </div>

            <div class="flex flex-wrap items-center gap-6">
                <div class="hero-counter flex gap-3">
                    <div class="counter-box">
                        <span id="dias1" class="counter-number">00</span>
                        <small>DÍAS</small>
                    </div>
                    <div class="counter-box">
                        <span id="horas1" class="counter-number">00</span>
                        <small>HRS</small>
                    </div>
                    <div class="counter-box">
                        <span id="minutos1" class="counter-number">00</span>
                        <small>MIN</small>
                    </div>
                </div>

                <button data-bs-toggle="modal"
                    data-bs-target="#modalRegistro"
                    class="btn-hero-primary">
                    PARTICIPAR AHORA
                </button>
            </div>
        </div>

        <!-- LADO DERECHO -->
        <div class="relative hidden lg:block">
            <img src="{{ asset('img/banner2.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-l from-black/10 via-black/40 to-[#0b0f14]"></div>

            <div class="absolute bottom-8 right-8 glass-prize-card">
                <div class="text-xs uppercase tracking-[0.3em] text-gray-300 mb-2">
                    Premio principal
                </div>

                <div class="text-2xl font-black uppercase leading-tight">
                    Mototaxi Torito 2026
                </div>

                <div class="text-primary font-bold mt-2">
                    + Moto lineal + Bono de combustible
                </div>
            </div>
        </div>

    </div>
</section>


<main class="pb-32 px-4 md:px-8 max-w-7xl mx-auto space-y-16">

    <section class="next-raffle-board">
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_auto] gap-8 items-center">

            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="board-icon">
                        <i class="fa-solid fa-flag-checkered"></i>
                    </div>

                    <div>
                        <h2 class="text-3xl font-black uppercase tracking-tight">
                            Próximo Sorteo en Vivo
                        </h2>

                        <p class="text-gray-400 text-sm uppercase tracking-[0.2em]">
                            Participa antes del cierre oficial
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="dashboard-counter">
                        <span id="dias">02</span>
                        <small>Días</small>
                    </div>

                    <div class="dashboard-counter">
                        <span id="horas">14</span>
                        <small>Horas</small>
                    </div>

                    <div class="dashboard-counter">
                        <span id="minutos">52</span>
                        <small>Minutos</small>
                    </div>

                    <div class="dashboard-counter active">
                        <span id="segundos">18</span>
                        <small>Segundos</small>
                    </div>
                </div>
            </div>

            <button data-bs-toggle="modal"
                data-bs-target="#modalRegistro"
                class="btn-board-action">
                COMPRAR TICKETS
            </button>
        </div>
    </section>


    <!-- Popular Sweepstakes Grid -->
    <section>
        <div class="flex justify-between items-end mb-8">
            @if($sorteo)
            <div style="z-index: 10;">
                <h2 class="text-3xl font-headline font-black uppercase tracking-tighter">Premios <span class="text-primary-container">{{$sorteo->name}}</span></h2>
                <p class="text-on-surface-variant text-sm mt-1 uppercase tracking-widest font-black">Tu próxima victoria está a un ticket de distancia</p>
            </div>
            <button class="text-primary font-black uppercase text-sm tracking-widest hover:underline transition-all" style="z-index: 10;">Ver todos</button>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($premios as $premio)
            <div class="vehicle-raffle-card group">

                <div class="vehicle-image-wrapper">
                    <img class="vehicle-image"
                        src="{{ asset('storage/' . $premio->image) }}">

                    <div class="vehicle-overlay"></div>

                    <div class="vehicle-badge">
                        <i class="fa-solid fa-star"></i>
                        x{{ $premio->cantidad }}
                    </div>
                </div>

                <div class="vehicle-content">

                    <div class="vehicle-category">
                        PREMIO DEL SORTEO
                    </div>

                    <h3 class="vehicle-title">
                        {{ $premio->name }}
                    </h3>

                    <div class="vehicle-meta">
                        <span><i class="fa-solid fa-motorcycle"></i> Vehículo 0 km</span>
                        <span><i class="fa-solid fa-ticket"></i> Sorteo vigente</span>
                    </div>

                    <!-- <button data-bs-toggle="modal"
                            data-bs-target="#modalRegistro"
                            class="vehicle-btn">
                        PARTICIPAR
                    </button> -->
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @if($winners->count() > 0)
    <section class="winners-section py-16">
        <div class="text-center mb-12">
            <div class="section-chip mb-4">
                RESULTADOS REALES
            </div>

            <h2 class="text-4xl font-black uppercase tracking-tight">
                Últimos <span class="text-primary">Ganadores</span>
            </h2>

            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">
                Personas que ya se llevaron motos, mototaxis y premios oficiales.
            </p>
        </div>

        <div class="swiper winnersSwiper">

            <div class="swiper-wrapper">

                @foreach($winners as $winner)
                    <div class="swiper-slide">

                        <div class="winner-card">

                            <div class="winner-image-wrapper">
                                <img src="{{ asset('storage/' . $winner->image) }}"
                                    alt="{{ $winner->name }}"
                                    class="winner-image">

                                <div class="winner-badge">
                                    <i class="fa-solid fa-trophy"></i>
                                    Ganador
                                </div>
                            </div>

                            <div class="winner-content">

                                <h3 class="winner-name">
                                    {{ $winner->name }}
                                </h3>

                                @if($winner->prize)
                                    <p class="winner-prize">
                                        {{ $winner->prize }}
                                    </p>
                                @endif

                                @if($winner->created_at)
                                    <div class="winner-date">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $winner->created_at->format('d M Y') }}
                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <!-- Flechas -->
            <div class="swiper-button-prev winners-prev"></div>
            <div class="swiper-button-next winners-next"></div>

            <!-- Paginación -->
            <div class="swiper-pagination winners-pagination mt-6"></div>

        </div>
    </section>

    @endif

    <!-- "Cómo Funciona" Step Grid -->
    <section class="steps-moto-section">
        <div class="text-center mb-14">
            <div class="section-chip">¿CÓMO PARTICIPAR?</div>

            <h2 class="text-4xl font-black uppercase tracking-tight mt-4">
                Participa en <span class="text-primary">3 pasos</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="step-card">
                <div class="step-icon">
                    <i class="fa-solid fa-ticket"></i>
                </div>

                <h3>Compra tus tickets</h3>

                <p>
                    Elige la cantidad de tickets y registra tu participación en minutos.
                </p>
            </div>

            <div class="step-card">
                <div class="step-icon">
                    <i class="fa-solid fa-credit-card"></i>
                </div>

                <h3>Sube tu comprobante</h3>

                <p>
                    Adjunta tu pago por Yape y nuestro equipo validará automáticamente tu registro.
                </p>
            </div>

            <div class="step-card">
                <div class="step-icon">
                    <i class="fa-solid fa-trophy"></i>
                </div>

                <h3>Sigue el sorteo en vivo</h3>

                <p>
                    El ganador se anunciará en transmisión en vivo con total transparencia.
                </p>
            </div>

        </div>
    </section>



</main>

<!-- Modal -->
@if($sorteo)
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg bg-white text-dark"
            style="border-radius: 16px;">

            <style>
                #modalRegistro .form-control,
                #modalRegistro .form-select {
                    height: 48px;
                    border-radius: 12px;
                }

                #modalRegistro .form-control:focus,
                #modalRegistro .form-select:focus {
                    border-color: #0d6efd;
                    box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .15);
                }

                #dropZone {
                    transition: .3s ease;
                }

                #dropZone:hover {
                    border-color: #0d6efd !important;
                    background: #f8f9ff !important;
                }
            </style>

            <!-- Header -->
            <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <h2 class="text-dark fw-bold mb-0">
                        Formulario de registro de ticket
                    </h2>
                </div>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body text-dark">

                <form id="formRegistro" enctype="multipart/form-data">

                    <div class="row g-3">

                        <!-- Sorteo -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                Sorteo
                            </label>

                            <select name="raffle_id"
                                class="form-select bg-light text-dark border"
                                required>

                                @foreach($sorteos as $item)
                                <option value="{{ $item->id }}"
                                    {{ $sorteo && $item->id == $sorteo->id ? 'selected' : '' }}>

                                    {{ $item->name }} -
                                    {{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}

                                </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Tipo Documento -->
                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold">
                                Tipo de Documento
                            </label>

                            <select class="form-select border bg-light text-dark"
                                name="tipo_documento"
                                required>

                                <option value="dni">DNI</option>
                                <option value="ce">Carnet de Extranjería</option>
                                <option value="pasaporte">Pasaporte</option>

                            </select>
                        </div>

                        <!-- Número Documento -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                Número de Documento
                            </label>

                            <input type="text"
                                class="form-control bg-light text-dark border"
                                name="numero_documento"
                                required>
                        </div>

                        <!-- Nombres -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                Nombres
                            </label>

                            <input type="text"
                                class="form-control bg-light text-dark border"
                                name="nombres"
                                required>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                Apellidos
                            </label>

                            <input type="text"
                                class="form-control bg-light text-dark border"
                                name="apellidos"
                                required>
                        </div>

                        <!-- Departamento -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                Departamento
                            </label>

                            <select class="form-select bg-light text-dark border"
                                name="departamento"
                                required>

                                <option value="">Seleccionar</option>
                                <option>Amazonas</option>
                                <option>Áncash</option>
                                <option>Apurímac</option>
                                <option>Arequipa</option>
                                <option>Ayacucho</option>
                                <option>Cajamarca</option>
                                <option>Callao</option>
                                <option>Cusco</option>
                                <option>Huancavelica</option>
                                <option>Huánuco</option>
                                <option>Ica</option>
                                <option>Junín</option>
                                <option>La Libertad</option>
                                <option>Lambayeque</option>
                                <option>Lima</option>
                                <option>Loreto</option>
                                <option>Madre de Dios</option>
                                <option>Moquegua</option>
                                <option>Pasco</option>
                                <option>Piura</option>
                                <option>Puno</option>
                                <option>San Martín</option>
                                <option>Tacna</option>
                                <option>Tumbes</option>
                                <option>Ucayali</option>

                            </select>
                        </div>

                        <!-- WhatsApp -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                WhatsApp
                            </label>

                            <input type="text"
                                class="form-control bg-light text-dark border"
                                name="telefono"
                                required>
                        </div>

                        <!-- Cantidad -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fw-semibold">
                                Cantidad de Tickets
                            </label>

                            <div class="form-control d-flex align-items-center justify-content-between rounded-4 px-3"
                                style="height: 48px; background:#f1f3f5;">

                                <button type="button"
                                    class="btn btn-sm btn-light border"
                                    id="btnMenos">
                                    ➖
                                </button>

                                <input type="number"
                                    class="form-control bg-white border-0 text-dark text-center fw-bold"
                                    name="cantidad"
                                    id="cantidadTickets"
                                    value="1"
                                    min="1"
                                    readonly
                                    style="max-width: 80px;">

                                <button type="button"
                                    class="btn btn-sm btn-light border"
                                    id="btnMas">
                                    ➕
                                </button>

                            </div>
                        </div>

                    </div>

                    <!-- SECCIÓN PAGO -->
                    <div class="bg-surface-container-low mt-4 p-4 rounded-4">

                        <div class="row align-items-center">

                            <!-- QR -->
                            <div class="col-md-5 text-center">

                                <h6 class="fw-bold mb-3">
                                    Pago por Yape
                                </h6>

                                <img src="{{ asset('img/qr-yape-ir.jpeg') }}"
                                    alt="QR Yape"
                                    class="img-fluid rounded shadow mb-3 m-auto"
                                    style="max-width: 200px;">
                                
                                <p class="mt-2 small text-dark"> Importaciones Ramirez E.I.R.L</p>

                                <p class="mt-2 small text-muted">
                                    Escanea para pagar
                                </p>

                                <div class="p-2 rounded-4 d-flex align-items-center justify-content-between"
                                    style="background-color: #ffffff; border:1px solid #dee2e6;">

                                    <div class="fw-bold text-dark" style="color: #333 !important; " 
                                        id="yapeNumero"
                                        data-numero="{{ $empresa->whatsapp }}">

                                        {{ $empresa->whatsapp }}

                                    </div>

                                    <button type="button"
                                        id="btnCopiarYape"
                                        class="btn btn-primary btn-sm rounded-pill px-3 fw-bold">

                                        Copiar 📋

                                    </button>
                                </div>
                            </div>

                            <!-- Datos pago -->
                            <div class="col-md-7">

                                <div class="row">

                                    <!-- Precio -->
                                    <div class="col-md-6">
                                        <div class="p-3 rounded-4 mb-3"
                                            style="background: linear-gradient(135deg, #00c6ff, #0072ff);">

                                            <div class="small text-white">
                                                Precio por Ticket
                                            </div>

                                            <div class="fw-bold fs-4 text-white">
                                                S/ {{ number_format($sorteo->price, 2) }}
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Total -->
                                    <div class="col-md-6">
                                        <div class="p-3 rounded-4 mb-3"
                                            style="background-color: #ffffff; border:1px solid #dee2e6;">

                                            <div class="small text-muted">
                                                Total a pagar
                                            </div>

                                            <div class="fw-bold fs-4" style="color: #333 !important;"
                                                id="totalPagar">

                                                S/ {{ number_format($sorteo->price, 2) }}

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Upload -->
                                <div class="col-md-8 m-auto text-center">

                                    <label class="form-label text-dark fw-semibold">
                                        Adjuntar comprobante
                                    </label>

                                    <div id="dropZone"
                                        class="p-4 text-center rounded-4 position-relative"
                                        style="background-color: #ffffff; border: 2px dashed #ced4da; cursor: pointer;">

                                        <div class="mb-2" style="font-size: 32px;">
                                            📤
                                        </div>

                                        <div class="fw-bold text-dark">
                                            Sube tu comprobante
                                        </div>

                                        <div class="small text-muted">
                                            Arrastra o haz clic aquí
                                        </div>

                                        <div id="fileName"
                                            class="mt-2 text-success small fw-semibold">
                                        </div>

                                        <input type="file"
                                            id="inputComprobante"
                                            name="comprobante"
                                            accept="image/jpeg,image/png,image/webp,.pdf""
                                            class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                            required>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Términos y condiciones -->
                    <div class="mt-4">

                        <div class="form-check d-flex align-items-start gap-2">

                            <input class="form-check-input mt-1"
                                type="checkbox"
                                checked
                                disabled
                                id="terminosCheck">

                            <label class="form-check-label small text-muted"
                                for="terminosCheck">

                                Al enviar este registro, aceptas automáticamente los
                                <a href="{{ route('terminos') }}"
                                    target="_blank"
                                    class="text-primary fw-semibold text-decoration-none">

                                    términos y condiciones

                                </a>
                                y el tratamiento de tus datos personales para la participación
                                en el sorteo.

                            </label>

                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="mt-4 text-end">

                        <button type="button"
                            class="btn btn-light border me-2"
                            data-bs-dismiss="modal">

                            Cancelar

                        </button>

                        <button type="submit"
                            class="btn btn-primary px-4"
                            id="btnEnviarRegistro">

                            Enviar Registro

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endif

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    const swiper = new Swiper(".myGallery", {
        loop: true,
        spaceBetween: 15,
        grabCursor: true,

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        breakpoints: {
            0: {
                slidesPerView: 2
            },
            640: {
                slidesPerView: 3
            },
            1024: {
                slidesPerView: 4
            },
            1280: {
                slidesPerView: 5
            }
        }
    });
</script>

<script>
    // Fecha del sorteo desde Laravel


    let fechaSorteo = @json($sorteo && $sorteo -> date ? \Carbon\Carbon::parse($sorteo -> date) -> format('Y-m-d H:i:s') : null);

    fechaSorteo = fechaSorteo ? new Date(fechaSorteo).getTime() : null;


    function actualizarContador() {

        if (!fechaSorteo) {
            document.getElementById("dias1").innerText = "--";
            document.getElementById("horas1").innerText = "--";
            document.getElementById("minutos1").innerText = "--";

            document.getElementById("dias").innerText = "--";
            document.getElementById("horas").innerText = "--";
            document.getElementById("minutos").innerText = "--";
            document.getElementById("segundos").innerText = "--";
            return;
        }

        const ahora = new Date().getTime();
        const diferencia = fechaSorteo - ahora;

        if (diferencia <= 0) {
            document.getElementById("dias").innerText = "00";
            document.getElementById("horas").innerText = "00";
            document.getElementById("minutos").innerText = "00";
            document.getElementById("segundos").innerText = "00";

            document.getElementById("dias1").innerText = "00";
            document.getElementById("horas1").innerText = "00";
            document.getElementById("minutos1").innerText = "00";
            return;
        }

        const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
        const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
        const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

        const dias1 = Math.floor(diferencia / (1000 * 60 * 60 * 24));
        const horas1 = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutos1 = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));


        document.getElementById("dias").innerText = String(dias).padStart(2, '0');
        document.getElementById("horas").innerText = String(horas).padStart(2, '0');
        document.getElementById("minutos").innerText = String(minutos).padStart(2, '0');
        document.getElementById("segundos").innerText = String(segundos).padStart(2, '0');

        document.getElementById("dias1").innerText = String(dias1).padStart(2, '0');
        document.getElementById("horas1").innerText = String(horas1).padStart(2, '0');
        document.getElementById("minutos1").innerText = String(minutos1).padStart(2, '0');
    }

    // Ejecutar cada segundo
    setInterval(actualizarContador, 1000);

    // Ejecutar inmediatamente al cargar
    actualizarContador();
</script>

<script>
    const formRegistro = document.getElementById('formRegistro');
    const btnEnviar = document.getElementById('btnEnviarRegistro');

    formRegistro.addEventListener('submit', function(e) {

        e.preventDefault();

        const tipo = document.querySelector('[name="tipo_documento"]').value;
        const numero = document.querySelector('[name="numero_documento"]').value.trim();
        const nombres = document.querySelector('[name="nombres"]').value.trim();
        const apellidos = document.querySelector('[name="apellidos"]').value.trim();
        const telefono = document.querySelector('[name="telefono"]').value.trim();
        const file = document.querySelector('[name="comprobante"]').files[0];

        const regexTexto = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
        const regexNumero = /^[0-9]+$/;
        const regexTelefono = /^[0-9]{9}$/;

        // VALIDACIONES

        if (!regexTexto.test(nombres)) {
            Swal.fire({
                icon: 'warning',
                title: 'Dato inválido',
                text: 'Nombres inválidos'
            });
            return;
        }

        if (!regexTexto.test(apellidos)) {
            Swal.fire({
                icon: 'warning',
                title: 'Dato inválido',
                text: 'Apellidos inválidos'
            });
            return;
        }

        if (tipo === 'dni') {

            if (!regexNumero.test(numero) || (numero.length !== 7 && numero.length !== 8)) {

                Swal.fire({
                    icon: 'warning',
                    title: 'DNI inválido',
                    text: 'El DNI debe tener 7 u 8 dígitos numéricos'
                });

                return;
            }
        }

        if (tipo === 'ce') {

            if (numero.length < 9) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Documento inválido',
                    text: 'Carnet de extranjería inválido'
                });

                return;
            }
        }

        if (tipo === 'pasaporte') {

            if (numero.length < 6) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Documento inválido',
                    text: 'Pasaporte inválido'
                });

                return;
            }
        }

        if (!regexTelefono.test(telefono)) {

            Swal.fire({
                icon: 'warning',
                title: 'Teléfono inválido',
                text: 'El teléfono debe tener 9 dígitos'
            });

            return;
        }

        if (file) {

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/jpg'
            ];

            if (!allowedTypes.includes(file.type)) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Archivo inválido',
                    text: 'Solo se permiten imágenes JPG o PNG'
                });

                return;
            }

            if (file.size > 2 * 1024 * 1024) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Archivo demasiado grande',
                    text: 'La imagen no debe superar los 2 MB'
                });

                return;
            }
        }

        // DESHABILITAR BOTÓN
        btnEnviar.disabled = true;

        const textoOriginal = btnEnviar.innerHTML;

        btnEnviar.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Registrando...
        `;

        let formData = new FormData(this);

        fetch("{{ route('tickets.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {

            if (data.success) {

                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    text: data.message,
                    confirmButtonText: 'Aceptar'
                });

                formRegistro.reset();

                let modal = bootstrap.Modal.getInstance(
                    document.getElementById('modalRegistro')
                );

                modal.hide();

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Ocurrió un error'
                });

            }

        })
        .catch(error => {

            console.error(error);

            Swal.fire({
                icon: 'error',
                title: 'Error del servidor',
                text: 'Ocurrió un problema al registrar el ticket'
            });

        })
        .finally(() => {

            btnEnviar.disabled = false;
            btnEnviar.innerHTML = textoOriginal;

        });

    });
</script>

<script>
    // Solo números en documento
    document.querySelector('[name="numero_documento"]').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9a-zA-Z]/g, '');
    });

    // Solo letras en nombres
    document.querySelector('[name="nombres"]').addEventListener('input', function() {
        this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    });

    document.querySelector('[name="apellidos"]').addEventListener('input', function() {
        this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    });

    // Solo números en teléfono
    document.querySelector('[name="telefono"]').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>

<script>
    const tipoDoc = document.querySelector('[name="tipo_documento"]');
    const numDoc = document.querySelector('[name="numero_documento"]');

    // 🔁 Cuando cambia el tipo de documento
    tipoDoc.addEventListener('change', function() {

        numDoc.value = ''; // limpiar

        if (this.value === 'dni') {
            numDoc.setAttribute('maxlength', '8');
            numDoc.setAttribute('inputmode', 'numeric');
        } else if (this.value === 'ce') {
            numDoc.setAttribute('maxlength', '12');
            numDoc.removeAttribute('inputmode');
        } else if (this.value === 'pasaporte') {
            numDoc.setAttribute('maxlength', '12');
            numDoc.removeAttribute('inputmode');
        } else {
            numDoc.removeAttribute('maxlength');
        }

    });

    // ⛔ Validación en tiempo real mientras escribe
    numDoc.addEventListener('input', function() {

        const tipo = tipoDoc.value;

        if (tipo === 'dni') {
            // solo números
            this.value = this.value.replace(/[^0-9]/g, '');
        }

        if (tipo === 'ce' || tipo === 'pasaporte') {
            // letras y números (sin símbolos raros)
            this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
        }

    });
</script>

<script>
    const modal = document.getElementById('modalRegistro');
    const form = document.getElementById('formRegistro');

    modal.addEventListener('hidden.bs.modal', function() {

        // 🔄 Resetear formulario
        form.reset();

        // Restaurar valor por defecto de cantidad
        document.getElementById('cantidadTickets').value = 1;

        // Limpiar nombre mostrado
        document.getElementById('fileName').textContent = '';

        // 🧼 Limpiar archivo (importante)
        const fileInput = form.querySelector('[name="comprobante"]');
        if (fileInput) {
            fileInput.value = '';
        }

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const btnCopiar = document.getElementById("btnCopiarYape");
        const yapeNumero = document.getElementById("yapeNumero");

        btnCopiar.addEventListener("click", function() {

            const numeroReal = yapeNumero.dataset.numero;

            navigator.clipboard.writeText(numeroReal).then(() => {

                btnCopiar.innerHTML = "Copiado ✔";
                btnCopiar.classList.remove("btn-light");
                btnCopiar.classList.add("btn-success");

                setTimeout(() => {
                    btnCopiar.innerHTML = "Copiar📋";
                    btnCopiar.classList.remove("btn-success");
                    btnCopiar.classList.add("btn-light");
                }, 1500);

            });

        });

    });
</script>

<script>
    const precio = {{ $sorteo->price ?? 0 }};

    const inputCantidad = document.getElementById('cantidadTickets');
    const total = document.getElementById('totalPagar');

    document.getElementById('btnMas').onclick = () => {
        inputCantidad.value = parseInt(inputCantidad.value) + 1;
        calcularTotal();
    };

    document.getElementById('btnMenos').onclick = () => {
        if (inputCantidad.value > 1) {
            inputCantidad.value = parseInt(inputCantidad.value) - 1;
            calcularTotal();
        }
    };

    inputCantidad.addEventListener('input', calcularTotal);

    function calcularTotal() {
        let cantidad = parseInt(inputCantidad.value) || 1;
        let totalFinal = cantidad * precio;
        total.innerText = 'S/ ' + totalFinal.toFixed(2);
    }
</script>

<script>
    const inputFile = document.getElementById('inputComprobante');
    const fileName = document.getElementById('fileName');
    const previewContainer = document.getElementById('previewContainer');
    const previewImg = document.getElementById('previewImg');
    const dropZone = document.getElementById('dropZone');

    inputFile.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            fileName.textContent = "Archivo: " + file.name;

            // Preview solo si es imagen
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('d-none');
            }
        }
    });

    // Efecto hover
    dropZone.addEventListener('mouseover', () => {
        dropZone.style.borderColor = '#0d6efd';
    });

    dropZone.addEventListener('mouseleave', () => {
        dropZone.style.borderColor = 'rgba(255,255,255,0.2)';
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {

        const urlParams = new URLSearchParams(window.location.search);

        // Abrir modal automáticamente
        if (urlParams.get('openModal') === '1') {

            const modalElement = document.getElementById('modalRegistro');

            if (modalElement) {

                const modal = new bootstrap.Modal(modalElement);

                modal.show();

                // Seleccionar sorteo automáticamente
                const sorteoId = urlParams.get('sorteo');

                if (sorteoId) {
                    document.querySelector('[name="raffle_id"]').value = sorteoId;
                }

                // Cantidad tickets
                const cantidad = urlParams.get('cantidad');

                if (cantidad) {

                    const inputCantidad = document.getElementById('cantidadTickets');

                    inputCantidad.value = cantidad;

                    calcularTotal();
                }
            }
        }

    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        new Swiper('.winnersSwiper', {
            loop: true,
            spaceBetween: 24,
            slidesPerView: 1,

            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },

            navigation: {
                nextEl: '.winners-next',
                prevEl: '.winners-prev',
            },

            pagination: {
                el: '.winners-pagination',
                clickable: true,
            },

            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });

    });
</script>

@endsection



