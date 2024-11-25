<div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
    <h2 class="text-[28px] font-bold text-start text-green-700 mb-6">Tambah Buku</h2>
    <form wire:submit.prevent="createBuku" class="space-y-4">
        <!-- Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="no_seri" class="block text-sm font-medium text-gray-700">No. Seri</label>
                <input type="text" id="no_seri" wire:model.live="no_seri" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('no_seri') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                <input type="text" id="isbn" wire:model.live="isbn" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('isbn') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" id="stok" min="1" wire:model.live="stok" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <!-- Row 2 -->
        <div>
            <label for="judul_buku" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" id="judul_buku" wire:model.live="judul" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
            @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <!-- Row 3 -->
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="deskripsi" wire:model.live="deskripsi" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"></textarea>
            @error('deskripsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <!-- Row 4 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" id="penulis" wire:model.live="penulis" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('penulis') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                <input type="text" id="penerbit" wire:model.live="penerbit" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('penerbit') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                <input type="number" id="tahun_terbit" min="1900" wire:model.live="tahun_terbit" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                @error('tahun_terbit') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <!-- Row 5 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="kategori" wire:model.live="kategori" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option>{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
                @error('kategori') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="subjek" class="block text-sm font-medium text-gray-700">Subjek</label>
                <select id="subjek" wire:model.live="subjek" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="">Pilih Subjek</option>
                    @foreach ($subjeks as $subjek)
                        <option>{{ $subjek->subjek }}</option>
                    @endforeach
                </select>
                @error('subjek') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <select id="kelas" wire:model.live="kelas" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="">Pilih Kelas</option>
                    <option>SD</option>
                    <option>MTs</option>
                    <option>MA</option>
                    <option>Lainnya</option>
                </select>
                @error('kelas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <!-- Row 6 -->
        <div class="flex justify-between items-center">
            <button type="submit" 
                class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Simpan
            </button>
            <button type="button" wire:click="back" 
                class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Batal
            </button>
        </div>
    </form>
</div>
