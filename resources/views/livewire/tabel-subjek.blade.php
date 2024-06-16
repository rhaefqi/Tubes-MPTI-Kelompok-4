<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <button x-data x-on:click="$dispatch('open-input')" class="mb-4 bg-primary text-white py-2 px-4 rounded"><i class="fa-solid fa-plus"></i>
                Tambah Subjek
            </button>
            <x-input-modal title="Tambah Subjek">
                <x-slot:body>
                    <livewire:create-subjek/>
                </x-slot>
            </x-input-modal>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Subjek</th>
                            <th class="py-3 px-6 text-left">Dibuat Pada</th>
                            <th class="py-3 px-6 text-left">Diubah Pada</th>
                            <th class="py-3 px-6 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($this->subjeks as $subjek)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $subjek->subjek }}</td>
                                <td class="py-3 px-6 text-left">{{ $subjek->created_at }}</td>
                                <td class="py-3 px-6 text-left">{{ $subjek->updated_at }}</td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex item-center">
                                        <button wire:click.prevent="editSubjek('{{ $subjek->subjek }}')" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="fa-solid fa-pen-to-square text-[#69BE28] fa-lg"></i>
                                        </button>
                                        <button wire:click.prevent="konfirDelete('{{ $subjek->subjek }}')" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <i class="fa-solid fa-trash-can text-red-500 fa-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mx-10 mt-2">
        {{ $this->subjeks->links() }}
    </div>
    @include('livewire.alert-gagalkelas')
    @include('livewire.edit-subjek')
    <x-konfirmasi-hapus jenis="Subjek">
    </x-konfirmasi-hapus>
</div>
