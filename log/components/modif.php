<?php
// Mencegah error jika variabel $koneksi tidak ditemukan akibat eksekusi dinamis
if (!isset($koneksi)) {
    include '/opt/lampp/htdocs/batakid/database/config.php';
}

$kat = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : 'sejarah';
$judul_halaman = "Kelola Konten " . ucfirst($kat);

$query = "SELECT * FROM konten_budaya WHERE kategori = '$kat' ORDER BY id DESC";
$eksekusi = mysqli_query($koneksi, $query);
?>

<header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
    <div>
        <div class="flex items-center gap-2 text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">
            <a href="index.php?page=upload" class="hover:text-cyan-400">Upload Kategori</a>
            <span>&bull;</span>
            <span class="text-slate-400"><?= $judul_halaman; ?></span>
        </div>
        <h1 class="text-3xl font-black tracking-tight text-white capitalize"><?= $judul_halaman; ?></h1>
    </div>
    <div>
        <a href="index.php?page=tambah&kategori=<?= $kat; ?>" class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold px-5 py-3 rounded-xl transition shadow-lg shadow-cyan-500/20 text-sm">
            <i class="fa-solid fa-plus"></i> Tambah Card <?= ucfirst($kat); ?>
        </a>
    </div>
</header>

<section class="bg-slate-950/40 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <div class="p-6 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h3 class="text-lg font-bold text-white">Daftar Card Aktif (Kategori: <span class="text-cyan-400 capitalize"><?= $kat; ?></span>)</h3>
        <div class="relative max-w-xs w-full">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </span>
            <input type="text" placeholder="Cari card..." class="w-full bg-slate-900 border border-slate-800 pl-10 pr-4 py-2 rounded-xl text-sm focus:outline-none focus:border-cyan-500 text-slate-200">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-950 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <th class="py-4 px-6 w-16">No</th>
                    <th class="py-4 px-6 w-32">Gambar</th>
                    <th class="py-4 px-6">Judul Card (ID/EN)</th>
                    <th class="py-4 px-6">Deskripsi Card (ID/EN)</th>
                    <th class="py-4 px-6 text-center w-36">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 text-sm text-slate-300">
                
                <?php 
                if (mysqli_num_rows($eksekusi) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($eksekusi)) {
                ?>
                    <tr class="hover:bg-slate-900/40 transition">
                        <td class="py-4 px-6 font-medium text-slate-500"><?= $no++; ?></td>
                        <td class="py-4 px-6">
                            <img src="../assets/uploads/<?= $row['gambar']; ?>" class="w-16 h-10 object-cover rounded-lg border border-slate-800 shadow-md">
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-white"><?= $row['title_id']; ?></div>
                            <div class="text-xs text-slate-500 italic"><?= $row['title_en']; ?></div>
                        </td>
                        <td class="py-4 px-6 max-w-xs">
                            <div class="truncate text-slate-300"><?= $row['desc_id']; ?></div>
                            <div class="truncate text-xs text-slate-500 italic mt-0.5"><?= $row['desc_en']; ?></div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="inline-flex gap-2">
                                <a href="index.php?page=edit-card&id=<?= $row['id']; ?>" class="w-8 h-8 rounded-lg bg-amber-500/10 hover:bg-amber-500 text-amber-500 hover:text-slate-950 text-xs flex items-center justify-center transition">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="index.php?page=hapus-card&id=<?= $row['id']; ?>" onclick="return confirm('Apakah kau yakin ingin menghapus card ini dan file halamannya, Lae?');" class="w-8 h-8 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white text-xs flex items-center justify-center transition">
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
                            <div class="text-2xl mb-2 text-slate-600"><i class="fa-solid fa-folder-open"></i></div>
                            Belum ada data card aktif untuk kategori ini, Lae.
                        </td>
                    </tr>
                <?php 
                } 
                ?>

            </tbody>
        </table>
    </div>
</section>