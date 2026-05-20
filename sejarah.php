<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ID';

$text = [
    "ID" => [
        "title" => "Sejarah Budaya Batak",
        "sectionTitle" => "Asal Usul Suku Batak",
        "sectionDesc" => "Suku Batak merupakan salah satu suku terbesar di Sumatera Utara yang memiliki sejarah panjang, budaya unik, dan adat istiadat yang masih dijaga hingga sekarang. Kawasan utama masyarakat Batak berada di sekitar Danau Toba.",
        "sectionBtn" => "Sejarah Batak",
        "adminSectionTitle" => "Artikel Sejarah Terkini",
        "forumTitle" => "Pojok Literasi Komunitas",
        "forumDesc" => "Ingin ikut berkontribusi menulis sejarah, silsilah marga, atau cerita daerah? Tulis cerita kamu atau lihat kontribusi pembaca lain di forum khusus kami.",
        "forumBtn" => "Buka Forum Sejarah"
    ],
    "EN" => [
        "title" => "History of Batak Culture",
        "sectionTitle" => "Origin of the Batak Tribe",
        "sectionDesc" => "The Batak tribe is one of the largest ethnic groups in North Sumatra with a long history, unique culture, and traditions that are still preserved today. The main area of Batak society is around Lake Toba.",
        "sectionBtn" => "Batak History",
        "adminSectionTitle" => "Latest History Articles",
        "forumTitle" => "Community Literacy Corner",
        "forumDesc" => "Want to contribute to writing history, clan lineages, or local stories? Write your story or view other readers' contributions in our dedicated forum.",
        "forumBtn" => "Open History Forum"
    ]
];

$cards_dari_database = [
    [
        "icon_shape" => "square",
        "title_id"   => "Kerajaan Batak",
        "title_en"   => "Batak Kingdom",
        "desc_id"    => "Masyarakat Batak dahulu hidup dalam sistem kerajaan dan marga yang kuat.",
        "desc_en"    => "Batak people once lived in a strong kingdom and clan system."
    ],
    [
        "icon_shape" => "circle",
        "title_id"   => "Danau Toba",
        "title_en"   => "Lake Toba",
        "desc_id"    => "Danau Toba menjadi pusat perkembangan budaya Batak sejak zaman dahulu.",
        "desc_en"    => "Lake Toba became the center of Batak cultural development since ancient times."
    ],
    [
        "icon_shape" => "triangle",
        "title_id"   => "Perkembangan Budaya",
        "title_en"   => "Cultural Development",
        "desc_id"    => "Budaya Batak terus berkembang mengikuti zaman tanpa meninggalkan identitas asli.",
        "desc_en"    => "Batak culture continues to evolve while maintaining its original identity."
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Budaya Batak</title>
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
    </style>
</head>

<body class="bg-gradient-to-b from-cyan-950 via-blue-900 to-sky-700 overflow-x-hidden text-white">
    
    <?php include 'partials/navbar.php'; ?>

    <section class="min-h-[calc(100vh-112px)] relative overflow-hidden pt-32 md:pt-40 flex items-center">
        <div class="absolute top-[-120px] left-[-120px] w-[350px] h-[350px] bg-cyan-400/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-120px] right-[-120px] w-[350px] h-[350px] bg-blue-500/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 w-full">
            
            <div class="text-center mb-16 md:mb-24 fadeText">
                <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6 text-white">
                    <?= $text[$language]['title']; ?>
                </h1>
            </div>

            <div class="grid md:grid-cols-2 items-center gap-14 py-6 mb-24 md:mb-32">
                <div class="text-center md:text-left fadeText order-2 md:order-1">
                    <h2 class="text-4xl md:text-5xl font-black leading-tight mb-6 text-white">
                        <?= $text[$language]['sectionTitle']; ?>
                    </h2>
                    <p class="text-lg text-gray-200 leading-relaxed max-w-xl mb-8">
                        <?= $text[$language]['sectionDesc']; ?>
                    </p>
                    <a href="#daftar-sejarah" class="inline-flex items-center gap-3 bg-cyan-300 hover:bg-white text-cyan-950 px-8 py-4 rounded-full font-bold transition duration-300 hover:scale-105 shadow-2xl">
                        <?= $text[$language]['sectionBtn']; ?> <span>&darr;</span>
                    </a>
                </div>
                <div class="flex justify-center fadeImage relative order-1 md:order-2">
                    <div class="absolute w-[300px] h-[300px] bg-cyan-400/20 rounded-full blur-3xl"></div>
                    <img src="assets/rajabatak.png" alt="Gambar Raja Batak" class="relative z-10 w-full max-w-lg lg:max-w-xl h-[400px] md:h-[500px] object-cover rounded-[40px] drop-shadow-[0_20px_40px_rgba(0,0,0,0.5)] hover:scale-105 transition duration-500">
                </div>
            </div>

            <div id="daftar-sejarah" class="py-20">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-black mb-5 text-cyan-300 uppercase tracking-wider"><?= $text[$language]['adminSectionTitle']; ?></h2>
                    <div class="w-24 h-1 bg-cyan-400 mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($cards_dari_database as $card) { 
                        $title = ($language == "ID") ? $card['title_id'] : $card['title_en'];
                        $desc = ($language == "ID") ? $card['desc_id'] : $card['desc_en'];
                    ?>
                        <div class="bg-white/10 backdrop-blur-lg border border-cyan-300/20 rounded-3xl p-8 flex flex-col justify-between hover:-translate-y-3 transition duration-500 shadow-2xl hover:border-cyan-300">
                            <div>
                                <div class="w-14 h-14 rounded-2xl bg-cyan-300/20 border border-cyan-300/30 flex items-center justify-center mb-6">
                                    <?php if ($card['icon_shape'] == 'square'): ?>
                                        <div class="w-6 h-6 bg-cyan-300 rounded-md"></div>
                                    <?php elseif ($card['icon_shape'] == 'circle'): ?>
                                        <div class="w-6 h-6 border-4 border-cyan-300 rounded-full"></div>
                                    <?php else: ?>
                                        <div class="w-6 h-6 border-l-4 border-b-4 border-cyan-300 rotate-45 mb-1 ml-1"></div>
                                    <?php endif; ?>
                                </div>
                                <h3 class="text-2xl font-bold text-cyan-300 mb-4"><?= $title; ?></h3>
                                <p class="text-gray-200 leading-relaxed"><?= $desc; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="relative max-w-4xl mx-auto bg-gradient-to-r from-cyan-500/20 to-blue-500/20 border border-cyan-400/30 backdrop-blur-xl rounded-[40px] p-10 md:p-16 text-center shadow-2xl mb-20">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-6 py-1.5 bg-cyan-400 text-cyan-950 font-black rounded-full text-xs uppercase tracking-widest whitespace-nowrap">
                    Interactive Feature
                </div>
                <h3 class="text-3xl md:text-4xl font-black mb-4 text-cyan-200">
                    <?= $text[$language]['forumTitle']; ?>
                </h3>
                <p class="text-gray-300 max-w-2xl mx-auto mb-8 leading-relaxed">
                    <?= $text[$language]['forumDesc']; ?>
                </p>
                <a href="forum-sejarah.php" class="inline-block px-8 py-4 bg-cyan-400 hover:bg-cyan-300 text-cyan-950 font-black rounded-2xl transition duration-300 transform hover:-translate-y-1 shadow-lg shadow-cyan-400/25 tracking-wide">
                    <?= $text[$language]['forumBtn']; ?> &rarr;
                </a>
            </div>

        </div>
    </section>

    <?php include 'partials/footer.php'; ?>
</body>
</html>