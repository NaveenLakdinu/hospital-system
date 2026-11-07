<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboard Pharmacist — Admin Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">

    {{-- Top Bar --}}
    <header class="bg-white border-b border-slate-200 px-6 py-4 sticky top-0 z-30">
        <div class="max-w-3xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center text-white font-bold text-sm">FC</a>
                <div>
                    <h1 class="font-display font-bold text-base text-slate-900 leading-tight">Pharmacist Onboarding</h1>
                    <p class="text-[11px] text-slate-400">Family Care Medical Center &amp; Pharmacy</p>
                </div>
            </div>

            <a href="{{ route('admin.pharmacists.index') }}" class="text-xs font-semibold text-slate-600 hover:text-teal-600 px-3 py-2 rounded-lg hover:bg-slate-50 transition-colors">
                ← Back to Staff List
            </a>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-6 py-8">
        {{-- Form Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
            <div class="mb-6 pb-6 border-b border-slate-100">
                <h2 class="font-display font-bold text-xl text-slate-900">Register New Pharmacist</h2>
                <p class="text-xs text-slate-500 mt-1">Create credentials for pharmacy staff to access medicine inventory and prescription fulfillment.</p>
            </div>

            {{-- Error Alerts --}}
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-600 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.pharmacists.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Pharmacist Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Chief Pharmacist / Kamal Perera" required
                           class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email Address (Login Username) <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="e.g. pharmacist@familycare.com" required
                           class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Temporary Login Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" placeholder="At least 8 characters" required
                           class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500">
                    <p class="text-[11px] text-slate-400 mt-1">The pharmacist will use this password to sign in to the Pharmacy Portal.</p>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.pharmacists.index') }}" class="px-5 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                        Cancel
                    </a>
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold text-xs px-6 py-2.5 rounded-xl shadow-md transition-all">
                        Create Pharmacist Account
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
