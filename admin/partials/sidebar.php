<?php 
$currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; 

$nama_admin = isset($_SESSION['admin_nama']) ? $_SESSION['admin_nama'] : 'Admin Batak';
$inisial = '';
$words = explode(' ', $nama_admin);
foreach ($words as $w) {
    $inisial .= strtoupper(substr($w, 0, 1));
}
$inisial = substr($inisial, 0, 2);
?>

<aside class="w-64 bg-slate-950 border-r border-slate-800 p-6 flex flex-col justify-between hidden md:flex min-h-screen sticky top-0">
    <div>
        <div class="flex items-center gap-3 mb-10 px-2">
            <div class="w-9 h-9 bg-cyan-500 rounded-xl flex items-center justify-center text-slate-950 font-black">
                B
            </div>
            <span class="text-lg font-black tracking-wider text-cyan-400">BUDAYABATAK</span>
        </div>

        <nav class="space-y-2">
            <a href="index.php?page=dashboard" class="flex items-center gap-4 px-4 py-3 rounded-xl font-bold transition <?= $currentPage == 'dashboard' ? 'bg-cyan-500/10 text-cyan-400' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' ?>">
                <i class="fa-solid fa-chart-pie w-5 text-center"></i> Dashboard
            </a>
            
            <a href="index.php?page=upload" class="flex items-center gap-4 px-4 py-3 rounded-xl font-bold transition <?= $currentPage == 'upload' ? 'bg-cyan-500/10 text-cyan-400' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' ?>">
                <i class="fa-solid fa-cloud-arrow-up w-5 text-center"></i> Upload
            </a>

            <a href="index.php?page=artikel" class="flex items-center gap-4 px-4 py-3 rounded-xl font-medium transition <?= $currentPage == 'artikel' ? 'bg-cyan-500/10 text-cyan-400' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' ?>">
                <i class="fa-solid fa-book-open w-5 text-center"></i> Kelola Artikel
            </a>
            <a href="index.php?page=pengaturan" class="flex items-center gap-4 px-4 py-3 rounded-xl font-medium transition <?= $currentPage == 'pengaturan' ? 'bg-cyan-500/10 text-cyan-400' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' ?>">
                <i class="fa-solid fa-gear w-5 text-center"></i> Pengaturan
            </a>
            
            <a href="logout.php" onclick="return confirm('Apakah kau yakin ingin keluar dari panel admin, Lae?');" class="flex items-center gap-4 px-4 py-3 rounded-xl font-medium text-red-400 hover:bg-red-500/10 transition">
                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> Keluar / Logout
            </a>
        </nav>
    </div>

    <div class="flex items-center gap-3 border-t border-slate-800 pt-6 px-2">
        <div class="w-10 h-10 bg-slate-800 rounded-full border border-slate-700 flex items-center justify-center font-bold text-cyan-400 uppercase">
            <?= $inisial; ?>
        </div>
        <div>
            <h4 class="text-sm font-bold text-white"><?= $nama_admin; ?></h4>
            <span class="text-xs text-slate-500">Super Admin</span>
        </div>
    </div>
</aside>