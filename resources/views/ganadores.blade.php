@extends('layouts.app')

@section('content')


<main class="pt-24 px-6 max-w-screen-xl mx-auto">
    <header class="mb-10 text-center">    
        <div class="flex items-center justify-center gap-3 flex-wrap">
            <h2 class="font-headline text-5xl font-black tracking-tight uppercase">
                Nuestros
            </h2>
            <h2 class="font-headline text-5xl font-black tracking-tight uppercase text-primary italic">
                Ganadores
            </h2>
        </div>
        
        <p class="text-on-surface-variant text-lg mt-2">
            Consulta aquí los ganadores de nuestros sorteos.
        </p>        

    </header>

    <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-8">
        <!-- FILTRO POR SORTEO -->
        <select id="filtroSorteo" class="px-4 py-2 rounded-xl bg-surface-container-high text-white md:w-64">
            <option value="todos">Todos los sorteos</option>
            @foreach($sorteos as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>

        <!-- FILTRO POR PREMIO -->
        <input 
            type="text" 
            id="filtroPremio"
            placeholder="Buscar premio..."
            class="px-4 py-2 rounded-xl bg-surface-container-high text-white w-full md:w-64"
        >

    </div>

    <!-- Winners Bento Feed -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6" style="padding-bottom: 120px;">       

        @forelse($winners as $winner)
        <div class="ticket-item md:col-span-4 bg-surface-container-high rounded-[2rem] overflow-hidden flex flex-col border border-outline-variant/10 shadow-xl group"
            data-sorteo="{{ $winner->raffle_id }}"
            data-premio="{{ strtolower($winner->award->name ?? '') }}">

            <!-- Imagen -->
            <div class="h-48 overflow-hidden relative">
                <img 
                    src="{{ $winner->image ? asset('storage/'.$winner->image) : 'https://via.placeholder.com/400x300' }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-surface-container-high to-transparent"></div>
            </div>

            <!-- Info -->
            <div class="p-6 flex flex-col justify-between flex-1">

                <!-- Nombre + fecha -->
                <div class="flex justify-between items-center mb-3">
                    <h5 class="font-headline font-bold text-on-surface">
                        {{ $winner->name }}
                    </h5>
                    <span class="text-outline text-[10px] font-bold uppercase">
                        {{ $winner->created_at->diffForHumans() }}
                    </span>
                </div>

                <!-- Premio -->
                <p class="text-on-surface-variant text-sm mb-2">
                    🎁 {{ $winner->award->name ?? 'Premio no disponible' }}
                </p>

                <!-- Sorteo -->
                <p class="text-xs text-outline mb-4">
                    🎟 Sorteo: {{ $winner->raffle->name ?? '-' }}
                </p>

                <!-- Tickets -->
                <div class="mb-4">
                    <span class="text-xs text-outline block mb-1">Tickets ganadores:</span>
                    <div class="flex flex-wrap gap-2">
                        @foreach($winner->tickets as $ticket)
                            <span class="px-2 py-1 text-xs bg-primary/20 text-primary rounded-lg">
                               Ticket: {{ $ticket->id }} - {{ $ticket->nombres . ' ' . $ticket->apellidos }} - {{ $ticket->departamento }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Botón -->
                <!-- <button class="w-full py-3 bg-surface-bright text-on-surface font-bold text-xs uppercase tracking-widest rounded-xl border border-outline-variant/30 hover:bg-surface-variant transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">verified</span>
                    Verificado
                </button> -->

            </div>
        </div>

        @empty
        <div class="col-span-12 text-center text-on-surface-variant">
            No hay ganadores registrados aún
        </div>
        @endforelse

        </div>


    <!-- Transparency Banner -->
    <!-- <section class="mt-12 bg-surface-container rounded-3xl p-8 border border-outline-variant/20 flex flex-col md:flex-row items-center gap-8 top-20">
        <div class="flex-1">
            <h4 class="text-2xl font-headline font-black text-on-surface mb-2 italic">BUILT ON TRUST. VERIFIED BY DATA.</h4>
            <p class="text-on-surface-variant">Every single drawing in the Neon Arena is powered by a decentralized Random Number Generator. Your win is mathematically guaranteed to be fair, tamper-proof, and publicly verifiable on the blockchain.</p>
        </div>
        <div class="flex gap-4">
            <img class="h-12 w-auto grayscale opacity-50" data-alt="logo of a blockchain technology company in white flat vector style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3L3EzdXoRZOCO1Ew7HTsKaWR3Q6s_BjqvOOK1-dBAe2occ6Kc9WxBQv-_eaomBTAgmQDT1iIr9Cgh3ZlkPiOF5D8EmmIJboUeHiMTckwwxH8SWyuPYA2oH95AnjkgN7iusP4QNCVNxQBI-36-BVMR0jvoXth9eB5g3rVB3_N92rhR2bolkfLm3z724XafM8qq5qzpOKyn41Zl0AqzwrjJ3TjkA4QcnTpeJmvN9DCnnkk9BSXDjViEVOL5WpJ1yvTdO4sZaLgrGJA" />
            <img class="h-12 w-auto grayscale opacity-50" data-alt="logo of a security verification brand in white flat vector style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPmvdo83FR011RAPbZ7qyrw3sbM8IbZXfAVC1bRm1XAMqrQCRtoxHbucxeMckBStNIvB1dm8F69qNK0swxLFKxMcLsCj00s1_cvo-KnqP93IpEaKhrjpBA4OSXA2PziQnLPvP2GKR7rX22JkNR8alx7AcgJVZiNAcLqoyqBfiIhBMNLKE96oN67G_qvGe-Q0M7uGyHjaOhD42slU_lWa37meG7PKeD1sFQo1-AbTQOmYhYIhzUGbnRit1gADNdazIrexpaZWjVuH8" />
        </div>
    </section> -->
</main>



<script>
    const filtroSorteo = document.getElementById('filtroSorteo');
    const filtroPremio = document.getElementById('filtroPremio');

    function aplicarFiltros(){

        const sorteo = filtroSorteo.value;
        const premio = filtroPremio.value.toLowerCase();

        document.querySelectorAll('.ticket-item').forEach(item => {

            const itemSorteo = item.dataset.sorteo;
            const itemPremio = item.dataset.premio || '';

            let visible = true;

            if(sorteo !== 'todos' && itemSorteo !== sorteo){
                visible = false;
            }

            if(premio && !itemPremio.includes(premio)){
                visible = false;
            }

            item.style.display = visible ? '' : 'none';
        });
    }

    filtroSorteo.addEventListener('change', aplicarFiltros);
    filtroPremio.addEventListener('input', aplicarFiltros);
</script>

@endsection