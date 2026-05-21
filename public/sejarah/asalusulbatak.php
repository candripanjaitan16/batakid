<?php
session_start();
$language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ID';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($language == 'ID') ? 'Asal Usul Batak' : 'The Origin of Batak'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-white p-8">
    <div class="max-w-3xl mx-auto">
        <a href="../../sejarah.php" class="text-cyan-400">&larr; Kembali</a>
        <h1 class="text-4xl font-black mt-6"><?php echo ($language == 'ID') ? 'Asal Usul Batak' : 'The Origin of Batak'; ?></h1>
        <img src="../../assets/uploads/8377c93207c513fa7815.png" class="w-full h-96 object-cover rounded-3xl my-6">
        <p class="text-slate-300 leading-relaxed"><?php echo ($language == 'ID') ? 'Batak berasal dari pusuk buhit' : 'Batak comes from Pusuk Buhit'; ?></p>
    </div>
</body>
</html>