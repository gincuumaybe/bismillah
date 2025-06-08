<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\PenyewaanKost;

class PembayaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data penyewaan aktif user
        $penyewaan = PenyewaanKost::where('user_id', $user->id)
            ->where('status', 'aktif') // atau sesuai status yang digunakan
            ->first();

        if (!$penyewaan) {
            return redirect()->back()->with('error', 'Tidak ada penyewaan aktif ditemukan');
        }

        $hargaPerBulan = match ($user->lokasi_kost) {
            'Berbek' => 650000,
            'Gunung_Anyar' => 500000,
            'Rungkut' => 500000,
            default => 500000
        };

        // Hitung total pembayaran berdasarkan durasi
        $totalHarga = $hargaPerBulan * $penyewaan->durasi_bulan;

        return view('pembayaran.index', compact('user','penyewaan', 'hargaPerBulan', 'totalHarga'));
    }

    public function bayar(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Ambil data penyewaan aktif user
        $penyewaan = PenyewaanKost::where('user_id', $user->id)
            ->where('status', 'aktif')
            ->first();

        if (!$penyewaan) {
            return response()->json(['error' => 'Tidak ada penyewaan aktif'], 404);
        }

        $hargaPerBulan = match ($user->lokasi_kost) {
            'Berbek' => 650000,
            'Gunung_Anyar' => 500000,
            'Rungkut' => 500000,
            default => 500000
        };

        // Total harga berdasarkan durasi
        $totalHarga = $hargaPerBulan * $penyewaan->durasi_bulan;
        $kode = 'KOST-' . strtoupper(Str::random(10));

        // $transaksi = Transaksi::create([
        //     'user_id' => $user->id,
        //     'penyewaan_id' => $penyewaan->id, // Tambahkan relasi ke penyewaan
        //     'kode_transaksi' => $kode,
        //     'jumlah' => $totalHarga,
        //     'status' => 'success',
        // ]);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $kode,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => 'kost-' . $penyewaan->id,
                    'price' => $totalHarga,
                    'quantity' => 1,
                    'name' => "Sewa Kost {$penyewaan->lokasi_kost} - Kamar {$penyewaan->nomor_kamar} ({$penyewaan->durasi_bulan} bulan)"
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Tambahkan kode di sini untuk menangani sukses tanpa callback
        return response()->json([
            'snap_token' => $snapToken,
            'transaction_status' => 'success',
            'order_id' => $kode
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
            'user_id' => 'required|integer',
            'penyewaan_id' => 'required|integer',
            'jumlah' => 'required|numeric',
            'status' => 'required|string'
        ]);

        // Cek apakah transaksi sudah ada
        $existingTransaction = Transaksi::where('kode_transaksi', $request->order_id)->first();

        if ($existingTransaction) {
            // Update status jika transaksi sudah ada
            $existingTransaction->update(['status' => $request->status]);
            return response()->json([
                'message' => 'Transaction status updated successfully',
                'transaction' => $existingTransaction
            ]);
        }

        // Buat transaksi baru
        $transaksi = Transaksi::create([
            'user_id' => $request->user_id,
            'penyewaan_id' => $request->penyewaan_id,
            'kode_transaksi' => $request->order_id,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Transaction created successfully',
            'transaction' => $transaksi
        ]);
    }

    public function riwayat()
    {
        $transaksis = Transaksi::with('penyewaanKost') // Eager load penyewaan
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('pembayaran.riwayat', compact('transaksis'));
    }

    public function riwayatAdmin()
    {
        // Pastikan pengguna adalah admin (tambahkan middleware di routes jika diperlukan)
        $transaksis = Transaksi::with(['user', 'penyewaanKost'])
            ->latest()
            ->get();
        return view('pembayaran.riwayat-admin', compact('transaksis'));
    }

    public function callback(Request $request)
    {
        return response()->json(['message' => 'Callback tidak digunakan'], 200);
    }
}
