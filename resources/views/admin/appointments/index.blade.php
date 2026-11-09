<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Appointments Monitoring — Admin Portal</title>
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
                    <h1 class="font-display font-bold text-base text-slate-900 leading-tight">Clinic Appointments &amp; Tokens</h1>
                    <p class="text-[11px] text-slate-400">Family Care Medical Center &amp; Pharmacy</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold text-slate-600 hover:text-emerald-600 px-3 py-2 rounded-lg hover:bg-slate-50 transition-colors">
                    ← Back to Dashboard
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

        {{-- Filters Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm mb-6">
            <form method="GET" action="{{ route('admin.appointments.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-end">
                {{-- Date Filter --}}
                <div class="sm:col-span-3">
                    <label class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">Filter by Date</label>
                    <input type="date" name="date" value="{{ request('date') }}"
                           class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                </div>

                {{-- Doctor Filter --}}
                <div class="sm:col-span-4">
                    <label class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">Filter by Doctor</label>
                    <select name="doctor_id" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        <option value="">All Doctors</option>
                        @foreach ($doctors as $doc)
                            <option value="{{ $doc->id }}" {{ request('doctor_id') == $doc->id ? 'selected' : '' }}>
                                {{ $doc->user?->name }} ({{ $doc->specialization }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Status Filter --}}
                <div class="sm:col-span-3">
                    <label class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">Status</label>
                    <select name="status" class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        <option value="">All Statuses</option>
                        <option value="Confirmed" {{ request('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                {{-- Submit Button --}}
                <div class="sm:col-span-2 flex gap-2">
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs py-2 rounded-xl shadow-sm transition-all">
                        Filter
                    </button>
                    @if (request()->hasAny(['date', 'doctor_id', 'status']))
                        <a href="{{ route('admin.appointments.index') }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold rounded-xl flex items-center">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Appointments Table Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="font-display font-bold text-lg text-slate-900">Clinic Bookings Queue</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Live appointment monitoring across all registered practitioners.</p>
                </div>
                <span class="text-xs font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-full">
                    Total: {{ $appointments->total() }} Bookings
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50/75 border-b border-slate-150 text-slate-500 uppercase font-semibold text-[11px] tracking-wider">
                        <tr>
                            <th class="px-6 py-3.5">Token &amp; Reference</th>
                            <th class="px-6 py-3.5">Patient Details</th>
                            <th class="px-6 py-3.5">Assigned Doctor</th>
                            <th class="px-6 py-3.5">Date &amp; Time</th>
                            <th class="px-6 py-3.5">Reason for Visit</th>
                            <th class="px-6 py-3.5">Status</th>
                            <th class="px-6 py-3.5 text-right">Update Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($appointments as $apt)
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-extrabold flex items-center justify-center text-xs shadow-xs">
                                            #{{ $apt->token_number }}
                                        </span>
                                        <span class="font-mono text-[11px] text-slate-500 block">{{ $apt->appointment_number }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-slate-900 block">{{ $apt->patient?->name }}</span>
                                    <span class="text-[11px] text-slate-400">{{ $apt->patient?->email }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-slate-900 block">{{ $apt->doctor?->user?->name }}</span>
                                    <span class="text-[10px] text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded font-semibold inline-block mt-0.5">
                                        {{ $apt->doctor?->specialization }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-semibold text-slate-800 block">{{ date('M d, Y', strtotime($apt->appointment_date)) }}</span>
                                    <span class="text-slate-400 text-[11px]">{{ date('h:i A', strtotime($apt->appointment_time)) }}</span>
                                </td>
                                <td class="px-6 py-4 text-slate-600 max-w-xs truncate">
                                    {{ $apt->reason_for_visit ?? 'Routine checkup' }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($apt->status === 'Confirmed')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Confirmed
                                        </span>
                                    @elseif ($apt->status === 'Completed')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Completed
                                        </span>
                                    @elseif ($apt->status === 'Cancelled')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Cancelled
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('admin.appointments.updateStatus', $apt->id) }}" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="text-xs py-1 px-2.5 rounded-lg border border-slate-200 bg-white text-slate-700 font-medium focus:outline-none focus:ring-1 focus:ring-emerald-500">
                                            <option value="Confirmed" {{ $apt->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Completed" {{ $apt->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="Cancelled" {{ $apt->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400 text-xs">
                                    No appointments found matching the selected criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($appointments->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $appointments->links() }}
                </div>
            @endif
        </div>
    </main>

</body>
</html>
