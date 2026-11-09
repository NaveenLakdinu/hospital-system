<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Reports &amp; Analytics — Admin Portal</title>
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
                    <h1 class="font-display font-bold text-base text-slate-900 leading-tight">Clinic Reports &amp; Analytics</h1>
                    <p class="text-[11px] text-slate-400">Family Care Medical Center &amp; Pharmacy</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold text-slate-600 hover:text-emerald-600 px-3 py-2 rounded-lg hover:bg-slate-50 transition-colors">
                    ← Back to Dashboard
                </a>
                <a href="{{ route('admin.reports.export', ['start_date' => $startDate, 'end_date' => $endDate]) }}"
                   class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-sm transition-all flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export CSV Report
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8 space-y-6">

        {{-- Date Filter Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
            <form method="GET" action="{{ route('admin.reports.index') }}" class="flex flex-col sm:flex-row items-end gap-3 justify-between">
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">From Date</label>
                        <input type="date" name="start_date" value="{{ $startDate }}"
                               class="w-full sm:w-44 px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">To Date</label>
                        <input type="date" name="end_date" value="{{ $endDate }}"
                               class="w-full sm:w-44 px-3.5 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                    </div>
                </div>

                <div class="flex gap-2 w-full sm:w-auto">
                    <button type="submit" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs px-5 py-2 rounded-xl shadow-sm transition-all">
                        Generate Report
                    </button>
                    <a href="{{ route('admin.reports.index') }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold rounded-xl flex items-center">
                        This Month
                    </a>
                </div>
            </form>
        </div>

        {{-- KPI Metrics Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                <span class="text-xs font-semibold text-slate-400 uppercase">Period Volume</span>
                <p class="font-display font-extrabold text-3xl text-slate-900 mt-1">{{ number_format($totalAppointments) }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Total appointments booked</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                <span class="text-xs font-semibold text-slate-400 uppercase">Confirmed Sessions</span>
                <p class="font-display font-extrabold text-3xl text-emerald-600 mt-1">{{ number_format($confirmedCount) }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Upcoming or active tokens</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                <span class="text-xs font-semibold text-slate-400 uppercase">Completed Consultations</span>
                <p class="font-display font-extrabold text-3xl text-blue-600 mt-1">{{ number_format($completedCount) }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Patients treated successfully</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                <span class="text-xs font-semibold text-slate-400 uppercase">Cancelled Bookings</span>
                <p class="font-display font-extrabold text-3xl text-rose-600 mt-1">{{ number_format($cancelledCount) }}</p>
                <p class="text-[11px] text-slate-400 mt-1">
                    @if($totalAppointments > 0)
                        {{ round(($cancelledCount / $totalAppointments) * 100, 1) }}% cancellation rate
                    @else
                        0% cancellation rate
                    @endif
                </p>
            </div>
        </div>

        {{-- Section: Doctor Utilisation --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="font-display font-bold text-base text-slate-900">Doctor Utilisation &amp; Workload</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Appointment volume handled by each medical officer in this period.</p>
                </div>
                <span class="text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100 px-3 py-1 rounded-full">
                    {{ count($doctorStats) }} Active Practitioners
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50/75 border-b border-slate-150 text-slate-500 uppercase font-semibold text-[11px] tracking-wider">
                        <tr>
                            <th class="px-6 py-3.5">Doctor Name</th>
                            <th class="px-6 py-3.5">Specialization</th>
                            <th class="px-6 py-3.5">SLMC License</th>
                            <th class="px-6 py-3.5 text-center">Total Bookings</th>
                            <th class="px-6 py-3.5 text-center">Completed</th>
                            <th class="px-6 py-3.5">Volume Share</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($doctorStats as $doc)
                            @php
                                $share = $totalAppointments > 0 ? round(($doc->appointments_count / $totalAppointments) * 100) : 0;
                            @endphp
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="px-6 py-4 font-bold text-slate-900">
                                    {{ $doc->user?->name ?? 'Doctor' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-100">
                                        {{ $doc->specialization }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-slate-500">
                                    {{ $doc->license_number }}
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-slate-800 text-sm">
                                    {{ $doc->appointments_count }}
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-blue-600 text-sm">
                                    {{ $doc->completed_appointments_count }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-28 h-2 rounded-full bg-slate-100 overflow-hidden">
                                            <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $share }}%"></div>
                                        </div>
                                        <span class="font-bold text-slate-700 text-[11px]">{{ $share }}%</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-slate-400">No doctor records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Section: Daily Appointment Volume Breakdown --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h2 class="font-display font-bold text-base text-slate-900 mb-1">Daily Appointment Distribution</h2>
            <p class="text-xs text-slate-400 mb-5">Patient consultation demand across scheduled clinic dates.</p>

            @if($dailyBreakdown->isEmpty())
                <p class="text-xs text-slate-400 text-center py-8">No appointment activity recorded in the selected date window.</p>
            @else
                <div class="space-y-3">
                    @foreach($dailyBreakdown as $day)
                        @php
                            $maxDaily = max($dailyBreakdown->max('count'), 1);
                            $pct = round(($day->count / $maxDaily) * 100);
                        @endphp
                        <div>
                            <div class="flex justify-between items-center text-xs mb-1">
                                <span class="font-semibold text-slate-700">{{ date('D, M d, Y', strtotime($day->appointment_date)) }}</span>
                                <span class="font-bold text-slate-900">{{ $day->count }} appointments</span>
                            </div>
                            <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-500 to-sky-400 rounded-full" style="width: {{ $pct }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </main>

</body>
</html>
