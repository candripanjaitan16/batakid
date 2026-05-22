<?php
// 1. Hubungkan ke database batak_id kau
include '/opt/lampp/htdocs/batakid/database/config.php';

// Kunci kategori ke 'sejarah' sesuai query publik
$kategori_sekarang = 'sejarah'; 
?>

<header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
    <div>
        <div class="flex items-center gap-2 text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">
            <a href="index.php?page=modif&kategori=<?= $kategori_sekarang; ?>" class="hover:text-cyan-400">Kelola Artikel</a>
            <span>&bull;</span>
            <span class="text-slate-400">Artikel Sejarah</span>
        </div>
        <h1 class="text-3xl font-black tracking-tight text-white">Daftar Card Sejarah Batak</h1>
        <p class="text-slate-400 text-sm mt-1">Pilih salah satu card sejarah di bawah ini untuk mengisi atau memperbarui artikel lengkapnya.</p>
    </div>
</header>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <?php
    // 2. DISINI KUNCINYA: Mengambil data dari tabel asli 'konten_budaya' sesuai file sejarah.php kau!
    $query = "SELECT * FROM konten_budaya WHERE kategori = '$kategori_sekarang' ORDER BY id DESC";
    $ambil_data = mysqli_query($koneksi, $query);

    if ($ambil_data && mysqli_num_rows($ambil_data) > 0) {
        while ($row = mysqli_fetch_assoc($ambil_data)) {
            
            // Mengambil nama file/slug sesuai dengan kolom asli di database kau: 'nama_file'
            $slug_file = (!empty($row['nama_file'])) ? $row['nama_file'] : 'asal-usul-batak';
            
            // Cek apakah konten isi artikel panjangnya (konten_id) sudah diisi atau masih kosong
            // Catatan: Jika di tabel 'konten_budaya' nama kolomnya berbeda, sistem tetap aman tidak akan crash
            $status_siap = isset($row['konten_id']) && !empty($row['konten_id']); 
    ?>
            <div class="bg-slate-950/40 border border-slate-800 rounded-3xl p-6 flex flex-col justify-between hover:border-slate-700 transition">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <?php if($status_siap): ?>
                            <span class="px-2.5 py-1 text-[10px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-md">
                                <i class="fa-solid fa-circle-check mr-1"></i> Artikel Siap
                            </span>
                        <?php else: ?>
                            <span class="px-2.5 py-1 text-[10px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-md">
                                <i class="fa-solid fa-pen-ruler mr-1"></i> Belum Diisi
                            </span>
                        <?php endif; ?>
                        <span class="text-[10px] font-mono text-slate-600">public/sejarah/<?= $slug_file; ?>.php</span>
                    </div>
                    
                    <?php if(!empty($row['gambar'])): ?>
                        <div class="w-full h-36 overflow-hidden rounded-2xl mb-4 border border-slate-800/60 bg-slate-900">
                            <img src="../assets/uploads/<?= $row['gambar']; ?>" alt="Preview" class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                    
                    <h3 class="text-xl font-bold text-white mb-2"><?= $row['title_id']; ?></h3>
                    
                    <p class="text-slate-400 text-xs line-clamp-2"><?= $row['desc_id']; ?></p>
                </div>
                
                <div class="mt-6 pt-4 border-t border-slate-800/60 flex justify-end">
                    <a href="index.php?page=tulis-artikel&kategori=<?= $kategori_sekarang; ?>&file=<?= $slug_file; ?>" class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold px-4 py-2.5 rounded-xl transition text-xs shadow-lg shadow-cyan-500/10">
                        <i class="fa-solid fa-pen-to-square"></i> Tulis / Edit Artikel
                    </a>
                </div>
            </div>
    <?php
        }
    } else {
        // Tampilan cadangan aman jika data di tabel 'konten_budaya' belum masuk atau kosong
        echo "<div class='col-span-full border border-dashed border-slate-800 rounded-3xl p-12 text-center text-slate-500 text-xs'>
                <div class='text-3xl mb-2 text-slate-600'><i class='fa-solid fa-folder-open'></i></div>
                Belum ada data card sejarah yang terdeteksi di tabel 'konten_budaya', Lae.
              </div>";
    }
    ?>

</div>