<?php
include '../database/config.php';

$total_sejarah   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'sejarah'"))['total'];
$total_budaya    = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'budaya'"))['total'];
$total_tradisi   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'tradisi'"))['total'];
$total_kuliner   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'kuliner'"))['total'];
$total_destinasi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'destinasi'"))['total'];
$total_modern    = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'modern'"))['total'];
$total_bahasa    = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM konten_budaya WHERE kategori = 'bahasa'"))['total'];

$query_tabel = "SELECT * FROM konten_budaya ORDER BY id DESC";
$eksekusi_tabel = mysqli_query($koneksi, $query_tabel);
?>

<div class="max-h-[calc(100vh-40px)] overflow-y-auto overflow-x-hidden pr-2 custom-scrollbar">

    <header class="mb-10">
        <h1 class="text-3xl font-black tracking-tight text-white">Dashboard Konten</h1>
        <p class="text-slate-400 text-sm mt-1">Selamat datang kembali, kelola data warisan budaya dengan mudah di sini.</p>
    </header>

    <section class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-4 mb-10">
        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Sejarah</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_sejarah; ?></h3>
            </div>
            <div class="w-9 h-9 bg-cyan-500/10 text-cyan-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-scroll"></i>
            </div>
        </div>
        
        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Budaya</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_budaya; ?></h3>
            </div>
            <div class="w-9 h-9 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-landmark"></i>
            </div>
        </div>
        
        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tradisi</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_tradisi; ?></h3>
            </div>
            <div class="w-9 h-9 bg-purple-500/10 text-purple-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-masks-theater"></i>
            </div>
        </div>
        
        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Kuliner</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_kuliner; ?></h3>
            </div>
            <div class="w-9 h-9 bg-amber-500/10 text-amber-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-utensils"></i>
            </div>
        </div>
        
        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Destinasi</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_destinasi; ?></h3>
            </div>
            <div class="w-9 h-9 bg-emerald-500/10 text-emerald-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
        </div>

        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Teknologi</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_modern; ?></h3>
            </div>
            <div class="w-9 h-9 bg-rose-500/10 text-rose-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-microchip"></i>
            </div>
        </div>

        <div class="bg-slate-950/40 border border-slate-800 p-4 rounded-2xl flex items-center justify-between shadow-lg">
            <div>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Bahasa</span>
                <h3 class="text-xl font-black text-white mt-0.5"><?= $total_bahasa; ?></h3>
            </div>
            <div class="w-9 h-9 bg-teal-500/10 text-teal-400 rounded-lg flex items-center justify-center text-sm">
                <i class="fa-solid fa-language"></i>
            </div>
        </div>
    </section>

    <section class="bg-slate-950/40 border border-slate-800 rounded-2xl overflow-hidden shadow-xl flex flex-col max-h-[50vh]">

        <div class="p-6 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-950/20 shrink-0">
            <h3 class="text-lg font-bold text-white">
                Daftar Manajemen Warisan Budaya
            </h3>
            <div class="relative max-w-xs w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </span>
                <input
                    type="text"
                    placeholder="Cari data budaya..."
                    class="w-full bg-slate-900 border border-slate-800 pl-10 pr-4 py-2 rounded-xl text-sm focus:outline-none focus:border-cyan-500 text-slate-200"
                >
            </div>
        </div>

        <div class="overflow-y-auto overflow-x-hidden w-full focus-within:outline-none custom-scrollbar grow">
            
            <table class="w-full text-left border-collapse table-fixed">
                <thead class="bg-slate-900 sticky top-0 z-20 shadow-sm">
                    <tr class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
                        <th class="py-4 px-6 w-16 bg-slate-900">No</th>
                        <th class="py-4 px-6 w-1/4 bg-slate-900">Nama Data</th>
                        <th class="py-4 px-6 w-28 bg-slate-900">Kategori</th>
                        <th class="py-4 px-6 bg-slate-900">Deskripsi Ringkas</th>
                        <th class="py-4 px-6 text-center w-32 bg-slate-900">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800 text-sm text-slate-300 bg-slate-950/10">
                    <?php 
                    if (mysqli_num_rows($eksekusi_tabel) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($eksekusi_tabel)) {
                            $warna_badge = 'bg-slate-500/10 text-slate-400 border-slate-500/20';
                            if ($row['kategori'] == 'sejarah') $warna_badge = 'bg-cyan-500/10 text-cyan-400 border-cyan-500/20';
                            if ($row['kategori'] == 'budaya') $warna_badge = 'bg-blue-500/10 text-blue-400 border-blue-500/20';
                            if ($row['kategori'] == 'tradisi') $warna_badge = 'bg-purple-500/10 text-purple-400 border-purple-500/20';
                            if ($row['kategori'] == 'kuliner') $warna_badge = 'bg-amber-500/10 text-amber-400 border-amber-500/20';
                            if ($row['kategori'] == 'destinasi') $warna_badge = 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20';
                            if ($row['kategori'] == 'modern') $warna_badge = 'bg-rose-500/10 text-rose-400 border-rose-500/20';
                            if ($row['kategori'] == 'bahasa') $warna_badge = 'bg-teal-500/10 text-teal-400 border-teal-500/20';
                    ?>
                        <tr class="hover:bg-slate-900/40 transition">
                            <td class="py-4 px-6 font-medium text-slate-500"><?= $no++; ?></td>
                            <td class="py-4 px-6 font-bold text-white truncate"><?= $row['title_id']; ?></td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 text-[11px] font-semibold <?= $warna_badge; ?> border rounded-md capitalize"><?= $row['kategori']; ?></span>
                            </td>
                            <td class="py-4 px-6 text-slate-400">
                                <span class="block truncate"><?= $row['desc_id']; ?></span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="inline-flex gap-2">
                                    <a href="index.php?page=edit-card&id=<?= $row['id']; ?>" class="w-8 h-8 rounded-lg bg-amber-500/10 hover:bg-amber-500 text-amber-500 hover:text-slate-950 text-xs flex items-center justify-center transition">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="index.php?page=hapus-card&id=<?= $row['id']; ?>" onclick="return confirm('Apakah kau yakin ingin menghapus data ini beserta file publiknya, Lae?');" class="w-8 h-8 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white text-xs flex items-center justify-center transition">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php 
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500 font-medium">
                                Belum ada data warisan budaya yang diunggah, Lae.
                            </td>
                        </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #1e293b;
        border-radius: 999px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #334155;
    }
</style>