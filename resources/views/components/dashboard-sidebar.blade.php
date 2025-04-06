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
                href="#" aria-label="Preline">
                <h2 class="text-3xl font-bold">RACIK</h2>
            </a>
        </div>
        <div
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    @role('admin')
                        <x-dashboard-sidebar-item icon="bx bxs-dashboard" active="{{ request()->is('admin', 'admin/') }}"
                            text="Dashboard" href="{{ route('admin.dashboard') }}" />
                        <x-dashboard-sidebar-item icon="bx bx-plus-medical" active="{{ request()->is('admin/patients*') }}"
                            text="Manajemen Pasien" href="{{ route('admin.patients.index') }}" />
                        <x-dashboard-sidebar-item icon="bx bxs-capsule"
                            active="{{ request()->is('admin/herbal-medicines*') }}" text="Manajemen Jamu"
                            href="{{ route('admin.herbal-medicines.index') }}" />
                        <x-dashboard-sidebar-item icon="bx bxs-wrench" active="{{ request()->is('admin/dispensers*') }}"
                            text="Monitoring Dispenser" href="{{ route('admin.dispensers.monitor') }}" />
                        <x-dashboard-sidebar-item icon="bx bx-notepad"
                            active="{{ request()->is('admin/consumption-reports*') }}" text="Laporan Konsumsi"
                            href="{{ route('admin.consumption-reports.index') }}" />
                    @endrole
                </ul>
            </nav>
        </div>
    </div>
</aside>
