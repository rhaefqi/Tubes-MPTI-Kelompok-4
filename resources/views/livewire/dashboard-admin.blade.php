<div>
    {{-- In work, do what you enjoy. --}}
    <div class="flex space-x-3 mx-5">
        <div
            class="grid-cols-2 flex flex-col justify-between w-1/3 h-52 rounded-lg my-7 shadow-2xl border-[#245237] border-2 bg-white relative">
            <div class="text-[#245237] text-left text-5xl font-bold ml-3 mt-9">
                <p>{{ $total_guru }}</p>
                <p class="text-2xl font-bold mt-4">Jumlah Total Guru</p>
            </div>
            <div class="absolute top-7 right-3">
                <svg width="100" height="119" fill="#245237" viewBox="0 0 135 159" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M48.1886 -0.452011C47.301 -0.320024 46.4533 0.00567925 45.7057 0.501989C45.7057 0.501989 37.9697 5.36983 29.6528 10.6352C21.3359 15.8944 12.0833 21.6918 9.9674 22.8659C9.83688 22.9226 9.70838 22.9838 9.58213 23.0494C1.90121 27.7888 0.30509 35.5309 0.0298974 39.8728C0.0115513 40.0746 0.0298974 40.2398 0.0298974 40.4538C-0.0373718 42.0805 0.0298974 43.1262 0.0298974 43.1262V123.011C0.0298974 134.618 13.5632 140.202 26.4056 140.202C30.6863 140.202 34.9671 139.511 38.6363 138.288C41.0825 137.065 42.8376 134.618 42.8376 132.172V67.9608C42.8376 53.8954 45.8953 47.2908 55.0684 41.7869C57.5145 40.5639 83.1624 22.8598 83.1624 22.8598C84.3855 21.6368 85.6453 19.1539 85.6453 17.3193V16.7445C85.6453 14.2983 84.4222 12.427 82.5876 11.2039C80.753 9.98083 78.3068 9.98083 76.4722 11.2039C75.8607 11.8154 38.5568 36.9313 30.6068 41.2121C22.6568 46.1044 15.2389 47.2847 13.4042 44.8385C12.8355 44.2698 12.3402 42.5269 12.2607 40.8268V40.4416C12.2668 38.7782 12.6949 35.6471 16.0828 33.5618C19.5196 31.6476 28.0506 26.1988 36.3431 20.9518C39.8472 18.732 40.2814 18.4935 43.0272 16.7445C43.3886 18.2384 44.2994 19.5415 45.5782 20.3942C46.857 21.247 48.41 21.5869 49.9281 21.3464C51.4462 21.1058 52.8181 20.3024 53.7706 19.0961C54.7231 17.8897 55.1865 16.369 55.0684 14.8365V5.66337C55.0752 4.79172 54.8956 3.92867 54.5416 3.13209C54.1877 2.33551 53.6675 1.62381 53.016 1.04469C52.3645 0.465574 51.5967 0.0324306 50.7641 -0.225704C49.9315 -0.483839 49.0534 -0.560999 48.1886 -0.452011ZM97.1116 20.9518C96.1392 21.1136 95.2202 21.508 94.4331 22.1015C94.4331 22.1015 63.6482 42.8143 58.3156 46.3674C58.251 46.4312 58.1878 46.4964 58.126 46.5631C53.6985 49.8837 51.075 53.8343 49.907 57.4485C49.2525 59.4874 48.9304 61.6183 48.953 63.7595V65.6736C48.9442 65.8631 48.9442 66.0529 48.953 66.2424V140.202C48.953 151.821 62.3334 158.548 74.5642 158.548C80.068 158.548 85.0337 157.362 88.703 154.915C96.0414 150.635 131.511 123.005 131.511 123.005C133.345 121.782 134.568 120.058 134.568 118.223V38.7231C134.568 35.6655 133.382 33.8308 130.936 32.6078C129.101 31.3847 126.086 31.9595 124.252 33.1826C114.467 40.5211 88.1281 61.24 82.0127 64.9092C73.4512 69.8015 65.385 71.0246 62.3273 67.9669C61.1042 66.7438 61.1837 65.5941 61.1837 63.7595C61.2204 62.7077 61.3366 61.8026 61.569 61.081C61.9115 60.0169 62.6086 58.7082 65.1954 56.6901C65.3177 56.5923 65.2566 56.5984 65.385 56.5006C69.8064 53.5468 83.3275 44.331 92.1459 38.3379C92.6455 39.6782 93.5992 40.8009 94.8409 41.5109C96.0827 42.2208 97.534 42.473 98.9425 42.2236C100.351 41.9742 101.627 41.239 102.55 40.1458C103.472 39.0526 103.982 37.6707 103.991 36.2403V27.0672C103.998 26.1956 103.819 25.3325 103.465 24.5359C103.111 23.7394 102.591 23.0277 101.939 22.4485C101.288 21.8694 100.52 21.4363 99.6872 21.1781C98.8546 20.92 97.9765 20.8428 97.1116 20.9518ZM122.338 65.6736V77.9044L91.7607 101.595V89.3646L122.338 65.6736Z" />
                </svg>
            </div>
            <div class="pl-3 mt-auto h-9 bg-[#245237] border-[#245237] flex items-center ml-0 rounded-b-sm">
                <a href="{{ route('guru.kelola') }}" class="flex text-lg font-bold text-white relative overflow-hidden group">
                    More Info
                    <span
                        class="absolute w-full h-0.5 bg-[#245237] bottom-0 left-0 transition-all duration-300 ease-in-out group-hover:bg-white"></span>
                </a>
            </div>
        </div>

        <div
            class="grid-cols-2 flex flex-col justify-between w-1/3 h-52 rounded-md my-7 shadow-2xl border-[#245237] border-2 bg-white relative">
            <div class="text-[#245237] text-left text-5xl font-bold ml-3 mt-9">
                <p>{{ $total_siswa }}</p>
                <p class="text-2xl font-bold mt-4">Jumlah Siswa</p>
            </div>
            <div class="absolute top-7 right-3  ">
                <svg width="117" height="135" fill="#245237" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    id="people">
                    <g>
                        <path
                            d="M9 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm8 2a3 3 0 1 0-3-3 3 3 0 0 0 3 3zm4 7a1 1 0 0 0 1-1 5 5 0 0 0-8.06-3.95A7 7 0 0 0 2 20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1">
                        </path>
                    </g>
                </svg>
            </div>
            <div class="pl-3 mt-auto h-9 bg-[#245237] border-[#245237] flex items-center ml-0 rounded-b-sm">
                <a href="{{ route('siswa.kelola') }}" class="flex text-lg font-bold text-white relative overflow-hidden group">
                    More Info
                    <span
                        class="absolute w-full h-0.5 bg-[#245237] bottom-0 left-0 transition-all duration-300 ease-in-out group-hover:bg-white"></span>
                </a>
            </div>
        </div>

        <div
            class="grid-cols-2 flex flex-col justify-between w-1/3 h-52 rounded-md my-7 shadow-2xl border-[#245237] border-2 bg-white relative">
            <div class="text-[#245237] text-left text-5xl font-bold ml-3 mt-9">
                <p>{{ $total_petugas }}</p>
                <p class="text-2xl font-bold mt-4">Jumlah Petugas</p>
            </div>
            <div class="absolute top-7 right-3  ">
                <svg width="117" height="135" fill="#245237" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    id="people">
                    <g>
                        <path
                            d="M9 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm8 2a3 3 0 1 0-3-3 3 3 0 0 0 3 3zm4 7a1 1 0 0 0 1-1 5 5 0 0 0-8.06-3.95A7 7 0 0 0 2 20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1">
                        </path>
                    </g>
                </svg>
            </div>
            <div class="pl-3 mt-auto h-9 bg-[#245237] border-[#245237] flex items-center ml-0 rounded-b-sm">
                <a href="{{ route('petugas.kelola') }}" class="flex text-lg font-bold text-white relative overflow-hidden group">
                    More Info
                    <span
                        class="absolute w-full h-0.5 bg-[#245237] bottom-0 left-0 transition-all duration-300 ease-in-out group-hover:bg-white"></span>
                </a>
            </div>
        </div>
    </div>
</div>
