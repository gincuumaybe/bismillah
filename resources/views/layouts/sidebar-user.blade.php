
<aside class="fixed top-0 left-0 h-screen w-64 bg-custom-blue text-white overflow-auto font-poppins">
    <!-- Logo -->
    <div class="p-6 font-bold text-xl border-b border-white">
        <a href="{{ route('user.dashboard') }}">
            👋 {{ Auth::user()->name }}
        </a>
    </div>

    <!-- Navigation -->
    <nav class="mt-6 space-y-2 px-4">
        <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('dashboard') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.333 16.667V11.667h3.334v5H15.833V10h2.5L10 2.5 1.667 10h2.5v6.667H8.333Z" fill="currentColor"/>
            </svg>
        <span>Dashboard</span>
        </a>

        <!-- Link lain -->
        <a href="{{ route('laporan.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('laporan.*') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m13.78 15.3l6 6l2.11-2.16l-6-6zm3.72-5.2c-.39 0-.81-.05-1.14-.19L4.97 21.25l-2.11-2.11l7.41-7.4L8.5 9.96l-.72.7l-1.45-1.41v2.86l-.7.7l-3.52-3.56l.7-.7h2.81l-1.4-1.41l3.56-3.56a2.976 2.976 0 0 1 4.22 0L9.89 5.74l1.41 1.4l-.71.71l1.79 1.78l1.82-1.88c-.14-.33-.2-.75-.2-1.12a3.49 3.49 0 0 1 3.5-3.52c.59 0 1.11.14 1.58.42L16.41 6.2l1.5 1.5l2.67-2.67c.28.47.42.97.42 1.6c0 1.92-1.55 3.47-3.5 3.47"/></svg>
        <span>Laporkan Masalah Kost</span>
        </a>

        <!-- Link lain -->
        <a href="{{ route('pembayaran.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('pembayaran.index*') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2m0 7H4V8h16Z"/></svg>
        <span>Pembayaran</span>
        </a>

        <a href="{{ route('pembayaran.riwayat') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-custom-blue-light {{ request()->routeIs('pembayaran.riwayat*') ? 'bg-custom-blue-light' : '' }}">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.5 8H12v5l4.28 2.54l.72-1.21l-3.5-2.08zM13 3a9 9 0 0 0-9 9H1l3.96 4.03L9 12H6a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.9 8.9 0 0 0 13 21a9 9 0 0 0 9-9a9 9 0 0 0-9-9"/></svg>
        <span>Riwayat Pembayaran</span>
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
