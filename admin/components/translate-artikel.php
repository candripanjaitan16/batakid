<?php
// Tangkap parameter dari URL untuk tahu artikel mana yang mau diterjemahkan
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'umum';
$file_nama = isset($_GET['file']) ? $_GET['file'] : '';

// Simulasi data teks asli berdasarkan file yang dipilih (Nanti bisa kamu hubungkan ke Database MySQL)
$judul_id = "Kerajaan & Raja Batak";
$konten_id = "Silsilah dan kepemimpinan raja-raja tanah Batak kuno serta pengaruh garis keturunan dinasti Sisingamangaraja dalam mempertahankan kemerdekaan tanah tano Batak dari masa ke masa.";

// Jika yang dipilih file lain, sesuaikan isinya secara dinamis
if ($file_nama == 'mangalahat-horbo') {
    $judul_id = "Mangalahat Horbo";
    $konten_id = "Ritual sakral pengorbanan kerbau dalam adat Batak Toba kuno yang menjadi lambang kesucian, persatuan klan, serta penghormatan luhur kepada Mulajadi Na Bolon.";
}
?>

<div class="max-h-[75vh] overflow-y-auto overflow-x-hidden pr-2 custom-scrollbar">
    
    <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">
                <a href="index.php?page=artikel" class="hover:text-teal-400">Kelola Artikel</a>
                <span>&bull;</span>
                <a href="index.php?page=artikel-bahasa" class="hover:text-teal-400">Pusat Translasi</a>
                <span>&bull;</span>
                <span class="text-slate-400">Proses Translasi</span>
            </div>
            <h1 class="text-3xl font-black tracking-tight text-white flex items-center gap-2">
                <i class="fa-solid fa-language text-teal-400"></i> Localization Editor
            </h1>
            <p class="text-slate-400 text-sm mt-1">Menerjemahkan berkas <span class="text-teal-400 font-mono text-xs bg-teal-500/5 px-1.5 py-0.5 rounded border border-teal-500/10"><?php echo $file_nama; ?>.php</span> dari Bahasa Indonesia ke Inggris.</p>
        </div>
    </header>

    <form action="process_translation.php" method="POST" class="space-y-6">
        
        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
        <input type="hidden" name="file_target" value="<?php echo $file_nama; ?>">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="bg-slate-950/40 border border-slate-800 rounded-3xl p-6 space-y-4 opacity-80">
                <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-wider">
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span> Sumber Asli (ID)
                </div>
                
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Judul Artikel (ID)</label>
                    <div class="w-full bg-slate-900 border border-slate-800/80 px-4 py-3 rounded-xl text-sm font-bold text-slate-300">
                        <?php echo $judul_id; ?>
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Isi Konten Utama (ID)</label>
                    <div class="w-full bg-slate-900 border border-slate-800/80 px-4 py-4 rounded-xl text-xs text-slate-400 leading-relaxed min-h-[180px]">
                        <?php echo $konten_id; ?>
                    </div>
                </div>
            </div>

            <div class="bg-slate-950/40 border border-teal-500/30 rounded-3xl p-6 space-y-4 shadow-xl shadow-teal-500/5">
                <div class="flex items-center gap-2 text-xs font-bold text-teal-400 uppercase tracking-wider">
                    <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span> Target Translasi (EN)
                </div>

                <div class="space-y-1">
                    <label for="title_en" class="text-[10px] font-bold text-teal-500 uppercase tracking-wide block pl-1">Judul Artikel (EN)</label>
                    <input 
                        type="text" 
                        id="title_en" 
                        name="title_en" 
                        placeholder="Type English title here..." 
                        required
                        class="w-full bg-slate-950 border border-slate-800 focus:border-teal-500 rounded-xl px-4 py-3 text-sm font-bold text-white placeholder-slate-700 focus:outline-none focus:ring-1 focus:ring-teal-500/20 transition"
                    >
                </div>

                <div class="space-y-1">
                    <label for="content_en" class="text-[10px] font-bold text-teal-500 uppercase tracking-wide block pl-1">Isi Konten Utama (EN)</label>
                    <textarea 
                        id="content_en" 
                        name="content_en" 
                        rows="7"
                        placeholder="Translate the paragraph into English text content..." 
                        required
                        class="w-full bg-slate-950 border border-slate-800 focus:border-teal-500 rounded-xl px-4 py-4 text-xs text-slate-200 placeholder-slate-700 focus:outline-none focus:ring-1 focus:ring-teal-500/20 transition leading-relaxed min-h-[180px]"
                    ></textarea>
                </div>
            </div>

        </div>

        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="index.php?page=artikel-bahasa" class="bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-400 font-bold text-xs px-5 py-3 rounded-xl transition">
                Batal
            </a>
            <button 
                type="submit" 
                class="bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold text-xs px-6 py-3 rounded-xl shadow-lg shadow-teal-500/10 active:scale-[0.98] transition flex items-center gap-2 cursor-pointer"
            >
                <i class="fa-solid fa-globe text-xs"></i>
                <span>Publish English Version</span>
            </button>
        </div>

    </form>
</div>