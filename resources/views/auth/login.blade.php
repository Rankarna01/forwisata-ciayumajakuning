@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<style>
    main { padding: 0 !important; }
</style>

<div class="min-h-screen flex items-center justify-center bg-surface relative overflow-hidden p-4 md:p-8">
    
    <!-- Decorative background elements -->
    <div class="absolute -top-24 -left-24 w-[30rem] h-[30rem] bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 w-[30rem] h-[30rem] bg-accent/10 rounded-full blur-3xl"></div>

    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl shadow-slate-200/50 relative z-10 border border-slate-100 flex flex-col md:flex-row overflow-hidden">
        
        <!-- Kiri: Animasi Lottie -->
        <div class="w-full md:w-1/2 bg-slate-50 relative flex items-center justify-center p-8 border-b md:border-b-0 md:border-r border-slate-100">
            <!-- Background pattern/gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-emerald-100/30"></div>
            
            <div class="relative z-10 w-full max-w-[300px] md:max-w-[400px]">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player 
                    src="{{ asset('cc26d92c-116a-11ee-9b51-1fe8e93a38e8.json') }}" 
                    background="transparent" 
                    speed="1" 
                    style="width: 100%; height: auto;" 
                    loop 
                    autoplay>
                </lottie-player>
            </div>
        </div>

        <!-- Kanan: Form Login -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-primary shadow-inner">
                        @if(isset($setting) && $setting->logo)
                            <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="w-8 h-8 object-contain">
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @endif
                    </div>
                </div>
                <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Selamat Datang</h2>
                <p class="text-sm text-slate-500 mt-2 font-medium">Login untuk mengelola {{ isset($setting) && $setting->nama_sistem ? $setting->nama_sistem : 'Forwisata Ciayumajakuning' }}</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" id="email" class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:bg-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-medium" placeholder="admin@forwisata.com" required>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" name="password" id="password" class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:bg-white focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-medium" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="w-4 h-4 text-primary border-slate-300 rounded focus:ring-primary">
                        <label for="remember" class="ml-2.5 text-sm font-medium text-slate-600">Ingat Saya</label>
                    </div>
                    <a href="#" class="text-sm font-semibold text-primary hover:text-green-700 transition-colors">Lupa Password?</a>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-green-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-primary/30 transition-all duration-300 transform hover:-translate-y-1 mt-2">
                    Masuk ke Dashboard
                </button>
            </form>
            
        </div>
    </div>
</div>
@endsection