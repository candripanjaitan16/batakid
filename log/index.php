<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// MENGUNCI JALUR DATABASE STATIS XAMPP LINUX KAUMU
include '/opt/lampp/htdocs/batakid/database/config.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: auth/login.php");
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - budayabatak.id</title>
    <link rel="shortcut icon" href="assets/icon.png" type="image/x-icon">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased h-screen overflow-hidden">

    <div class="flex w-screen h-full">
        
        <div class="shrink-0 h-full">
            <?php include 'partials/sidebar.php'; ?>
        </div>

        <main class="flex-1 h-full overflow-y-auto p-6 md:p-10 custom-scrollbar">
            <div class="max-w-7xl mx-auto w-full">
                <?php 
                $component_file = 'components/' . $page . '.php';
                
                if (file_exists($component_file)) {
                    include $component_file;
                } else {
                    echo "
                    <div class='text-center py-20 bg-slate-900/20 border border-slate-800/60 rounded-3xl p-8 max-w-md mx-auto mt-10'>
                        <div class='w-16 h-16 bg-rose-500/10 text-rose-400 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4'>
                            <i class='fa-solid fa-triangle-exclamation'></i>
                        </div>
                        <h2 class='text-xl font-black text-white tracking-tight'>Halaman Tidak Ditemukan!</h2>
                        <p class='text-slate-400 text-xs mt-2'>File <code class='text-rose-400 bg-rose-500/5 px-1.5 py-0.5 rounded border border-rose-500/10'>$component_file</code> belum dibuat.</p>
                        <a href='index.php?page=dashboard' class='inline-block mt-5 bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition duration-200'>
                            Kembali ke Dashboard
                        </a>
                    </div>";
                }
                ?>
            </div>
        </main>
    </div>

</body>
</html>