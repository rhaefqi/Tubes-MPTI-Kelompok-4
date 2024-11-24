<div>
    {{-- Success is as dangerous as failure. --}}
    <div>
        <form wire:submit.prevent="editBuku">
            <div class="flex w-full gap-3">
                {{-- {{$id}} --}}
                <input type="hidden" name="" value="">
                <div class="flex flex-col w-full mb-4">
                    <label for="no_seri" class="block text-gray-700 text-sm font-bold mb-2">No. Seri</label>
                    <input type="text" id="no_seri" wire:model.live="no_seri" aria-describedby="no_seriHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->no_seri }}">
                    @error('no_seri') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col w-full mb-4">
                    <label for="isbn" class="block text-gray-700 text-sm font-bold mb-2">ISBN</label>
                    <input type="text" id="isbn" wire:model.live="isbn" aria-describedby="isbnHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->isbn }}">
                    @error('isbn') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col w-full mb-4">
                    <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                    <input type="number" min="1" id="stok" wire:model.live="stok" aria-describedby="stokHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->stok }}">
                    @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="judul_buku" class="block text-gray-700 text-sm font-bold mb-2">Judul Buku</label>
                <input type="text" id="judul_buku" wire:model.live="judul" aria-describedby="judulHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->judul }}">
                @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                <textarea id="keterangan" wire:model.live="deskripsi" aria-describedby="keteranganHelp" class="textarea border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24">{{ $this->deskripsi }}"</textarea>
                @error('deskripsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex w-full gap-3">
                <div class="mb-4">
                    <label for="penulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                    <input type="text" id="penulis" wire:model.live="penulis" aria-describedby="penulisHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->penulis }}">
                    @error('penulis') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="penerbit" class="block text-gray-700 text-sm font-bold mb-2">Penerbit</label>
                    <input type="text" id="penerbit" wire:model.live="penerbit" aria-describedby="penerbitHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->penerbit }}">
                    @error('penerbit') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="tahun_terbit" class="block text-gray-700 text-sm font-bold mb-2">Tahun Terbit</label>
                    <input type="number" min="0" id="tahun_terbit" wire:model.live="tahun_terbit" aria-describedby="tahun_terbitHelp" class="input border-1 border-gray-700 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $this->tahun_terbit }}">
                    @error('tahun_terbit') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex w-full gap-3">
                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                    <select wire:model.live="kategori" id="kategori" aria-describedby="kategoriHelp" class="select select-bordered w-full max-w-xs leading-tights">
                        <option>Silahkan pilih kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option {{ $this->kategori == $kategori->kategori ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="subjek" class="block text-gray-700 text-sm font-bold mb-2">Subjek</label>
                    <select wire:model.live="subjek" id="subjek" aria-describedby="subjekHelp" class="select select-bordered w-full py-0 max-w-xs leading-tight">
                        <option>Silahkan pilih subjek</option>
                        @foreach ($subjeks as $subjek)
                            <option {{ $this->subjek == $subjek->subjek ? 'selected' : '' }} >{{ $subjek->subjek }}</option>
                        @endforeach
                    </select>
                    @error('subjek') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                    <select wire:model.live="kelas" id="subjek" aria-describedby="subjekHelp" class="select select-bordered w-full py-0 max-w-xs leading-tight">
                        <option disabled selected>Silahkan pilih subjek</option>
                        <option {{ $this->kelas == 'SD' ? 'selected' : '' }}>SD</option>
                        <option {{ $this->kelas == 'MTs' ? 'selected' : '' }}>MTs</option>
                        <option {{ $this->kelas == 'MA' ? 'selected' : '' }}>MA</option>
                        <option {{ $this->kelas == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>        
                    </select>
                    @error('kelas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                {{$this->sampul}}
                <label for="sampul" class="block text-gray-700 text-sm font-bold mb-2">Sampul</label>
                <input type="file" id="sampul" wire:model.live="newSampul" aria-describedby="sampulHelp" class="file-input file-input-sm file-input-bordered file-input-gray-700 w-full max-w-xs my-3 text-gray-700 text-sm font-bold" />
                <img id="profile-image" src="{{ $newSampul ? $newSampul->temporaryUrl() : asset($sampul) }}" class="w-20 rounded-lg" alt="Profile Image">
                @error('sampul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-primary hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <button type="button" wire:click="back" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
