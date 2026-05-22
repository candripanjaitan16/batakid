<?php
// Ambil kategori dari URL secara aman
$kat = isset($_GET['kategori']) ? preg_replace("/[^a-zA-Z0-9_-]/", "", $_GET['kategori']) : 'sejarah';
?>

<header class="mb-10">
    <div class="flex items-center gap-2 text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">
        <a href="index.php?page=upload" class="hover:text-cyan-400">Upload Kategori</a>
        <span>&bull;</span>
        <a href="index.php?page=modif&kategori=<?= $kat; ?>" class="hover:text-cyan-400 capitalize">Kelola <?= $kat; ?></a>
        <span>&bull;</span>
        <span class="text-slate-400">Tambah Card</span>
    </div>
    <h1 class="text-3xl font-black tracking-tight text-white capitalize">Tambah Card <?= $kat; ?></h1>
    <p class="text-slate-400 text-sm mt-1">Formulir pembuatan konten baru dan otomatisasi berkas halaman publik.</p>
</header>

<div class="bg-slate-900/40 border border-slate-800/80 rounded-3xl p-6 md:p-8 max-w-4xl shadow-xl backdrop-blur-sm">
    <form action="index.php?page=proses-tambah" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <input type="hidden" name="kategori" value="<?= $kat; ?>">

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Nama File PHP Halaman Publik</label>
            <div class="flex items-center bg-slate-950 border border-slate-800 rounded-xl overflow-hidden focus-within:border-cyan-500 transition">
                <span class="pl-4 pr-1 text-slate-500 text-sm select-none">public/<?= $kat; ?>/</span>
                <input type="text" name="nama_file" required placeholder="contoh-nama-file" class="w-full bg-transparent py-3 pr-4 text-sm text-slate-200 focus:outline-none font-mono">
                <span class="pr-4 pl-1 text-slate-500 text-sm select-none">.php</span>
            </div>
            <p class="text-slate-500 text-xs mt-1.5">*Gunakan huruf kecil dan tanda hubung (-), jangan pakai spasi.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Judul Card (Bahasa Indonesia)</label>
                <input type="text" name="title_id" required placeholder="Masukkan judul..." class="w-full bg-slate-950 border border-slate-800 px-4 py-3 rounded-xl text-sm text-slate-200 focus:outline-none focus:border-cyan-500 transition">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Judul Card (Bahasa Inggris)</label>
                <input type="text" name="title_en" required placeholder="Enter title..." class="w-full bg-slate-950 border border-slate-800 px-4 py-3 rounded-xl text-sm text-slate-200 focus:outline-none focus:border-cyan-500 transition italic">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Upload File Gambar Pendukung</label>
            <div class="border-2 border-dashed border-slate-800 hover:border-cyan-500/50 bg-slate-950/50 rounded-2xl p-6 text-center cursor-pointer transition relative group min-h-[160px] flex items-center justify-center">
                <input type="file" name="gambar_file" id="gambar_file" required accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="previewImage(this)">
                
                <div id="placeholder_upload" class="space-y-2 relative z-0">
                    <div class="text-2xl text-slate-500 group-hover:text-cyan-400 transition">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <p class="text-sm text-slate-300 font-medium">Klik atau drop file gambar di sini</p>
                    <p class="text-xs text-slate-500">Mendukung format PNG, JPG, atau JPEG</p>
                </div>

                <img id="logo_preview" class="hidden max-h-40 rounded-xl object-contain relative z-0 border border-slate-800 shadow-lg">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Deskripsi Ringkas (Bahasa Indonesia)</label>
                <textarea name="desc_id" required rows="4" placeholder="Tulis deskripsi keunikan budaya..." class="w-full bg-slate-950 border border-slate-800 p-4 rounded-xl text-sm text-slate-200 focus:outline-none focus:border-cyan-500 transition leading-relaxed"></textarea>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Deskripsi Ringkas (Bahasa Inggris)</label>
                <textarea name="desc_en" required rows="4" placeholder="Write description in english..." class="w-full bg-slate-950 border border-slate-800 p-4 rounded-xl text-sm text-slate-200 focus:outline-none focus:border-cyan-500 transition leading-relaxed italic"></textarea>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-800">
            <a href="index.php?page=modif&kategori=<?= $kat; ?>" class="px-5 py-3 rounded-xl border border-slate-800 hover:bg-slate-950 font-bold text-sm text-slate-400 hover:text-slate-200 transition">Batal</a>
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-black px-6 py-3 rounded-xl transition shadow-lg shadow-cyan-500/20 text-sm">
                Simpan & Buat File Halaman
            </button>
        </div>

    </form>
</div>

<script>
function previewImage(input) {
    const placeholder = document.getElementById('placeholder_upload');
    const preview = document.getElementById('logo_preview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
        preview.classList.add('hidden');
        placeholder.classList.remove('hidden');
    }
}
</script>