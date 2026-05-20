<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

$language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ID';

$navText = [
    "ID" => [
        "judul" => "Budaya",
        "span" => "Batak",
        "beranda" => "Beranda",
        "sejarah" => "Sejarah",
        "budaya" => "Budaya",
        "tradisi" => "Tradisi",
        "kuliner" => "Kuliner",
        "destinasi" => "Destinasi",
        "peta" => "Peta",
        "teknologi" => "Teknologi",
        "perkembangan" => "Perkembangan Teknologi",
        "potensi" => "Potensi Modern"
    ],
    "EN" => [
        "judul" => "Batak",
        "span" => "Culture",
        "beranda" => "Home",
        "sejarah" => "History",
        "budaya" => "Culture",
        "tradisi" => "Tradition",
        "kuliner" => "Culinary",
        "destinasi" => "Destination",
        "peta" => "Map",
        "teknologi" => "Technology",
        "perkembangan" => "Technology Development",
        "potensi" => "Modern Potential"
    ]
];
?>

<nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-500">
    <div id="navbarContainer" class="max-w-7xl mx-auto px-6 lg:px-8 py-5 transition-all duration-500">
        <div id="navbarBox" class="flex items-center justify-between rounded-2xl border border-white/5 bg-transparent transition-all duration-500 px-4 py-2">
            
            <div class="flex items-center gap-3">
                <img src="assets/logojabubolon.png" class="w-14 h-14 rounded-full border-2 border-cyan-300 object-cover shadow-lg">
                <h1 class="text-2xl font-black text-white">
                    <?= $navText[$language]['judul']; ?> <span class="text-cyan-300"><?= $navText[$language]['span']; ?></span>
                </h1>
            </div>

            <ul class="hidden lg:flex items-center gap-8 font-medium text-white">
                <li><a href="beranda.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['beranda']; ?></a></li>
                <li><a href="sejarah.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['sejarah']; ?></a></li>
                <li><a href="budaya.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['budaya']; ?></a></li>
                <li><a href="tradisi.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['tradisi']; ?></a></li>
                <li><a href="kuliner.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['kuliner']; ?></a></li>
                <li><a href="destinasi.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['destinasi']; ?></a></li>
                
                <li class="relative">
                    <button id="techBtn" class="hover:text-cyan-300 transition flex items-center gap-2 focus:outline-none">
                        <?= $navText[$language]['teknologi']; ?> <span id="techArrow" class="text-xs transition-transform duration-300">▼</span>
                    </button>
                    <div id="techDropdown" class="absolute top-8 left-0 w-56 bg-cyan-950/95 border border-cyan-300/20 rounded-2xl overflow-hidden opacity-0 invisible translate-y-2 transition-all duration-300 backdrop-blur-xl">
                        <a href="perkembangan.php" class="block px-5 py-4 hover:bg-cyan-300 hover:text-cyan-950 transition"><?= $navText[$language]['perkembangan']; ?></a>
                        <a href="potensi.php" class="block px-5 py-4 hover:bg-cyan-300 hover:text-cyan-950 transition"><?= $navText[$language]['potensi']; ?></a>
                    </div>
                </li>
                
                <li><a href="peta.php" class="hover:text-cyan-300 transition"><?= $navText[$language]['peta']; ?></a></li>
            </ul>

            <div class="hidden lg:flex items-center bg-white/10 rounded-full overflow-hidden border border-cyan-300">
                <a href="?lang=ID" class="px-4 py-1 text-sm font-bold transition <?= $language == 'ID' ? 'bg-cyan-300 text-cyan-950' : 'text-white'; ?>">ID</a>
                <a href="?lang=EN" class="px-4 py-1 text-sm font-bold transition <?= $language == 'EN' ? 'bg-cyan-300 text-cyan-950' : 'text-white'; ?>">EN</a>
            </div>

            <button id="openMenu" class="lg:hidden text-3xl text-white">☰</button>
        </div>
    </div>

    <div id="mobileMenu" class="fixed top-0 right-[-100%] w-[300px] h-screen bg-cyan-950/95 backdrop-blur-2xl z-50 p-8 transition-all duration-500">
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-2xl font-bold text-cyan-300">Menu</h2>
            <button id="closeMenu" class="text-3xl text-white">✕</button>
        </div>
        <div class="flex items-center bg-white/10 rounded-full overflow-hidden border border-cyan-300 mb-10 w-max">
            <a href="?lang=ID" class="px-4 py-1 text-sm font-bold transition <?= $language == 'ID' ? 'bg-cyan-300 text-cyan-950' : 'text-white'; ?>">ID</a>
            <a href="?lang=EN" class="px-4 py-1 text-sm font-bold transition <?= $language == 'EN' ? 'bg-cyan-300 text-cyan-950' : 'text-white'; ?>">EN</a>
        </div>
        <ul class="flex flex-col gap-7 text-lg font-medium text-white">
            <li><a href="beranda.php"><?= $navText[$language]['beranda']; ?></a></li>
            <li><a href="sejarah.php"><?= $navText[$language]['sejarah']; ?></a></li>
            <li><a href="budaya.php"><?= $navText[$language]['budaya']; ?></a></li>
            <li><a href="tradisi.php"><?= $navText[$language]['tradisi']; ?></a></li>
            <li><a href="kuliner.php"><?= $navText[$language]['kuliner']; ?></a></li>
            <li><a href="destinasi.php"><?= $navText[$language]['destinasi']; ?></a></li>
            <li><a href="perkembangan.php"><?= $navText[$language]['perkembangan']; ?></a></li>
            <li><a href="potensi.php"><?= $navText[$language]['potensi']; ?></a></li>
            <li><a href="peta.php"><?= $navText[$language]['peta']; ?></a></li>
        </ul>
    </div>
