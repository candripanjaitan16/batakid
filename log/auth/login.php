    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Portal Admin - Budaya Batak</title>
        
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-cyan-500/30 selection:text-cyan-400">

        <div class="w-screen h-screen flex items-center justify-center">
            
            <div class="w-full max-w-md p-8 sm:p-10 bg-slate-900/50 border border-slate-800/80 rounded-3xl shadow-2xl backdrop-blur-md flex flex-col justify-between min-h-[480px]">
                
                <div class="text-center mt-2">
                    <div class="mx-auto w-14 h-14 bg-gradient-to-br from-cyan-500/20 to-blue-500/10 border border-cyan-500/30 text-cyan-400 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-cyan-500/5">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h2 class="text-2xl font-black tracking-tight text-white mt-6">Portal Admin</h2>
                    <p class="text-slate-400 text-xs mt-1.5 px-4">Masukkan kredensial akun super admin untuk mengelola data warisan budaya Batak.</p>
                </div>

                <form action="../login_process.php" method="POST" class="mt-8 space-y-5 grow flex flex-col justify-center">
                    
                    <div class="space-y-2">
                        <label for="username" class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block pl-1">Username</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500">
                                <i class="fa-solid fa-user text-sm"></i>
                            </span>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                placeholder="Masukkan username anda..." 
                                required
                                class="w-full bg-slate-950 border border-slate-800 pl-11 pr-4 py-3 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/30 transition duration-200"
                            >
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center px-1">
                            <label for="password" class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">Password</label>
                            <a href="#" class="text-[11px] text-cyan-400 hover:underline font-semibold transition">Lupa?</a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </span>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="••••••••" 
                                required
                                class="w-full bg-slate-950 border border-slate-800 pl-11 pr-4 py-3 rounded-xl text-sm text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/30 transition duration-200"
                            >
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full mt-2 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-sm py-3 px-4 rounded-xl shadow-lg shadow-cyan-500/10 hover:shadow-cyan-400/20 active:scale-[0.98] transition duration-200 flex items-center justify-center gap-2 cursor-pointer"
                    >
                        <span>Masuk Dashboard</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <div class="text-center text-[10px] text-slate-600 tracking-wide mt-6 mb-2">
                    &copy; 2026 budayabatak.id &bull; Panel Manajemen
                </div>

            </div>
        </div>

    </body>
    </html>