<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ID';

$text = [
    "ID" => [
        "title" => "Budaya Batak",
        "subtitle" => "Keunikan budaya Batak yang diwariskan turun-temurun dan tetap hidup hingga sekarang.",
        "sectionTitle" => "Keindahan Budaya Batak",
        "sectionDesc" => "Budaya Batak memiliki ciri khas yang kuat mulai dari rumah adat, pakaian tradisional, tarian, musik gondang, hingga sistem marga yang menjadi identitas masyarakat Batak.",
        "footerTitle" => "Warisan Budaya yang Tetap Terjaga",
        "footerDesc" => "Budaya Batak tetap dilestarikan melalui berbagai upacara adat, musik tradisional, tarian tortor, pakaian adat, dan nilai kekeluargaan yang masih kuat dalam kehidupan masyarakat."
    ],
    "EN" => [
        "title" => "Batak Culture",
        "subtitle" => "The uniqueness of Batak culture that has been passed down through generations and remains alive today.",
        "sectionTitle" => "The Beauty of Batak Culture",
        "sectionDesc" => "Batak culture has strong characteristics ranging from traditional houses, traditional clothing, dances, gondang music, to the clan system that becomes the identity of Batak society.",
        "footerTitle" => "Cultural Heritage That Remains Preserved",
        "footerDesc" => "Batak culture continues to be preserved through traditional ceremonies, gondang music, tortor dances, traditional clothing, and strong family values in everyday community life."
    ]
];

// Re-strukturisasi data card ke dalam array agar kode HTML lebih ringkas (DRY)
$cards = [
    [
        "icon" => "square",
        "title_id" => "Rumah Adat",
        "title_en" => "Traditional House",
        "desc_id" => "Rumah Bolon menjadi simbol arsitektur tradisional Batak yang unik dan bersejarah.",
        "desc_en" => "Rumah Bolon is a symbol of unique and historical Batak traditional architecture."
    ],
    [
        "icon" => "circle",
        "title_id" => "Tarian Tradisional",
        "title_en" => "Traditional Dance",
        "desc_id" => "Tortor merupakan tarian khas Batak yang digunakan dalam acara adat dan budaya.",
        "desc_en" => "Tortor is a traditional Batak dance used in traditional and cultural ceremonies."
    ],
    [
        "icon" => "pillar",
        "title_id" => "Musik Gondang",
        "title_en" => "Gondang Music",
        "desc_id" => "Gondang Batak adalah musik tradisional yang memiliki nilai budaya tinggi.",
        "desc_en" => "Batak gondang is traditional music with high cultural value."
    ],
    [
        "icon" => "rhombus",
        "title_id" => "Sistem Marga",
        "title_en" => "Clan System",
        "desc_id" => "Marga menjadi identitas penting dalam kehidupan masyarakat Batak.",
        "desc_en" => "Clan names are an important identity in Batak society."
    ]
];
?>

<!DOCTYPE html>
<html lang="<?= strtolower($language); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $text[$language]['title']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fadeUp { animation: fadeUp 1s ease forwards; }
    </style>
</head>

<body class="bg-gradient-to-b from-cyan-950 via-blue-900 to-sky-700 text-white overflow-x-hidden">

    <?php include 'partials/navbar.php'; ?>

    <section class="relative overflow-hidden pt-32 md:pt-40 pb-20">
        <div class="absolute top-[-120px] left-[-120px] w-[350px] h-[350px] bg-cyan-400/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-120px] right-[-120px] w-[350px] h-[350px] bg-blue-500/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-5 md:px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-20 fadeUp">
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-black leading-tight mb-6">
                    <?= $text[$language]['title']; ?>
                </h1>
                <p class="text-gray-200 text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    <?= $text[$language]['subtitle']; ?>
                </p>
            </div>

            <div class="grid md:grid-cols-2 items-center gap-12 md:gap-16 mb-24">
                <div class="fadeUp">
                    <div class="inline-block px-5 py-2 rounded-full bg-cyan-300/20 border border-cyan-300/30 text-cyan-300 font-semibold mb-6 text-sm tracking-wide">
                        Batak Culture
                    </div>
                    <h2 class="text-3xl md:text-5xl font-black leading-tight mb-8">
                        <?= $text[$language]['sectionTitle']; ?>
                    </h2>
                    <p class="text-gray-200 leading-relaxed text-base md:text-lg">
                        <?= $text[$language]['sectionDesc']; ?>
                    </p>
                </div>

                <div class="relative fadeUp flex justify-center">
                    <div class="absolute w-[220px] md:w-[320px] h-[220px] md:h-[320px] bg-cyan-400/20 rounded-full blur-3xl"></div>
                    <img src="assets/budaya.png" alt="Budaya Batak" class="relative z-10 w-[85%] sm:w-[70%] md:w-full max-w-lg object-contain drop-shadow-[0_20px_40px_rgba(0,0,0,0.5)] hover:scale-105 transition duration-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($cards as $card): 
                    $cardTitle = ($language == "ID") ? $card['title_id'] : $card['title_en'];
                    $cardDesc = ($language == "ID") ? $card['desc_id'] : $card['desc_en'];
                ?>
                    <div class="bg-white/10 backdrop-blur-2xl border border-cyan-300/20 rounded-[35px] p-8 hover:-translate-y-4 transition duration-500 shadow-2xl hover:border-cyan-300 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-2xl bg-cyan-300/20 border border-cyan-300/30 flex items-center justify-center mb-8">
                                <?php if ($card['icon'] === 'square'): ?>
                                    <div class="w-8 h-8 bg-cyan-300 rounded-xl"></div>
                                <?php elseif ($card['icon'] === 'circle'): ?>
                                    <div class="w-8 h-8 border-4 border-cyan-300 rounded-full"></div>
                                <?php elseif ($card['icon'] === 'pillar'): ?>
                                    <div class="w-8 h-8 border-l-4 border-r-4 border-cyan-300 rounded-lg"></div>
                                <?php else: ?>
                                    <div class="w-8 h-8 border-l-4 border-b-4 border-cyan-300 rotate-45 mb-1 ml-1"></div>
                                <?php endif; ?>
                            </div>

                            <h3 class="text-2xl font-black text-cyan-300 mb-5"><?= $cardTitle; ?></h3>
                            <p class="text-gray-200 leading-relaxed text-sm md:text-base"><?= $cardDesc; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-28 text-center fadeUp">
                <h2 class="text-4xl md:text-5xl font-black mb-8">
                    <?= $text[$language]['footerTitle']; ?>
                </h2>
                <p class="text-gray-200 text-base md:text-lg leading-relaxed max-w-4xl mx-auto">
                    <?= $text[$language]['footerDesc']; ?>
                </p>
            </div>

        </div>
    </section>

    <?php include 'partials/footer.php'; ?>

</body>
</html>