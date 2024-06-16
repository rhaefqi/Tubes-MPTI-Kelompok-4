{{-- <div> --}}
    {{-- In work, do what you enjoy. --}}
{{-- </div> --}}

<div>
    <form wire:submit.prevent="createBuku">
        <div class="flex w-full gap-3">
            <div class="flex flex-col w-full mb-4">
                <label for="no_seri" class="block text-gray-700 text-sm font-bold mb-2">No. Seri</label>
                <input type="text" id="no_seri" wire:model="no_seri" aria-describedby="no_seriHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('no_seri') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="isbn" class="block text-gray-700 text-sm font-bold mb-2">ISBN</label>
                <input type="text" id="isbn" wire:model="isbn" aria-describedby="isbnHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('isbn') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                <input type="text" id="stok" wire:model="stok" aria-describedby="stokHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4">
            <label for="judul_buku" class="block text-gray-700 text-sm font-bold mb-2">Judul Buku</label>
            <input type="text" id="judul_buku" wire:model="judul" aria-describedby="judulHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
            <textarea id="keterangan" wire:model="deskripsi" aria-describedby="keteranganHelp" class="textarea border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24"></textarea>
            @error('deskripsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex w-full gap-3">
            <div class="mb-4">
                <label for="penulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                <input type="text" id="penulis" wire:model="penulis" aria-describedby="penulisHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('penulis') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="penerbit" class="block text-gray-700 text-sm font-bold mb-2">Penerbit</label>
                <input type="text" id="penerbit" wire:model="penerbit" aria-describedby="penerbitHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('penerbit') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="tahun_terbit" class="block text-gray-700 text-sm font-bold mb-2">Tahun Terbit</label>
                <input type="text" id="tahun_terbit" wire:model="tahun_terbit" aria-describedby="tahun_terbitHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('tahun_terbit') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex w-full gap-3">
            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                <select wire:model="kategori" id="kategori" aria-describedby="kategoriHelp" class="select select-bordered w-full max-w-xs leading-tights">
                    <option disabled selected>Silahkan pilih kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option>{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
                @error('kategori') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="subjek" class="block text-gray-700 text-sm font-bold mb-2">Subjek</label>
                <select wire:model="subjek" id="subjek" aria-describedby="subjekHelp" class="select select-bordered w-full py-0 max-w-xs leading-tight">
                    <option disabled selected>Silahkan pilih subjek</option>
                    @foreach ($subjeks as $subjek)
                        <option>{{ $subjek->subjek }}</option>
                    @endforeach
                </select>
                @error('subjek') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="kelas" class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                <select wire:model="kelas" id="subjek" aria-describedby="subjekHelp" class="select select-bordered w-full py-0 max-w-xs leading-tight">
                    <option disabled selected>Silahkan pilih subjek</option>
                    <option>SD</option>
                    <option>MTs</option>
                    <option>MA</option>
                    <option>Lainnya</option>        
                </select>
                @error('kelas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4">
            <label for="sampul" class="block text-gray-700 text-sm font-bold mb-2">Sampul</label>
            <input type="file" id="sampul" wire:model="sampul" aria-describedby="sampulHelp" class="file-input file-input-sm file-input-bordered file-input-gray-700 w-full max-w-xs my-3 text-gray-700 text-sm font-bold" />
            <img id="profile-image" src="" class="w-20 rounded-lg" alt="Profile Image">
            @error('sampul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-primary hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
            <button type="button" wire:click="resetForm" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Batal
            </button>
        </div>
    </form>
</div>