</nav>

<script>
const navbar = document.getElementById("navbar");
const navbarContainer = document.getElementById("navbarContainer");
const navbarBox = document.getElementById("navbarBox");

window.addEventListener("scroll", () => {
    if(window.scrollY > 80){
        navbarContainer.classList.add("py-3");
        navbarBox.classList.remove("border-white/5", "px-4", "py-2");
        navbarBox.classList.add("bg-cyan-950/80", "backdrop-blur-2xl", "border-cyan-300/30", "shadow-2xl", "px-6", "py-4");
    } else {
        navbarContainer.classList.remove("py-3");
        navbarBox.classList.remove("bg-cyan-950/80", "backdrop-blur-2xl", "border-cyan-300/30", "shadow-2xl", "px-6", "py-4");
        navbarBox.classList.add("border-white/5", "px-4", "py-2");
    }
});

const techBtn = document.getElementById("techBtn");
const techDropdown = document.getElementById("techDropdown");
const techArrow = document.getElementById("techArrow");

techBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    const isOpen = !techDropdown.classList.contains("invisible");
    if (isOpen) {
        techDropdown.classList.add("opacity-0", "invisible", "translate-y-2");
        techArrow.classList.remove("rotate-180");
    } else {
        techDropdown.classList.remove("opacity-0", "invisible", "translate-y-2");
        techArrow.classList.add("rotate-180");
    }
});

// FIX: Memperbaiki .add() menjadi .classList.add() agar auto-close berjalan normal tanpa error
document.addEventListener("click", (e) => {
    if (!techDropdown.contains(e.target) && e.target !== techBtn) {
        techDropdown.classList.add("opacity-0", "invisible", "translate-y-2");
        techArrow.classList.remove("rotate-180");
    }
});

const mobileMenu = document.getElementById("mobileMenu");
const openMenu = document.getElementById("openMenu");
const closeMenu = document.getElementById("closeMenu");

openMenu.addEventListener("click", () => { mobileMenu.style.right = "0"; });
closeMenu.addEventListener("click", () => { mobileMenu.style.right = "-100%"; });
</script>