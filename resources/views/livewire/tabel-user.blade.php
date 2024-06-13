<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">  
            <table class="w-full ">
                <thead class="">
                    <tr class="text-center bg-primary text-white text-base">
                        <th class="border-r-[3px] border-b-[3px] border-secondary py-1">Username</th>
                        <th class="border-r-[3px] border-b-[3px] border-secondary">Email</th>
                        <th class="border-r-[3px] border-b-[3px] border-secondary">No HP</th>
                        <th class="border-r-[3px] border-b-[3px] border-secondary">Status</th>
                        <th class="border-b-[3px] border-secondary">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php $i = 1; @endphp
                    @foreach ($this->users as $user)
                        <tr wire:key="{{ $user->id }}" class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                            <td class="border-r-[3px] border-secondary py-[3px]">{{ $user->username }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $user->email }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $user->no_hp }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $user->status }}</td>
                            <td class="">
                                <button wire:click="editUser({{ $user->id }})" type="submit">
                                    <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                </button>
                                <button wire:click="konfirDelete({{ $user->id }})" type="submit">
                                    <i class="fa-solid fa-trash-can scale-125 text-red-500"></i>
                                </button>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mx-10 mt-2">
        {{ $this->users->links() }}
    </div>
    @include('livewire.edit-user')
    <x-konfirmasi-hapus jenis="User">
    </x-konfirmasi-hapus>
</div>
