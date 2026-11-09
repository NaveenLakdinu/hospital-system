<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboard New Doctor — Admin Portal</title>
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
        <div class="max-w-4xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center text-white font-bold text-sm">FC</a>
                <div>
                    <h1 class="font-display font-bold text-base text-slate-900 leading-tight">Doctor Onboarding</h1>
                    <p class="text-[11px] text-slate-400">Family Care Medical Center &amp; Pharmacy</p>
                </div>
            </div>

            <a href="{{ route('admin.doctors.index') }}" class="text-xs font-semibold text-slate-600 hover:text-emerald-600 px-3 py-2 rounded-lg hover:bg-slate-50 transition-colors">
                ← Back to Doctor List
            </a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-6 py-8">
        {{-- Form Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
            <div class="mb-6 pb-6 border-b border-slate-100">
                <h2 class="font-display font-bold text-xl text-slate-900">Onboard New Medical Officer</h2>
                <p class="text-xs text-slate-500 mt-1">This will automatically create a Doctor User Login account and a Clinical Consultation profile.</p>
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

            <form method="POST" action="{{ route('admin.doctors.store') }}" class="space-y-6">
                @csrf

                {{-- Section 1: User Login Credentials --}}
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">1. Login &amp; Account Details</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Doctor Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Dr. Kasun Silva" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email Address (Login ID) <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="e.g. kasun@familycare.com" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Temporary Login Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password" placeholder="At least 8 characters" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                            <p class="text-[11px] text-slate-400 mt-1">The doctor will use this password to log in to the Doctor Portal.</p>
                        </div>
                    </div>
                </div>

                {{-- Section 2: Clinical & Medical Profile --}}
                <div class="pt-6 border-t border-slate-100">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">2. Medical &amp; Clinical Profile</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Specialization <span class="text-red-500">*</span></label>
                            <input type="text" name="specialization" value="{{ old('specialization') }}" placeholder="e.g. General Physician, Pediatrician" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">SLMC License Number <span class="text-red-500">*</span></label>
                            <input type="text" name="license_number" value="{{ old('license_number') }}" placeholder="e.g. SLMC-54120" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Qualifications <span class="text-red-500">*</span></label>
                            <input type="text" name="qualification" value="{{ old('qualification') }}" placeholder="e.g. MBBS (Sri Lanka), MD" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Consultation Fee (LKR) <span class="text-red-500">*</span></label>
                            <input type="number" step="0.01" name="consultation_fee" value="{{ old('consultation_fee', '1500.00') }}" placeholder="1500.00" required
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Consultation Room / Chamber</label>
                            <input type="text" name="room_number" value="{{ old('room_number') }}" placeholder="e.g. Room 03, OPD Block"
                                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Doctor Bio / Background (Optional)</label>
                            <textarea name="bio" rows="3" placeholder="Brief background of the doctor's clinical experience..."
                                      class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">{{ old('bio') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.doctors.index') }}" class="px-5 py-2.5 text-xs font-semibold text-slate-600 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs px-6 py-2.5 rounded-xl shadow-md transition-all">
                        Create Doctor Account &amp; Onboard
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
