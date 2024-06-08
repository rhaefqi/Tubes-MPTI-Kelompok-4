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
                    @for ($i = 1; $i <= 20; $i++)
                        <tr class="text-center font-semibold {{ $i % 2 == 0 ? 'bg-[#F5f5f5]' : 'bg-gray-200' }}">
                            <td class="border-r-[3px] border-secondary py-[3px]">Fortyche</td>
                            <td class="border-r-[3px] border-secondary">fortyche@gmail.com</td>
                            <td class="border-r-[3px] border-secondary">083167409073</td>
                            <td class="border-r-[3px] border-secondary">Siswa</td>
                            <td class="">
                                <i class="fa-solid fa-pen-to-square scale-125 text-green-500 mr-3"></i>
                                <a href="">
                                    <i class="fa-solid fa-trash-can scale-125 text-red-500"></i>
                                </a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
