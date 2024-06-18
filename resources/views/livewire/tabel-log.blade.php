<div>
    {{-- Do your work, then step back. --}}
    <div class="container mx-auto p-4 mt-5">
        <div class="bg-white shadow-md rounded-lg p-4">

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border font-open">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">NISN / NIP</th>
                            <th class="py-3 px-6 text-left">Id Buku</th>
                            <th class="py-3 px-6 text-left">Jumlah dipinjam</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">action</th>
                            <th class="py-3 px-6 text-left">waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-md">
                        @foreach ($this->logs as $log)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $log->nisn_nip }}</td>
                                <td class="py-3 px-6 text-left">{{ $log->buku_id }}</td>
                                <td class="py-3 px-6 text-left">{{ $log->jumlah_dipinjam }}</td>
                                <td class="py-3 px-6 text-left">{{ $log->status }}</td>
                                <td class="py-3 px-6 text-left">{{ $log->action }}</td>
                                <td class="py-3 px-6 text-left">{{ $log->waktu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mx-10 mt-2">
        {{ $this->logs->links() }}
    </div>
</div>
