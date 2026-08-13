@extends('layouts.app')

@section('content')

<!-- TopAppBar suppressed as per "The Destination Rule" for Transactional (Login) screen -->
<main class="flex-grow flex items-center justify-center relative">
<!-- Abstract Background Decorative Elements -->
<div class="absolute inset-0 overflow-hidden pointer-events-none">
<div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-primary/10 blur-[120px]"></div>
<div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-secondary/5 blur-[100px]"></div>
</div>
<div class="w-full max-w-md z-10">
<!-- Brand Identity Section -->
<div class="text-center mb-10 pt-5">

<!-- <h1 class="font-headline font-black text-5xl italic tracking-widest text-primary">
                    Login
                </h1> -->

</div>
    <!-- Login Card -->
    <div class="glass-panel border border-outline-variant/15 rounded-3xl p-8 shadow-2xl">
        <form class="space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Field -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-widest text-primary ml-1" for="email">Email Address</label>
                <div class="relative">
                    <!-- <input class="w-full bg-surface-container-low border-0 rounded-xl px-4 py-4 text-on-surface placeholder:text-outline/50 focus:ring-1 focus:ring-primary focus:neon-glow-primary transition-all duration-300" id="email" placeholder="champion@voltrush.com" type="email"/> -->

                    <input id="email" type="email" class="w-full bg-surface-container-low border-0 rounded-xl px-4 py-2 text-on-surface placeholder:text-outline/50 focus:ring-1 focus:ring-primary focus:neon-glow-primary transition-all duration-300 @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="user@gmail.com">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- Password Field -->
            <div class="space-y-2">
                <div class="flex justify-between items-center px-1">
                    <label class="text-xs font-bold uppercase tracking-widest text-primary" for="password">Password</label>
                    <a class="text-xs font-bold text-on-surface-variant hover:text-secondary transition-colors" href="#">Forgot Password?</a>
                </div>
                <div class="relative">
                    <!-- <input class="w-full bg-surface-container-low border-0 rounded-xl px-4 py-4 text-on-surface placeholder:text-outline/50 focus:ring-1 focus:ring-primary focus:neon-glow-primary transition-all duration-300" id="password" placeholder="••••••••" type="password"/> -->

                    <input id="password" type="password" class="w-full bg-surface-container-low border-0 rounded-xl px-4 py-2 text-on-surface placeholder:text-outline/50 focus:ring-1 focus:ring-primary focus:neon-glow-primary transition-all duration-300 @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password" placeholder="••••••••">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- Sign In Button -->
            <button class="w-full bg-gradient-to-r from-primary to-primary-dim text-on-primary font-headline font-black text-lg py-2 rounded-full neon-glow-primary active:scale-95 transition-all duration-150 uppercase tracking-widest" type="submit">
                Iniciar Sesión
            </button>
        </form>
<!-- Divider -->
<div class="relative my-8 text-center">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-outline-variant/30"></div>
</div>
<span class="relative px-4 bg-transparent text-[10px] font-bold text-on-surface-variant uppercase tracking-[0.2em]">Quick Access</span>
</div>

<!-- Sign Up Link -->
<div class="mt-8 text-center">
<p class="text-sm text-on-surface-variant">
                        No tienes cuenta? 
                        <a class="text-secondary font-bold hover:underline underline-offset-4 ml-1" href="#">Crear Cuenta</a>
</p>
</div>
</div>
</div>

</main>

@endsection

