<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    html,
    body {
        height: 100%;
    }

    .hs-dropdown-toggle {
        display: flex;
        justify-content: space-between;
        /* Ensures the space between the text and the arrow */
        align-items: center;
    }

    .hs-dropdown-menu {
        position: absolute;
        top: calc(50% + 0.5rem);
        /* Mengatur jarak antara tombol dan dropdown */
        right: 0;
        left: 0;
        /* Mengatur posisi horizontal dropdown */
        z-index: 10;
        /* Atur z-index agar dropdown muncul di atas elemen lain */
        transition: opacity 0.3s ease, visibility 0.3s ease;
        /* Animasi transisi */
        min-width: 60px;
        /* Atur lebar minimum dropdown */
        padding: 0.5rem;
        /* Ruang dalam dropdown */
    }
</style>

<body class="bg-[#607FBB]">
    {{-- Navbar --}}
    <nav class="flex  bg-white pl-10  justify-between ">
        <div class="flex items-center py-3 mr-52">
            <img class=" w-16 object-contain" src={{ url('/img/LogoPolibatam.png') }} alt="LogoPolibatam">
            <img class="object-cover" src={{ url('/img/PBL.png') }} alt="PBL">
        </div>
        <div class="w-80 relative left-16 ml-10 h-auto bg-[#7488C5]"
            style="clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%);"></div>
        <div class="w-1/2 h-auto flex items-center justify-between bg-[#486FBC]">
            <div class=" flex items-left justify-center px-4 my-6 ml-[18rem] text-right">
                <img class="w-7 h-7 mt-1" src={{ url('/img/icon_profile-01.png') }} alt="PBL">
                <a href="/logout" class="font-inter text-[#F5F5F5] text-2xl mx-3">LogOut</a>
            </div>
        </div>
    </nav>

    <div class="flex h-screen">
        <div class="bg-white w-[18rem] h-full">
            {{-- Sidebar --}}
            <div class="flex items-center justify-center px-4 py-4">
                <img class="w-7" src="{{ url('/img/headset1.png') }}" alt="Operator Icon">
                <div class="font-inter text-[#18517C] text-xl w-1/2 p-4 text-center">Operator</div>
            </div>
              <hr class="w-48 h-px mx-auto border-0 bg-[#18517C]">

        
            @foreach ($robot as $r)
                <div class="flex items-center px-4 py-2 hover:bg-gray-50 transition-colors">

                 
                    <div class="rounded-full w-10 h-10 flex items-center justify-center mr-3"
                        style="background-color: {{ $r->warna ?? '#CCCCCC' }}">
                        <img class="w-6" src="{{ url('/img/robot-removebg.png') }}" alt="Robot">
                    </div>

                    <div class="flex-1">
                        <div class="relative group w-full">
                            <button type="button"
                                class="py-2 px-2 inline-flex items-center justify-between w-full gap-x-2 text-lg font-medium text-[#18517C] hover:text-[#0d3a5c]">
                                <span>{{ $r->nama }}</span>
                                <svg class="group-hover:rotate-180 size-5 transition-transform"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>
                            <div
                                class="absolute invisible group-hover:visible opacity-0 group-hover:opacity-100 
                           transition-all duration-300
                           min-w-60 bg-white shadow-lg rounded-lg mt-2 z-10">
                                <div class="p-3 space-y-2">
                                    <div class="text-sm text-gray-700">
                                        <span class="font-semibold">Baterai: {{ $r->baterai }}</span> 
                                    </div>
                                    <div class="text-sm text-gray-700">
                                        <span class="font-semibold">Posisi: {{ $r->nama_posisi }}</span>
                                    </div>
                                    <div class="text-sm text-gray-700">
                                        <span class="font-semibold">Tipe: {{ $r->tipe }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- MainBar --}}
        <div class="w-screen h-screen">
            <div class="flex items-center justify-center w-full h-[5rem]">
                <p
                    class="font-inter text-[#F5F5F5] text-4xl underline underline-offset-8 italic font-semibold w-1/2 p-4 text-center">
                    MAPPING</p>
            </div>
            <!-- component -->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden rounded-2xl bg-white grid grid-cols-4">
                            <?php $no = 0; ?>
                            @foreach ($checkpoint as $cp)
                                <div class="flex flex-col py-9 items-center">
                                    <div class="relative  w-fit z-20">
                                        <img src="{{ url('/img/Subtract.svg') }}" alt="test" class="w-10">
                                        @foreach ($robot as $r)
                                            @if ($r->nama_posisi == $cp->nama_posisi)
                                                <div style="background-color: {{ $r->warna }}"
                                                    class="w-6 h-6 rounded-full absolute left-1/2 top-[35%] -translate-x-1/2 -translate-y-1/2">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div
                                        class="bg-slate-500 grid place-items-center w-7 h-7 relative -top-2 z-10 text-white rounded-full">
                                        <p>{{ ++$no }}</p>
                                        <span
                                            class="absolute text-xs w-[5rem] text-center top-full mt-1 text-black">{{ $cp->nama_posisi }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/preline@2.3.0/dist/preline.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.getElementById('hs-dropdown-hover-event');
        const dropdownMenu = document.getElementById('dropdown-menu');

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
                dropdownMenu.classList.toggle('block');
                dropdownMenu.classList.toggle('opacity-100');
            });

            // Menyembunyikan dropdown saat mengklik di luar dropdown
            document.addEventListener('click', function(event) {
                const isClickInside = dropdownToggle.contains(event.target) || dropdownMenu.contains(
                    event.target);
                if (!isClickInside) {
                    dropdownMenu.classList.remove('block', 'opacity-100');
                    dropdownMenu.classList.add('opacity-0', 'hidden');
                }
            });
        } else {
            console.error('Dropdown toggle or menu not found.');
        }
    });
</script>

</html>
