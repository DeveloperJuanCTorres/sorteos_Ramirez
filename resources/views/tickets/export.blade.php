@extends('layouts.app')

@section('content')

<main class="max-w-4xl mx-auto py-20 px-6">

    <h1 class="text-4xl font-black mb-6 text-center">
        Exportación de Tickets
    </h1>

    <form method="GET" action="{{ route('tickets.export.print') }}" target="_blank"
        class="bg-surface-container p-6 rounded-2xl border border-outline-variant/20 flex flex-col gap-4">

        <!-- Select Sorteo -->
        <select name="raffle_id" required class="p-3 rounded-xl bg-surface-container-high text-white">
            <option value="">Seleccionar sorteo</option>
            @foreach($sorteos as $s)
                <option value="{{ $s->id }}">
                    {{ $s->name }} - {{ \Carbon\Carbon::parse($s->date)->format('d/m/Y') }}
                </option>
            @endforeach
        </select>

        <!-- Botones -->
        <div class="flex gap-4 justify-center mt-4">

            <button type="submit"
                class="px-6 py-3 bg-primary text-white rounded-xl font-bold">
                Imprimir A4
            </button>

            <a href="#" onclick="printThermal()"
                class="px-6 py-3 bg-orange-600 text-white rounded-xl font-bold">
                Imprimir Ticketera 80mm
            </a>

            <a href="#" onclick="exportExcel()"
                class="px-6 py-3 bg-green-600 text-white rounded-xl font-bold">
                Exportar Excel
            </a>

        </div>

    </form>

</main>

<script>
    function exportExcel(){
        const raffle = document.querySelector('[name="raffle_id"]').value;
        if(!raffle){
            alert('Selecciona un sorteo');
            return;
        }
        window.location.href = `/admin/tickets/export/excel?raffle_id=${raffle}`;
    }
</script>

<script>
    function printThermal(){

        const raffle = document.querySelector('[name="raffle_id"]').value;

        if(!raffle){
            alert('Selecciona un sorteo');
            return;
        }

        window.open(`/admin/tickets/export/thermal?raffle_id=${raffle}`,'_blank');

    }
</script>

@endsection