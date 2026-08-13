<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.9);}
    to { opacity: 1; transform: scale(1);}
}
.animate-fadeIn {
    animation: fadeIn 0.25s ease;
}
</style>

<!-- TopAppBar -->
<nav class="fixed top-0 w-full z-50 h-16 bg-[#091328] shadow-[0_8px_32px_rgba(6,14,32,0.6)]">
    <div class="flex justify-between items-center px-6 w-full max-w-screen-xl mx-auto h-full">
        <div class="flex items-center gap-3">
            <div onclick="openModal('infoModal')" class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-[#90abff] hover:bg-[#192540] hover:scale-105 transition-all active:scale-95 duration-200 cursor-pointer">
                <i class="fa-solid fa-circle-info text-lg"></i>
            </div>
        </div>
        <!-- <h1 class="font-headline font-black tracking-tighter uppercase text-2xl italic text-[#90abff]">NEON ARENA</h1> -->
         <a href="/">
            <img src="{{asset('storage/' . $empresa->logo)}}" width="180" alt="Oxapremios">
         </a>
         
         
        <div class="flex items-center gap-3">
            <div onclick="openModal('socialModal')" class="w-10 h-10 rounded-full bg-surface-variant flex items-center justify-center text-[#90abff] hover:bg-[#192540] hover:scale-105 transition-all active:scale-95 duration-200 cursor-pointer">
                <i class="fa-solid fa-share-nodes text-lg"></i>
            </div>
        </div>
    </div>
</nav>

<!-- OVERLAY -->
<div id="modalOverlay" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">

    <!-- CONTENEDOR -->
    <div id="modalContent" class="bg-[#0f1a33] w-full max-w-md rounded-3xl shadow-[0_0_60px_rgba(144,171,255,0.2)] p-6 relative animate-fadeIn">

        <!-- CLOSE -->
        <button onclick="closeModal()" class="absolute top-4 right-4 text-slate-400 hover:text-white">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <!-- DINÁMICO -->
        <div id="modalBody"></div>

    </div>
</div>


<script>
    function openModal(type) {
        const overlay = document.getElementById('modalOverlay');
        const body = document.getElementById('modalBody');

        if(type === 'socialModal'){
            body.innerHTML = `
                <h2 class="text-2xl font-bold text-[#90abff] mb-6 text-center">Síguenos</h2>

                <div class="grid grid-cols-2 gap-4">

                    <a href="{{ $empresa->facebook_link }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl bg-[#192540] hover:scale-105 transition">
                        <i class="fab fa-facebook text-blue-500 text-xl"></i>
                        <span>Facebook</span>
                    </a>

                    <a href="{{ $empresa->instagram_link }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl bg-[#192540] hover:scale-105 transition">
                        <i class="fab fa-instagram text-pink-500 text-xl"></i>
                        <span>Instagram</span>
                    </a>

                    <a href="{{ $empresa->tiktok_link }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl bg-[#192540] hover:scale-105 transition">
                        <i class="fab fa-tiktok text-white text-xl"></i>
                        <span>TikTok</span>
                    </a>

                    <a href="https://api.whatsapp.com/send?phone={{ $empresa->whatsapp }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl bg-[#192540] hover:scale-105 transition">
                        <i class="fab fa-whatsapp text-green-500 text-xl"></i>
                        <span>WhatsApp</span>
                    </a>

                </div>
            `;
        }

        if(type === 'infoModal'){
            body.innerHTML = `
                <h2 class="text-2xl font-bold text-[#90abff] mb-4">{{ $empresa->name }}</h2>

                <p>
                {!! Str::markdown($empresa->description) !!}
                </p>

                <div class="space-y-3 text-sm pt-4">


                    <div class="flex items-center gap-3">
                        <i class="fab fa-whatsapp text-green-500"></i>
                        <span>+51 {{ $empresa->whatsapp }}</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-[#90abff]"></i>
                        <span>{{ $empresa->email }}</span>
                    </div>

                </div>

                <div class="mt-6 text-center text-xs text-slate-500">
                    © 2026 {{ $empresa->name }} - Todos los derechos reservados
                </div>
            `;
        }

        overlay.classList.remove('hidden');
    }

    function closeModal(){
        document.getElementById('modalOverlay').classList.add('hidden');
    }
</script>

