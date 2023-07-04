<x-cube.layout title="Invitation">

    <main class="relative max-w-[428px] min-h-screen bg-[#FAF8F4] mx-auto font-nt-fabulous text-[#5F3016]">

        <section class="pb-14">

            <div class="grid grid-cols-[max-content,1fr] mb-[65px]">
                <div class="relative w-[49px] h-[300px] border-r border-[#5F3016]">
                    <h2
                        class="text-[24px] font-normal whitespace-nowrap transform origin-bottom-left -rotate-90 translate-x-[25%] absolute bottom-0 left-0">
                        The Wedding Of
                    </h2>
                </div>

                <div class="relative flex items-end justify-center">
                    <h1 class="text-[clamp(1rem,8vw,2.5rem)]">
                        Siti Astari Maulida
                        <br>
                        Ginanjar Mugi. W
                    </h1>
                    <img class="absolute top-[30px] right-[34px]" src="{{ asset('assets/images/flower.svg') }}"
                        alt="Flower">
                </div>
            </div>

            <div class="relative w-[180px] h-[280px] rounded-[90px] mx-auto mb-[73px]">
                <img class="w-[180px] h-[280px] rounded-[90px] relative z-[2]"
                    src="{{ asset('assets/images/prewedding.jpg') }}" alt="Prewedding">
                <div class="absolute top-0 left-[11.5px] w-full h-full border-2 border-[#5F3016] rounded-[90px]">
                </div>
            </div>

            <div class="mx-auto text-center">
                <p class="text-[12px]">Kepada Yth. Bapak/Ibu/Saudara/i</p>
                <h3 class="text-[32px] my-3">Jhon Doe</h3>
                <p class="text-[8px]">*Mohon maaf apabila ada kesalahan nama dan gelar</p>
            </div>

        </section>

        <section>
            <img src="{{ asset('assets/images/prewedding.jpg') }}" alt="Prewedding">
        </section>

        <section class="py-14">

            <p class="max-w-[290px] text-[12px] text-center mx-auto mb-7">
                Dengan memohon rahmat dan ridha Allah SWT, kami bermaksud menyelengarakana resepsi pernikahan
                putra-putri kami
            </p>

            <h3 class="text-[27px] font-diallome text-center">Siti Astari Maulida</h3>
            <p class="text-[12px] text-center">Putri dari Alm. Bpk. Ade Supriatna dan Ibu Cicih Juarsih</p>

            <p class="text-[38px] text-center">&</p>

            <h3 class="text-[27px] font-diallome text-center">Ginanjar Mugi Widodo</h3>
            <p class="text-[12px] text-center">Putra dari Bpk. Jumino dan Ibu Samikem</p>

        </section>

        <section class="bg-[#602F14] pt-20 pb-72">

            <img class="mx-auto" src="{{ asset('assets/images/flower-with-text.svg') }}" alt="Flower">

        </section>

        <section class="pt-16 pb-5">

            <div class="absolute w-full aspect-square bg-[#FAF8F4] rounded-full transform translate-y-[-60%]"></div>

            <div class="relative z-[2]">

                <div class="text-center mt-[-125px] mb-16">
                    <h4 class="text-[27px] font-diallome">Akad</h4>
                    <p class="text-[12px]">Minggu, 13 Agustus 2023 <br> 09.00 - 11.00</p>
                    <img class="mx-auto my-3" src="{{ asset('assets/images/paddy.svg') }}" alt="Paddy">
                    <h4 class="text-[27px] font-diallome">Resepsi</h4>
                    <p class="text-[12px]">Minggu, 13 Agustus 2023 <br> 11.00 - 13.00</p>
                </div>

                <div class="max-w-[300px] text-center mx-auto mb-12">
                    <p class="text-[12px] mb-7">
                        BBPMB tekMIRA Jl. Jend. Sudirman No.623 Wr. Muncang Kec. Bandung Kulon, Kota Bandung Jawa Barat
                        40211
                    </p>
                    <p class="text-[12px]">
                        Kehadiran serta doa restu Bapak/Ibu/Saudara/i merupaka suatu kehormatan & kebahagiaan bagi kami.
                    </p>
                </div>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7674879268993!2d107.57692771477286!3d-6.918377095001212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e606d1d99309%3A0x258f2b35fa2ac2ac!2sBBPMB%20tekMIRA!5e0!3m2!1sid!2sid!4v1688466747936!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="max-w-[300px] text-center mx-auto mb-12 mt-10">
                    <p class="text-[12px] mb-7">
                        BBPMB tekMIRA Jl. Jend. Sudirman No.623 Wr. Muncang Kec. Bandung Kulon, Kota Bandung Jawa Barat
                        40211
                    </p>

                    <form action="http://maps.google.com/maps" method="get" target="_blank">
                        <input type="hidden" name="daddr"
                            value="BBPMB tekMIRA Jl. Jend. Sudirman No.623 Wr. Muncang Kec. Bandung Kulon, Kota Bandung Jawa Barat 40211" />
                        <button type="submit" class="bg-[#5F3016] text-white uppercase rounded-lg py-3 px-7 mb-7">
                            Get Direction
                        </button>
                    </form>

                    <p class="text-[12px] mb-7">
                        Besar harapan kami jika Bapak/Ibu/Saudara/i berkenan hadir pada acara ini.
                    </p>

                    <button class="bg-[#5F3016] text-white uppercase rounded-lg py-3 px-7">
                        Konfirmasi Kehadiran
                    </button>
                </div>

            </div>

        </section>

    </main>

</x-cube.layout>
