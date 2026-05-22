<?php
// Tangkap detail file dan kategori yang sedang diisi
$kat  = isset($_GET['kategori']) ? preg_replace("/[^a-zA-Z0-9_-]/", "", $_GET['kategori']) : 'sejarah';
$file = isset($_GET['file']) ? preg_replace("/[^a-zA-Z0-9_-]/", "", $_GET['file']) : 'default';
?>

<header class="mb-6">
    <div class="flex items-center gap-2 text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">
        <a href="index.php?page=artikel" class="hover:text-cyan-400">Kelola Artikel</a>
        <span>&bull;</span>
        <a href="index.php?page=artikel-<?= $kat; ?>" class="hover:text-cyan-400 capitalize">Daftar <?= $kat; ?></a>
        <span>&bull;</span>
        <span class="text-slate-400">Bilingual Block Editor</span>
    </div>
    <h1 class="text-2xl font-black text-white">Menulis Artikel Bilingual: <span class="text-cyan-400 font-mono text-xl"><?= $file; ?>.php</span></h1>
    <p class="text-slate-500 text-xs mt-1">Klik kanan di area kanvas. Setiap blok yang kau tambah akan otomatis memiliki baris terjemahan Bahasa Inggris di bawahnya.</p>
</header>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2 px-8 text-xs font-bold uppercase tracking-wider text-slate-500 select-none">
    <div><i class="fa-solid fa-flag text-amber-500 mr-1"></i> Versi Bahasa Indonesia (ID)</div>
    <div class="hidden md:block"><i class="fa-solid fa-flag text-sky-500 mr-1"></i> Versi Bahasa Inggris (EN)</div>
</div>

<div class="relative bg-slate-950 border-2 border-slate-800 rounded-3xl shadow-2xl h-[500px] overflow-y-auto focus-within:border-cyan-500/50 transition-all duration-200" id="editor-container">
    
    <div class="p-8 min-h-full w-full focus:outline-none space-y-6" id="editor-canvas">
        <div id="editor-placeholder" class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none text-slate-600 text-sm italic space-y-2">
            <div class="text-3xl"><i class="fa-solid fa-language"></i></div>
            <div>Klik kanan di sini untuk mendesain artikel dua bahasa...</div>
        </div>
    </div>

</div>

<div class="flex justify-end gap-3 mt-4">
    <a href="index.php?page=artikel-<?= $kat; ?>" class="px-5 py-3 rounded-xl border border-slate-800 hover:bg-slate-900 font-bold text-sm text-slate-400 hover:text-slate-200 transition">Batal</a>
    <button type="button" id="btn-save-artikel" class="bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-black px-6 py-3 rounded-xl transition shadow-lg shadow-cyan-500/20 text-sm">
        <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan Artikel Bilingual
    </button>
</div>

<input type="file" id="hidden-image-input" accept="image/*" class="hidden">

<div id="custom-context-menu" class="hidden absolute bg-slate-950 border border-slate-800 rounded-xl shadow-2xl py-2 w-48 z-50 font-sans text-sm select-none">
    <div class="relative group">
        <button class="w-full text-left px-4 py-2 text-slate-300 hover:bg-slate-900 hover:text-cyan-400 font-medium flex justify-between items-center">
            <span><i class="fa-solid fa-heading mr-2 text-slate-500"></i> Heading</span>
            <i class="fa-solid fa-chevron-right text-xs text-slate-600"></i>
        </button>
        <div class="absolute left-full top-0 hidden group-hover:block bg-slate-950 border border-slate-800 rounded-xl shadow-2xl py-1 w-20 ml-1">
            <button onclick="addBilingualBlock('h1')" class="w-full text-center py-1.5 text-slate-300 hover:bg-slate-900 hover:text-cyan-400 font-bold">H1</button>
            <button onclick="addBilingualBlock('h2')" class="w-full text-center py-1.5 text-slate-300 hover:bg-slate-900 hover:text-cyan-400 font-bold">H2</button>
            <button onclick="addBilingualBlock('h3')" class="w-full text-center py-1.5 text-slate-300 hover:bg-slate-900 hover:text-cyan-400 font-bold">H3</button>
        </div>
    </div>
    
    <button onclick="addBilingualBlock('p')" class="w-full text-left px-4 py-2 text-slate-300 hover:bg-slate-900 hover:text-cyan-400 font-medium">
        <i class="fa-solid fa-align-left mr-2 text-slate-500"></i> Teks Paragraf
    </button>
    
    <hr class="border-slate-800 my-1">
    
    <button onclick="triggerImageUpload()" class="w-full text-left px-4 py-2 text-slate-300 hover:bg-slate-900 hover:text-cyan-400 font-medium">
        <i class="fa-solid fa-image mr-2 text-slate-500"></i> Gambar Pendukung
    </button>
</div>

<script>
const container = document.getElementById('editor-container');
const canvas = document.getElementById('editor-canvas');
const contextMenu = document.getElementById('custom-context-menu');
const placeholder = document.getElementById('editor-placeholder');
const imageInput = document.getElementById('hidden-image-input');

// Pemicu Klik Kanan Kustom di dalam area editor
container.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    contextMenu.style.left = `${e.pageX}px`;
    contextMenu.style.top = `${e.pageY}px`;
    contextMenu.classList.remove('hidden');
});

document.addEventListener('click', function(e) {
    if (!contextMenu.contains(e.target)) {
        contextMenu.classList.add('hidden');
    }
});

