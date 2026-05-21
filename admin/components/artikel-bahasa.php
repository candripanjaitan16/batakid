<div class="max-h-[75vh] overflow-y-auto overflow-x-hidden pr-2 custom-scrollbar">
    <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">
                <a href="index.php?page=artikel" class="hover:text-teal-400">Kelola Artikel</a>
                <span>&bull;</span>
                <span class="text-slate-400">Pusat Translasi Bahasa</span>
            </div>
            <h1 class="text-3xl font-black tracking-tight text-white">Localization & Translation (ID ➔ EN)</h1>
            <p class="text-slate-400 text-sm mt-1">Daftar artikel lokal yang siap diterjemahkan ke Bahasa Inggris agar mendukung fitur Multi-Language Dashboard.</p>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
        <div class="bg-slate-950/30 border border-slate-800/80 p-4 rounded-2xl flex items-center gap-4">
            <div class="w-10 h-10 bg-amber-500/10 text-amber-400 rounded-xl flex items-center justify-center text-sm">
                <i class="fa-solid fa-language"></i>
            </div>
            <div>
                <div class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Butuh Translasi</div>
                <div class="text-xl font-black text-white">4 Artikel</div>
            </div>
        </div>
        <div class="bg-slate-950/30 border border-slate-800/80 p-4 rounded-2xl flex items-center gap-4">
            <div class="w-10 h-10 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center text-sm">
                <i class="fa-solid fa-globe"></i>
            </div>
            <div>
                <div class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Live di English Version (EN)</div>
                <div class="text-xl font-black text-white">2 Artikel</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-slate-950/40 border border-slate-800 rounded-3xl p-6 flex flex-col justify-between hover:border-slate-700 transition group">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-md">
                        <i class="fa-solid fa-clock mr-1"></i> ID Ready • Missing EN
                    </span>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Sejarah</span>
                </div>
                
                <h3 class="text-lg font-bold text-white mb-1 group-hover:text-teal-400 transition">Kerajaan & Raja Batak</h3>
                <p class="text-slate-500 text-[11px] font-mono mb-3">File Asal: sejarah-raja.php</p>
                <p class="text-slate-400 text-xs line-clamp-2">Silsilah dan kepemimpinan raja-raja tanah Batak kuno serta pengaruhnya di nusantara...</p>
            </div>
            
            <div class="mt-6 pt-4 border-t border-slate-800/60 flex items-center justify-between">
                <span class="text-[11px] text-slate-500"><i class="fa-solid fa-arrow-right-to-bracket mr-1"></i> Ready to Translate</span>
                <a href="index.php?page=translate-artikel&kategori=sejarah&file=sejarah-raja" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-teal-500 border border-slate-800 hover:border-teal-400 text-slate-400 hover:text-slate-950 font-bold px-4 py-2.5 rounded-xl transition text-xs shadow-lg shadow-teal-500/5">
                    <i class="fa-solid fa-language"></i> Terjemahkan ke EN
                </a>
            </div>
        </div>

        <div class="bg-slate-950/40 border border-slate-800 rounded-3xl p-6 flex flex-col justify-between hover:border-slate-700 transition group">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-md">
                        <i class="fa-solid fa-circle-check mr-1"></i> ID & EN Live
                    </span>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tradisi</span>
                </div>
                
                <h3 class="text-lg font-bold text-white mb-1 group-hover:text-teal-400 transition">Mangalahat Horbo</h3>
                <p class="text-slate-500 text-[11px] font-mono mb-3">File Asal: mangalahat-horbo.php</p>
                <p class="text-slate-400 text-xs line-clamp-2">Ritual sakral pengorbanan kerbau dalam adat Batak Toba kuno yang penuh makna mendalam...</p>
            </div>
            
            <div class="mt-6 pt-4 border-t border-slate-800/60 flex items-center justify-between">
                <span class="text-[11px] text-emerald-500/80 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-globe text-xs"></i> 2 Languages Active
                </span>
                <a href="index.php?page=translate-artikel&kategori=tradisi&file=mangalahat-horbo" class="inline-flex items-center gap-2 bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold px-4 py-2.5 rounded-xl transition text-xs shadow-lg">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Translasi (EN)
                </a>
            </div>
        </div>

    </div>
</div>