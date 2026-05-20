<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ID';

$footText = [
    "ID" => [
        "desc" => "Platform pelestarian dan edukasi digital kebudayaan Batak Toba serta potensi modern di Sumatera Utara.",
        "jelajahi" => "Jelajahi",
        "tautan" => "Tautan Cepat",
        "hakCipta" => "© " . date('Y') . " Budaya Batak. Dibuat dengan sepenuh hati.",
        "beranda" => "Beranda",
        "sejarah" => "Sejarah",
        "budaya" => "Budaya",
        "tradisi" => "Tradisi",
        "kuliner" => "Kuliner",
        "destinasi" => "Destinasi",
        "peta" => "Peta",
        "perkembangan" => "Perkembangan",
        "potensi" => "Potensi Modern"
    ],
    "EN" => [
        "desc" => "A digital preservation and education platform for Batak Toba culture and its modern potential in North Sumatra.",
        "jelajahi" => "Explore",
        "tautan" => "Quick Links",
        "hakCipta" => "© " . date('Y') . " Batak Culture. Crafted with love.",
        "beranda" => "Home",
        "sejarah" => "History",
        "budaya" => "Culture",
        "tradisi" => "Tradition",
        "kuliner" => "Culinary",
        "destinasi" => "Destination",
        "peta" => "Map",
        "perkembangan" => "Development",
        "potensi" => "Modern Potential"
    ]
];
?>

<footer class="bg-cyan-950 border-t border-cyan-300/10 text-white pt-16 pb-8 relative overflow-hidden">
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-[150px] bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-5">
                    <img src="assets/logojabubolon.png" class="w-12 h-12 rounded-full border border-cyan-300 object-cover">
                    <h2 class="text-xl font-black tracking-wide">
                        Budaya <span class="text-cyan-300">Batak</span>
                    </h2>
                </div>
                <p class="text-gray-400 leading-relaxed max-w-sm">
                    <?= $footText[$language]['desc']; ?>
                </p>
                <a href="https://candri.my.id" target="_blank">Pencipta</a>
            </div>

            <div>
                <h3 class="text-cyan-300 font-bold text-lg mb-4"><?= $footText[$language]['jelajahi']; ?></h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="beranda.php" class="hover:text-white transition"><?= $footText[$language]['beranda']; ?></a></li>
                    <li><a href="sejarah.php" class="hover:text-white transition"><?= $footText[$language]['sejarah']; ?></a></li>
                    <li><a href="budaya.php" class="hover:text-white transition"><?= $footText[$language]['budaya']; ?></a></li>
                    <li><a href="tradisi.php" class="hover:text-white transition"><?= $footText[$language]['tradisi']; ?></a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-cyan-300 font-bold text-lg mb-4"><?= $footText[$language]['tautan']; ?></h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="kuliner.php" class="hover:text-white transition"><?= $footText[$language]['kuliner']; ?></a></li>
                    <li><a href="destinasi.php" class="hover:text-white transition"><?= $footText[$language]['destinasi']; ?></a></li>
                    <li><a href="perkembangan.php" class="hover:text-white transition"><?= $footText[$language]['perkembangan']; ?></a></li>
                    <li><a href="potensi.php" class="hover:text-white transition"><?= $footText[$language]['potensi']; ?></a></li>
                </ul>
            </div>

        </div>

        <div class="border-t border-white/5 pt-8 text-center text-gray-500 text-sm flex flex-col sm:flex-row justify-between items-center gap-4">
            <p><?= $footText[$language]['hakCipta']; ?></p>
            <div class="flex gap-4 text-xs text-gray-400">
                <a href="#" class="hover:text-cyan-300 transition">Privacy Policy</a>
                <span>•</span>
                <a href="#" class="hover:text-cyan-300 transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>