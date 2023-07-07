<x-cube.layout title="Invitation">

    <main class="relative max-w-[428px] min-h-screen bg-[#FAF8F4] mx-auto font-nt-fabulous text-[#5F3016]">

        <div
            class="relative w-[95%] h-[417px] rounded-br-[50px] bg-white shadow-md overflow-hidden flex items-start justify-center">

            <img class="absolute" src="{{ asset('assets/images/prewedding.jpg') }}" alt="Prewedding">
            <div class="absolute bg-white opacity-75 w-full h-full"></div>

            <div class="text-center py-5 relative z-[2] px-7">
                <h1 class="text-[clamp(1rem,8vw,2rem)] uppercase mb-16">The Wedding Of</h1>

                <h3 class="text-[clamp(1rem,8vw,2rem)] font-diallome">Siti Astari Maulida</h3>
                <p class="text-[12px]">Putri dari Alm. Bpk. Ade Supriatna dan Ibu Cicih Juarsih</p>

                <p class="text-[38px] font-diallome my-3">Dan</p>

                <h3 class="text-[clamp(1rem,8vw,2rem)] font-diallome">Ginanjar Mugi Widodo</h3>
                <p class="text-[12px]">Putra dari Bpk. Jumino dan Ibu Samikem</p>
            </div>

        </div>

        <div class="text-center py-10">

            <img class="w-[175px] aspect-square mx-auto mb-7 rounded-[20px]" src="{{ $invitation->qr_code_link }}"
                alt="Qr Code">

            <p class="max-w-[150px] text-xs mb-7 mx-auto">Barcode ini harap dibawa sebagai tanda kehadiran anda</p>

            <button class="bg-[#5F3016] text-white uppercase rounded-lg py-3 px-7">
                Download Card
            </button>

        </div>

    </main>

</x-cube.layout>
