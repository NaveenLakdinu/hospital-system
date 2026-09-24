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
    </div>

    {{-- RIGHT — Form Panel Container --}}
    <div class="flex items-center justify-center px-6 py-12 sm:px-12">
        <div class="w-full max-w-sm">
        </div>
    </div>

</div>
</body>
</html>
