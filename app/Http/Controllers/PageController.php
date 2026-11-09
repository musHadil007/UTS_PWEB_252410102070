<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:30',
            'password' => 'required|string|min:6',
        ]);

        $username = $request->input('username');

        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function showDashboard(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $stats = [
            [
                'label' => 'Total Pengguna',
                'value' => '1.284',
                'icon' => 'users',
                'color' => 'indigo',
                'change' => '+12%',
                'up' => true,
            ],
            [
                'label' => 'Produk Aktif',
                'value' => '342',
                'icon' => 'box',
                'color' => 'emerald',
                'change' => '+5%',
                'up' => true,
            ],
            [
                'label' => 'Transaksi Hari Ini',
                'value' => '89',
                'icon' => 'shopping-cart',
                'color' => 'amber',
                'change' => '-3%',
                'up' => false,
            ],
            [
                'label' => 'Pendapatan Bulan Ini',
                'value' => 'Rp 48,7 Jt',
                'icon' => 'trending-up',
                'color' => 'rose',
                'change' => '+18%',
                'up' => true,
            ],
        ];

        $recentActivities = [
            ['time' => '08:30',  'desc' => 'Pengguna baru terdaftar: andi_prayoga',   'type' => 'user'],
            ['time' => '09:15',  'desc' => 'Produk "Laptop Asus ROG" diperbarui',      'type' => 'product'],
            ['time' => '10:00',  'desc' => 'Transaksi #TRX-2024-0981 dikonfirmasi',   'type' => 'transaction'],
            ['time' => '11:22',  'desc' => 'Laporan bulanan berhasil di-generate',    'type' => 'report'],
            ['time' => '13:05',  'desc' => 'Backup database otomatis selesai',        'type' => 'system'],
        ];

        return view('dashboard', compact('username', 'stats', 'recentActivities'));
    }

    public function showPengelolaan(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $products = [
            [
                'id' => 'PRD-001',
                'nama' => 'Laptop Asus ROG Strix G16',
                'kategori' => 'Elektronik',
                'stok' => 24,
                'harga' => 'Rp 18.500.000',
                'status' => 'Aktif',
            ],
            [
                'id' => 'PRD-002',
                'nama' => 'Mechanical Keyboard Keychron K2',
                'kategori' => 'Aksesori',
                'stok' => 57,
                'harga' => 'Rp 1.250.000',
                'status' => 'Aktif',
            ],
            [
                'id' => 'PRD-003',
                'nama' => 'Monitor LG UltraWide 34"',
                'kategori' => 'Elektronik',
                'stok' => 11,
                'harga' => 'Rp 7.800.000',
                'status' => 'Aktif',
            ],
            [
                'id' => 'PRD-004',
                'nama' => 'SSD Samsung 970 EVO 1TB',
                'kategori' => 'Penyimpanan',
                'stok' => 0,
                'harga' => 'Rp 1.750.000',
                'status' => 'Habis',
            ],
            [
                'id' => 'PRD-005',
                'nama' => 'Webcam Logitech C920 HD',
                'kategori' => 'Aksesori',
                'stok' => 33,
                'harga' => 'Rp 1.100.000',
                'status' => 'Aktif',
            ],
            [
                'id' => 'PRD-006',
                'nama' => 'Router TP-Link Archer AX73',
                'kategori' => 'Jaringan',
                'stok' => 8,
                'harga' => 'Rp 1.890.000',
                'status' => 'Aktif',
            ],
            [
                'id' => 'PRD-007',
                'nama' => 'Headset Sony WH-1000XM5',
                'kategori' => 'Audio',
                'stok' => 19,
                'harga' => 'Rp 5.200.000',
                'status' => 'Aktif',
            ],
            [
                'id' => 'PRD-008',
                'nama' => 'Mousepad XL Razer Gigantus',
                'kategori' => 'Aksesori',
                'stok' => 0,
                'harga' => 'Rp 480.000',
                'status' => 'Habis',
            ],
        ];

        $categories = ['Semua', 'Elektronik', 'Aksesori', 'Penyimpanan', 'Jaringan', 'Audio'];

        return view('pengelolaan', compact('username', 'products', 'categories'));
    }

    public function showProfile(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $profileData = [
            'username' => $username,
            'nama_lengkap' => ucwords(str_replace(['_', '.'], ' ', $username)),
            'email' => strtolower($username).'@example.com',
            'jabatan' => 'Administrator',
            'departemen' => 'Teknologi Informasi',
            'bergabung' => 'Januari 2023',
            'lokasi' => 'Jakarta, Indonesia',
            'avatar_initial' => strtoupper(substr($username, 0, 2)),
        ];

        $activityLog = [
            ['tanggal' => '09 Nov 2025', 'aktivitas' => 'Login berhasil dari perangkat baru',   'icon' => 'log-in'],
            ['tanggal' => '07 Nov 2025', 'aktivitas' => 'Memperbarui data produk PRD-003',       'icon' => 'edit'],
            ['tanggal' => '05 Nov 2025', 'aktivitas' => 'Generate laporan bulanan Oktober',      'icon' => 'file-text'],
            ['tanggal' => '01 Nov 2025', 'aktivitas' => 'Menambahkan pengguna baru ke sistem',   'icon' => 'user-plus'],
            ['tanggal' => '28 Okt 2025', 'aktivitas' => 'Mengubah pengaturan notifikasi',        'icon' => 'settings'],
        ];

        $personalStats = [
            ['label' => 'Produk Dikelola',  'value' => '128'],
            ['label' => 'Transaksi Diproses', 'value' => '543'],
            ['label' => 'Laporan Dibuat',   'value' => '24'],
        ];

        return view('profile', compact('username', 'profileData', 'activityLog', 'personalStats'));
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
