<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — MediCare24</title>

    {{-- Laravel Breeze + Vite + Tailwind setup --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">

    <div x-data="{ showPw: false }" class="min-h-screen grid lg:grid-cols-2">

    {{-- LEFT — Brand Panel Container --}}
    <div class="hidden lg:flex relative flex-col justify-between overflow-hidden bg-gradient-to-br from-[#0E1B2C] to-[#16304f] p-12 text-white">
        <span class="absolute w-80 h-80 rounded-full bg-teal-400 opacity-20 blur-[100px] -top-20 -left-16"></span>
        <span class="absolute w-72 h-72 rounded-full bg-blue-500 opacity-20 blur-[100px] bottom-0 right-0"></span>

        <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-teal-400 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                    <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="font-display font-bold text-lg">Medi<span class="text-teal-400">Care</span>24</span>
        </a>
    </div>

    {{-- RIGHT — Form Panel Container --}}
    <div class="flex items-center justify-center px-6 py-12 sm:px-12">
        <div class="w-full max-w-sm">
        </div>
    </div>

</div>
</body>
</html>
