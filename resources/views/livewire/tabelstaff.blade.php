<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="flex justify-center mt-10">
        <div class="mx-10 w-full border-secondary border-[3px] rounded-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="text-center bg-primary text-white text-base">
                        <th class="border-r-[3px] border-secondary py-1">No</th>
                        <th class="border-r-[3px] border-secondary">Username</th>
                        <th class="border-r-[3px] border-secondary">Email</th>
                        <th class="border-r-[3px] border-secondary">no_hp</th>
                        <th class="border-secondary">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php $i = 1; @endphp
                    @foreach ($this->staffs as $staff)
                        <tr wire:key="{{ $staff->id }}" class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                            <td class="border-r-[3px] border-secondary py-[3px]">{{ $i }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $staff->username }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $staff->email }}</td>
                            <td class="border-r-[3px] border-secondary">{{ $staff->no_hp }}</td>
                            <td class="">
                                <button wire:click="editStaff({{ $staff->id }})" type="submit">
                                    <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                </button>
                                <button wire:click="konfirDelete({{ $staff->id }})" type="submit">
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
        {{ $this->staffs->links() }}
    </div>
    @include('livewire.edit-staff')
    {{-- modal hapus --}}
    <x-konfirmasi-hapus jenis="Staff">
    </x-konfirmasi-hapus>
</div>
