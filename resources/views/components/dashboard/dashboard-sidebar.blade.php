<aside id="hs-application-sidebar"
    class="hs-overlay  [--auto-close:lg]
hs-overlay-open:translate-x-0
-translate-x-full transition-all duration-300 transform
w-65 h-full
hidden
fixed inset-y-0 start-0 z-60
bg-white border-e border-gray-200
lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
"
    role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4 flex items-center">
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80"
                href="{{ route('home') }}" aria-label="Preline">
                <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="30"
                    alt="Racik" class="h-9" loading="lazy">
            </a>
        </div>
        <div
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    @role('admin')
                        <x-dashboard.dashboard-sidebar-item icon="bx bxs-dashboard"
                            active="{{ request()->is('admin', 'admin/') }}" text="Dashboard"
                            href="{{ route('admin.dashboard') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bx-plus-medical"
                            active="{{ request()->is('admin/patients*') }}" text="Manajemen Pasien"
                            href="{{ route('admin.patients.index') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bxs-capsule"
                            active="{{ request()->is('admin/herbal-medicines*') }}" text="Manajemen Jamu"
                            href="{{ route('admin.herbal-medicines.index') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bxs-wrench"
                            active="{{ request()->is('admin/dispensers*') }}" text="Monitoring Dispenser"
                            href="{{ route('admin.dispensers.monitor') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bx-notepad"
                            active="{{ request()->is('admin/consumption-reports*') }}" text="Laporan Konsumsi"
                            href="{{ route('admin.consumption-reports.index') }}" />
                    @endrole
                    @role('patient')
                        <x-dashboard.dashboard-sidebar-item icon="bx bxs-dashboard"
                            active="{{ request()->is('patient', 'patient/') }}" text="Dashboard"
                            href="{{ route('patient.dashboard') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bx-plus-medical"
                            active="{{ request()->is('patient/complaint*') }}" text="Input Keluhan"
                            href="{{ route('patient.complaints.index') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bx-notepad"
                            active="{{ request()->is('patient/recommendation*') }}" text="Hasil Rekomendasi"
                            href="{{ route('patient.recommendations.index') }}" />
                        <x-dashboard.dashboard-sidebar-item icon="bx bxs-capsule"
                            active="{{ request()->is('patient/consumption-history*') }}" text="Riwayat Konsumsi"
                            href="{{ route('patient.consumption-history.index') }}" />
                    @endrole
                </ul>
            </nav>
        </div>
    </div>
</aside>
