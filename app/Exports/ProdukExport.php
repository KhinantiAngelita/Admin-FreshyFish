<?php

namespace App\Exports;

use Illuminate\Support\Facades\Http; // Untuk melakukan request ke API
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Log; // Untuk logging error

class ProdukExport implements FromCollection, WithHeadings
{
    // URL API
    protected $apiUrl = 'https://freshyfishapi.ydns.eu/api/produk';

    // Method untuk mengambil data produk dari API
    public function collection()
    {
        // Token API (dapat disesuaikan sesuai metode penyimpanan Anda)
        $token = session('token'); // Pastikan token disimpan di session atau didapatkan dari frontend

        if (!$token) {
            // Log jika token tidak tersedia
            Log::error('Token not found in session.');
            throw new \Exception('Token not found. Please log in again.');
        }

        // Melakukan request ke API dengan header Authorization Bearer
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token, // Tambahkan token ke header Authorization
            'Accept' => 'application/json', // Menentukan jenis konten yang diterima
        ])->get($this->apiUrl);

        // Cek apakah request berhasil
        if ($response->successful()) {
            // Mengambil data JSON dari respons API
            $produk = $response->json();

            // Log data produk untuk debugging (opsional)
            Log::debug('Data Produk API:', $produk);

            // Mengembalikan koleksi data produk dalam format yang sesuai untuk Excel
            return collect($produk)->map(function ($item) {
                return [
                    'ID Produk' => $item['ID_produk'] ?? '', // Sesuaikan dengan struktur data dari API
                    'Nama Ikan' => $item['fish_type'] ?? '',
                    'Berat Ikan' => $item['fish_weight'] ?? '',
                    'Foto Ikan' => $item['fish_photo'] ?? '',
                    'Deskripsi Ikan' => $item['fish_description'] ?? '',
                    'Kategori Ikan' => $item['habitat'] ?? '',
                ];
            });
        } else {
            // Log error jika request gagal
            Log::error('Error fetching API data:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Lempar exception agar error ditangani dengan baik
            throw new \Exception('Failed to fetch data from API: ' . $response->status());
        }
    }

    // Method untuk menentukan nama kolom pada file Excel
    public function headings(): array
    {
        return [
            'ID Produk',
            'Nama Ikan',
            'Berat Ikan',
            'Foto Ikan',
            'Deskripsi Ikan',
            'Kategori Ikan',
        ];
    }
}