// FUNGSI UTAMA UNTUK MENAMBAH BLOK BILINGUAL SECARA SEJAJAR
function addBilingualBlock(type) {
    if (placeholder) placeholder.remove();
    contextMenu.classList.add('hidden');

    // Buat row pembungkus grid (Kiri ID, Kanan EN)
    const rowWrapper = document.createElement('div');
    rowWrapper.className = 'grid grid-cols-1 md:grid-cols-2 gap-6 p-4 border border-dashed border-slate-900 hover:border-slate-800 rounded-2xl transition group/row relative';
    rowWrapper.setAttribute('data-block-type', type);

    // Siapkan element input ID (Indonesia)
    const elID = document.createElement(type === 'p' ? 'p' : type);
    elID.setAttribute('contenteditable', 'true');
    elID.className = 'focus:outline-none w-full data-lang="id" ';

    // Siapkan element input EN (Inggris)
    const elEN = document.createElement(type === 'p' ? 'p' : type);
    elEN.setAttribute('contenteditable', 'true');
    elEN.className = 'focus:outline-none w-full italic text-slate-400 border-t md:border-t-0 pt-4 md:pt-0 border-slate-800 data-lang="en" ';

    // Styling CSS dinamis Tailwind berdasarkan tipe heading/paragraf
    if (type === 'h1') {
        const style = 'text-3xl font-black text-white tracking-tight';
        elID.className += style; elEN.className += style + ' !text-cyan-400/70';
    } else if (type === 'h2') {
        const style = 'text-2xl font-extrabold text-white';
        elID.className += style; elEN.className += style + ' !text-cyan-400/70';
    } else if (type === 'h3') {
        const style = 'text-xl font-bold text-slate-200';
        elID.className += style; elEN.className += style + ' !text-cyan-400/70';
    } else if (type === 'p') {
        const style = 'text-sm text-slate-300 leading-relaxed font-normal';
        elID.className += style; elEN.className += style + ' !text-slate-400/70';
    }

    // Set teks default penanda input
    elID.innerText = `Ketik ${type.toUpperCase()} (Bahasa Indonesia) di sini...`;
    elEN.innerText = `Type ${type.toUpperCase()} (English Translation) here...`;

    // Event pembersih teks placeholder saat elemen di-klik fokus
    elID.addEventListener('focus', function() { if(this.innerText.includes('Ketik')) this.innerText = ''; });
    elEN.addEventListener('focus', function() { if(this.innerText.includes('Type')) this.innerText = ''; });

    // Satukan ke dalam baris grid
    rowWrapper.appendChild(elID);
    rowWrapper.appendChild(elEN);
    
    // Suntikkan ke dalam kanvas kerja
    canvas.appendChild(rowWrapper);
    elID.focus();
    
    // Gulirkan otomatis scroll ke bagian paling bawah
    container.scrollTo({ top: container.scrollHeight, behavior: 'smooth' });
}

function triggerImageUpload() {
    contextMenu.classList.add('hidden');
    imageInput.click();
}

// Handler manajemen upload gambar lokal + resize
imageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        if (placeholder) placeholder.remove();
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const imgWrapper = document.createElement('div');
            imgWrapper.className = 'relative inline-block my-2 group/img cursor-pointer max-w-full border border-transparent hover:border-cyan-500 rounded-xl overflow-hidden';
            imgWrapper.setAttribute('data-block-type', 'image');
            imgWrapper.style.width = '100%';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-auto object-contain max-h-[350px] rounded-xl';
            
            imgWrapper.appendChild(img);
            canvas.appendChild(imgWrapper);
            
            container.scrollTo({ top: container.scrollHeight, behavior: 'smooth' });
        }
        reader.readAsDataURL(file);
    }
});

// LOGIKA AJAX FETCH UNTUK KIRIM HASIL STRUKTUR DUA BAHASA KE BACKEND
document.getElementById('btn-save-artikel').addEventListener('click', function() {
    const rows = canvas.querySelectorAll('[data-block-type]');
    if(rows.length === 0) {
        alert('Kanvas artikel bilingual kau masih kosong, Lae!');
        return;
    }

    let htmlID = '';
    let htmlEN = '';

    // Ekstrak baris demi baris, pisahkan versi Indonesia dan versi Inggris
    rows.forEach(row => {
        const type = row.getAttribute('data-block-type');
        
        if(type === 'image') {
            const imgTag = row.querySelector('img').outerHTML;
            htmlID += `<div class="my-6 text-center">${imgTag}</div>\n`;
            htmlEN += `<div class="my-6 text-center">${imgTag}</div>\n`;
        } else {
            const textID = row.querySelector('[data-lang="id"]').innerText;
            const textEN = row.querySelector('[data-lang="en"]').innerText;
            
            // Bungkus kembali ke tag HTML aslinya
            htmlID += `<${type}>${textID}</${type}>\n`;
            htmlEN += `<${type} class="italic text-slate-400">${textEN}</${type}>\n`;
        }
    });

    const urlParams = new URLSearchParams(window.location.search);
    const kategori = urlParams.get('kategori') || 'sejarah';
    const filename = urlParams.get('file') || 'default';

    // Lempar data matang ke backend proses-save-artikel.php via AJAX
    fetch('components/proses-save-artikel.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `kategori=${encodeURIComponent(kategori)}&filename=${encodeURIComponent(filename)}&html_id=${encodeURIComponent(htmlID)}&html_en=${encodeURIComponent(htmlEN)}`
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success') {
            alert('Luar biasa, Lae! Artikel bilingual & berkas halaman publik sukses diterbitkan!');
            window.location.href = `index.php?page=artikel-${kategori}`;
        } else {
            alert('Gagal: ' + data.message);
        }
    })
    .catch(() => alert('Terjadi kesalahan jaringan pada sistem server!'));
});
</script>