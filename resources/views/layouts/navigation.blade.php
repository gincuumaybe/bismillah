
<aside class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-br from-custom-blue to-custom-blue-light text-white overflow-auto font-poppins">
    <!-- Logo -->
    <div class="p-6 font-bold text-xl border-b border-white">
        <a href="{{ route('dashboard') }}">
            👋 {{ Auth::user()->name }}
        </a>
    </div>

    <!-- Navigation -->
    <nav class="mt-6 space-y-2 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('dashboard') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.333 16.667V11.667h3.334v5H15.833V10h2.5L10 2.5 1.667 10h2.5v6.667H8.333Z" fill="currentColor"/>
            </svg>
        <span>Dashboard</span>
        </a>

        <!-- Link lain -->
        <a href="{{ route('penghuni.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('penghuni.*') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 5.5A3.5 3.5 0 1 1 8.5 9 3.5 3.5 0 0 1 12 5.5m-7 2a3 3 0 0 1 1.53.42c-.15 1.43.27 2.85 1.13 3.96A3 3 0 0 1 5 14a3 3 0 0 1-3-3 3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3 3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.54 5.54 0 0 0 1.13-3.96 3 3 0 0 1 1.53-.42M5.5 18.25C5.5 16.18 8.41 14.5 12 14.5s6.5 1.68 6.5 3.75V20h-13zM0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9-.59.68-.95 1.62-.95 2.65V20zm24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65 2.56.34 4.45 1.51 4.45 2.9z"/>
            </svg>
        <span>Daftar Penghuni</span>
        </a>

        <!-- Link lain -->
        <a href="{{ route('laporan.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('laporan.*') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm2 4v2h10V7H7zm0 4v2h10v-2H7zm0 4v2h7v-2H7z"/>
            </svg>
        <span>Daftar Laporan Keluhan</span>
        </a>

        <a href="{{ route('admin.transaksi.riwayat') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('admin.transaksi.riwayat*') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.5 8H12v5l4.28 2.54l.72-1.21l-3.5-2.08zM13 3a9 9 0 0 0-9 9H1l3.96 4.03L9 12H6a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.9 8.9 0 0 0 13 21a9 9 0 0 0 9-9a9 9 0 0 0-9-9"/></svg>
        <span>Data Seluruh Transaksi</span>
        </a>
    </nav>

    <!-- Bottom Logout -->
    <div class="absolute bottom-0 w-full px-4 py-4 border-t border-white">
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="button" id="btn-logout" class="flex items-center w-full text-left px-3 py-2 rounded hover:bg-custom-blue-light">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>

    <script>
    document.getElementById('btn-logout').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Sesi akan berakhir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3D90D7',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>

</aside>
