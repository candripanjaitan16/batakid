<div class="max-h-[75vh] overflow-y-auto overflow-x-hidden pr-2 custom-scrollbar">
    
    <header class="mb-10">
        <h1 class="text-3xl font-black tracking-tight text-white">Pengaturan Sistem</h1>
        <p class="text-slate-400 text-sm mt-1">Kelola konfigurasi keamanan akun kredensial super admin website kamu.</p>
    </header>

    <form action="process_pengaturan.php" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 flex flex-col gap-8">
            <div class="bg-slate-950/40 border border-slate-800 p-6 rounded-3xl shadow-xl">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-lock text-cyan-400 text-sm"></i> Kredensial Akun Super Admin
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Username Admin</label>
                        <input 
                            type="text" 
                            name="username" 
                            value="admin_batak" 
                            required
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-cyan-500 transition"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Password Baru <span class="text-slate-600 font-normal">(Isi jika ingin ganti)</span></label>
                        <input 
                            type="password" 
                            name="password_baru" 
                            placeholder="••••••••" 
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-cyan-500 transition"
                        >
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-start">
            <button 
                type="submit" 
                class="w-full bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-black py-4 rounded-2xl transition shadow-xl shadow-cyan-500/10 flex items-center justify-center gap-2 text-sm cursor-pointer active:scale-[0.99]"
            >
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
            </button>
        </div>

    </form>

</div>