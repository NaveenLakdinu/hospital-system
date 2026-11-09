<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pharmacists — Admin Portal</title>
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
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center text-white font-bold text-sm">FC</a>
                <div>
                    <h1 class="font-display font-bold text-base text-slate-900 leading-tight">Pharmacy Staff Management</h1>
                    <p class="text-[11px] text-slate-400">Family Care Medical Center &amp; Pharmacy</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold text-slate-600 hover:text-emerald-600 px-3 py-2 rounded-lg hover:bg-slate-50 transition-colors">
                    ← Back to Dashboard
                </a>
                <a href="{{ route('admin.pharmacists.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-sm transition-all flex items-center gap-1.5">
                    <span>+</span> Onboard New Pharmacist
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        {{-- Success Banner --}}
        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pharmacists Table Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="font-display font-bold text-lg text-slate-900">Registered Pharmacy Officers</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Authorized staff managing medicine inventory and prescription fulfillment.</p>
                </div>
                <span class="text-xs font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-full">
                    Total: {{ $pharmacists->total() }} Staff Members
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50/75 border-b border-slate-150 text-slate-500 uppercase font-semibold text-[11px] tracking-wider">
                        <tr>
                            <th class="px-6 py-3.5">Pharmacist Name</th>
                            <th class="px-6 py-3.5">Email (Login ID)</th>
                            <th class="px-6 py-3.5">Role</th>
                            <th class="px-6 py-3.5">Date Onboarded</th>
                            <th class="px-6 py-3.5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($pharmacists as $pharmacist)
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-500 to-emerald-600 text-white font-bold flex items-center justify-center text-xs shrink-0 shadow-sm">
                                            {{ strtoupper(substr($pharmacist->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <span class="font-bold text-slate-900 block text-sm">{{ $pharmacist->name }}</span>
                                            <span class="text-[11px] text-slate-400">ID: #PH-{{ str_pad($pharmacist->id, 4, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-mono text-slate-600">
                                    {{ $pharmacist->email }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-teal-700 bg-teal-50 border border-teal-200 px-2.5 py-0.5 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span> Pharmacist
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $pharmacist->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('admin.pharmacists.destroy', $pharmacist->id) }}" onsubmit="return confirm('Are you sure you want to remove {{ $pharmacist->name }}? This will revoke their access to the pharmacy portal.');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-semibold text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition-colors">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-slate-400 text-xs">
                                    No pharmacists onboarded yet. Click <a href="{{ route('admin.pharmacists.create') }}" class="text-teal-600 font-semibold underline">here</a> to register your first pharmacy staff member.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($pharmacists->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $pharmacists->links() }}
                </div>
            @endif
        </div>
    </main>

</body>
</html>
