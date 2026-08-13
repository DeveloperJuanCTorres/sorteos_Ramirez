<nav class="fixed bottom-0 left-0 w-full z-50 bg-[#060e20]/95 backdrop-blur-xl rounded-t-3xl border-t border-[#192540]/50 shadow-[0_-10px_40px_rgba(0,0,0,0.5)]">
<div class="flex justify-around items-center px-4 pb-6 pt-2">
    <a href="{{ route('home') }}"  class="flex flex-col items-center justify-center py-2 px-4 transition-all duration-150
        {{ request()->routeIs('home') ? 'text-[#90abff] bg-[#90abff]/10 rounded-2xl shadow-[0_0_15px_rgba(144,171,255,0.2)]' : 'text-slate-500 hover:text-[#9bffce]' }}">
        <!-- <div class="flex flex-col items-center justify-center text-slate-500 py-2 px-4 hover:text-[#9bffce] transition-colors cursor-pointer active:scale-90 transition-transform duration-150"> -->
            <i class="fa-solid fa-house mb-1"></i>
            <span class="font-['Inter'] text-[10px] font-bold uppercase tracking-widest">Inicio</span>
        <!-- </div> -->
    </a>

    <a href="{{ route('tickets') }}"  class="flex flex-col items-center justify-center py-2 px-4 transition-all duration-150
        {{ request()->routeIs('tickets') || request()->routeIs('tickets.*') ? 'text-[#90abff] bg-[#90abff]/10 rounded-2xl shadow-[0_0_15px_rgba(144,171,255,0.2)]' : 'text-slate-500 hover:text-[#9bffce]' }}">
        <!-- <div class="flex flex-col items-center justify-center text-[#90abff] bg-[#90abff]/10 rounded-2xl py-2 px-4 shadow-[0_0_15px_rgba(144,171,255,0.2)] active:scale-90 transition-transform duration-150"> -->
            <i class="fa-solid fa-ticket-alt mb-1"></i>
            <span class="font-['Inter'] text-[10px] font-bold uppercase tracking-widest">Tickets</span>
        <!-- </div> -->
    </a>

    <a href="{{ route('ganadores') }}"  class="flex flex-col items-center justify-center py-2 px-4 transition-all duration-150
        {{ request()->routeIs('ganadores') || request()->routeIs('ganadores.*') ? 'text-[#90abff] bg-[#90abff]/10 rounded-2xl shadow-[0_0_15px_rgba(144,171,255,0.2)]' : 'text-slate-500 hover:text-[#9bffce]' }}">
        <!-- <div class="flex flex-col items-center justify-center text-slate-500 py-2 px-4 hover:text-[#9bffce] transition-colors cursor-pointer active:scale-90 transition-transform duration-150"> -->
        <i class="fa-solid fa-trophy mb-1"></i>
        <span class="font-['Inter'] text-[10px] font-bold uppercase tracking-widest">Ganadores</span>
        <!-- </div> -->
    </a>
</div>
</nav>


<!-- <a href="tel:989876161">
  <button class="btn-floating phone">
    <i class="fa-solid fa-phone text-yellow-400 text-2xl"></i>
    <span>989876161</span>
  </button>
</a> -->

<a href="https://api.whatsapp.com/send?phone=51989876161" target="_blank">
  <button class="btn-floating whatsapp">
    <i class="fa-brands fa-whatsapp text-2xl"></i>
    <span>(51) 989876161</span>
  </button>
</a>


