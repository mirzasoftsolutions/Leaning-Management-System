<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body class="relative min-h-screen flex flex-col p-0 lg:p-0">
        <!-- Background Image with Gradient Overlay -->
        <div class="fixed inset-0 z-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('ban.jpeg') }}');"></div>
        
        <header class="relative z-10 w-full lg:max-w-4xl mx-auto max-w-[335px] text-sm mb-12 lg:mb-16 not-has-[nav]:hidden bg-white/70 dark:bg-[#0a0a0a]/70 rounded-xl shadow-lg mt-8 p-4">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between lg:justify-end gap-6">
                    <div class="flex-1 lg:flex-none">
                        <span class="text-lg font-semibold tracking-tight">{{ config('app.name', 'Laravel') }}</span>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-flex px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] hover:bg-[#fafaf8] dark:hover:bg-[#1a1a18] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-md text-sm font-medium leading-normal transition-all duration-200"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-flex px-6 py-2 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] hover:bg-[#fafaf8] dark:hover:border-[#3E3E3A] dark:hover:bg-[#1a1a18] rounded-md text-sm font-medium leading-normal transition-all duration-200"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-flex px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] hover:bg-[#1b1b18] dark:hover:bg-[#EDEDEC] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] dark:hover:text-[#0a0a0a] rounded-md text-sm font-medium leading-normal transition-all duration-200">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            @endif
        </header>
        
        <main class="relative z-10 flex-1 flex items-center justify-center">
            <div class="text-center space-y-10 lg:space-y-16 bg-white/80 dark:bg-[#18181b]/80 rounded-2xl shadow-2xl px-8 py-12 lg:px-16 lg:py-20 max-w-2xl mx-auto backdrop-blur-md">
                <div class="space-y-6">
                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight bg-red-500 from-[#6366f1] via-[#ec4899] to-[#f59e42] bg-clip-text text-transparent drop-shadow-lg animate-fade-in">Welcome</h1>
                    <p class="text-xl lg:text-2xl text-[#44403c] dark:text-[#d6d3d1] max-w-xl mx-auto font-medium animate-fade-in delay-200">Start learning and building amazing projects today</p>
                </div>
                <div class="flex justify-center gap-4 pt-6 animate-fade-in delay-300">
                    <a href="{{ route('courses.index') }}" class="inline-flex px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] hover:bg-[#1b1b18] dark:hover:bg-[#EDEDEC] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] dark:hover:text-[#0a0a0a] rounded-md text-sm font-medium leading-normal transition-all duration-200">Explore Courses</a>

                    <a href="#" class="inline-flex px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] hover:bg-[#1b1b18] dark:hover:bg-[#EDEDEC] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] dark:hover:text-[#0a0a0a] rounded-md text-sm font-medium leading-normal transition-all duration-200">Learn More</a>
                </div>
            </div>
        </main>
        <!-- Simple fade-in animation -->
        <style>
            @keyframes fade-in {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
                animation: fade-in 1s cubic-bezier(0.4,0,0.2,1) both;
            }
            .delay-200 { animation-delay: 0.2s; }
            .delay-300 { animation-delay: 0.3s; }
        </style>
    </body>
</html>
