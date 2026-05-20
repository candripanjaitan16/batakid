<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ID';

$text = [
    "ID" => [
        "title1" => "Jelajahi Keindahan",
        "title2" => "Budaya Batak",
        "desc" => "Jelajahi budaya Batak yang kaya, wisata terbaik Sumatera Utara, kuliner khas, dan pengalaman menakjubkan di kawasan Danau Toba.",
        "button" => "Jelajahi Sekarang",
        "explore" => "Jelajahi Budaya Batak",
        "exploreDesc" => "Temukan sejarah, budaya, kuliner, dan destinasi menakjubkan khas Sumatera Utara.",
        "card1" => "Sejarah Kaya",
        "card2" => "Tradisi Autentik",
        "card3" => "Kuliner Khas",
        "card4" => "Destinasi Wisata",
        "cardDesc1" => "Temukan sejarah panjang dan perkembangan budaya Batak dari masa ke masa.",
        "cardDesc2" => "Pelajari adat istiadat dan nilai budaya masyarakat Batak.",
        "cardDesc3" => "Nikmati cita rasa khas Sumatera Utara yang unik dan autentik.",
        "cardDesc4" => "Jelajahi Danau Toba dan berbagai tempat wisata budaya."
    ],
    "EN" => [
        "title1" => "Explore The Beauty of",
        "title2" => "Batak Culture",
        "desc" => "Explore Batak culture, beautiful destinations, North Sumatra culinary experiences, and unforgettable moments around Lake Toba.",
        "button" => "Explore Now",
        "explore" => "Explore Batak Culture",
        "exploreDesc" => "Discover history, culture, culinary delights, and amazing destinations of North Sumatra.",
        "card1" => "Rich History",
        "card2" => "Authentic Tradition",
        "card3" => "Traditional Culinary",
        "card4" => "Tourist Destination",
        "cardDesc1" => "Discover the long history and development of Batak culture.",
        "cardDesc2" => "Learn customs and cultural values of Batak society.",
        "cardDesc3" => "Enjoy authentic North Sumatra culinary delights.",
        "cardDesc4" => "Explore Lake Toba and beautiful cultural destinations."
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budaya Batak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="assets/icon.png" type="image/x-icon">
    <style>
        html { scroll-behavior: smooth; }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInRight { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }
        .fadeNavbar { animation: fadeInDown .8s ease forwards; }
        .fadeText { animation: fadeInUp 1s ease forwards; }
        .fadeImage { animation: fadeInRight 1s ease forwards; }
        .typing::after { content: "|"; animation: blink .7s infinite; color: #67e8f9; }
        @keyframes blink { 50% { opacity: 0; } }
    </style>
</head>

<body class="bg-gradient-to-b from-cyan-950 via-blue-900 to-sky-700 overflow-x-hidden text-white">
    
    <?php include 'partials/navbar.php'; ?>

    <section class="min-h-[calc(100vh-112px)] relative overflow-hidden pt-5 flex items-center">
        <div class="absolute top-[-120px] left-[-120px] w-[350px] h-[350px] bg-cyan-400/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-120px] right-[-120px] w-[350px] h-[350px] bg-blue-500/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full">
            
            <div class="grid md:grid-cols-2 items-center gap-14 py-6">
                <div class="text-center md:text-left fadeText">
                    <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6 text-white">
                        <?= $text[$language]['title1']; ?>
                        <span class="block text-cyan-300"><?= $text[$language]['title2']; ?></span>
                    </h1>
                    <p id="typingText" class="typing text-lg text-gray-200 leading-relaxed max-w-xl mb-8 min-h-[90px] md:min-h-[120px]"></p>
                    <a href="sejarah.php" class="inline-flex items-center gap-3 bg-cyan-300 hover:bg-white text-cyan-950 px-8 py-4 rounded-full font-bold transition duration-300 hover:scale-105 shadow-2xl">
                        <?= $text[$language]['button']; ?> <span>→</span>
                    </a>
                </div>
                <div class="flex justify-center fadeImage relative">
                    <div class="absolute w-[300px] h-[300px] bg-cyan-400/20 rounded-full blur-3xl"></div>
                    <img src="assets/batak.png" alt="Budaya Batak" class="relative z-10 w-full max-w-lg object-contain drop-shadow-[0_20px_40px_rgba(0,0,0,0.5)] hover:scale-105 transition duration-500">
                </div>
            </div>

            <div class="py-20">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-black mb-5 text-white"><?= $text[$language]['explore']; ?></h2>
                    <p class="text-gray-300 max-w-2xl mx-auto text-lg"><?= $text[$language]['exploreDesc']; ?></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white/10 backdrop-blur-lg border border-cyan-300/20 rounded-3xl p-8 hover:-translate-y-3 transition duration-500 shadow-2xl hover:border-cyan-300">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-300/20 border border-cyan-300/30 flex items-center justify-center mb-6">
                            <div class="w-6 h-6 bg-cyan-300 rounded-md"></div>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-300 mb-4"><?= $text[$language]['card1']; ?></h3>
                        <p class="text-gray-200 leading-relaxed"><?= $text[$language]['cardDesc1']; ?></p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg border border-cyan-300/20 rounded-3xl p-8 hover:-translate-y-3 transition duration-500 shadow-2xl hover:border-cyan-300">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-300/20 border border-cyan-300/30 flex items-center justify-center mb-6">
                            <div class="w-6 h-6 bg-cyan-300 rounded-full"></div>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-300 mb-4"><?= $text[$language]['card2']; ?></h3>
                        <p class="text-gray-200 leading-relaxed"><?= $text[$language]['cardDesc2']; ?></p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg border border-cyan-300/20 rounded-3xl p-8 hover:-translate-y-3 transition duration-500 shadow-2xl hover:border-cyan-300">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-300/20 border border-cyan-300/30 flex items-center justify-center mb-6">
                            <div class="w-7 h-7 border-4 border-cyan-300 rounded-full"></div>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-300 mb-4"><?= $text[$language]['card3']; ?></h3>
                        <p class="text-gray-200 leading-relaxed"><?= $text[$language]['cardDesc3']; ?></p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg border border-cyan-300/20 rounded-3xl p-8 hover:-translate-y-3 transition duration-500 shadow-2xl hover:border-cyan-300">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-300/20 border border-cyan-300/30 flex items-center justify-center mb-6">
                            <div class="w-6 h-6 border-l-4 border-b-4 border-cyan-300 rotate-45"></div>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-300 mb-4"><?= $text[$language]['card4']; ?></h3>
                        <p class="text-gray-200 leading-relaxed"><?= $text[$language]['cardDesc4']; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        const text = `<?= $text[$language]['desc']; ?>`;
        const typingText = document.getElementById("typingText");
        let index = 0;

        function typeEffect() {
            if (index < text.length) {
                typingText.innerHTML += text.charAt(index);
                index++;
                setTimeout(typeEffect, 35);
            }
        }
        typeEffect();
    </script>
    <?php include 'partials/footer.php'; ?>
</body>
</html>