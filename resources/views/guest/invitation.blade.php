<x-cube.layout title="Invitation" :meta="[
    'title' => strtoupper('UNDANGAN PERNIKAHAN | ' . $invitation->wedding->name),
    'description' => '13 Agustus 2023' . ' | Kepada ' . $invitation->guest_name,
    'image' => asset('assets/images/prewedding-meta.png'),
    'image_alt' => 'Prewedding',
    'image_type' => 'image/jpg',
    'image_width' => '500',
    'image_height' => '500',
    'url' => url()->current(),
]">

    @section('styles')
        <style>
            .slides {
                width: 100%;
                height: 500px;
                position: relative;
                overflow: hidden;
            }

            .slide {
                position: absolute;
                top: 0;
                left: 0;
                transform: translateX(100%);
            }

            .slide .image {
                width: 100%;
                height: 500px;
                object-fit: cover;
            }

            .slide.active {
                transform: translateX(0%);
            }

            .top-3 {
                top: 0.75rem;
            }
        </style>
    @endsection

    <main class="relative max-w-[428px] min-h-screen bg-[#FAF8F4] mx-auto font-nt-fabulous text-[#5F3016]">

        <section class="pb-14">

            <div class="grid grid-cols-[max-content,1fr] mb-[65px]">
                <div class="relative w-[49px] h-[300px] border-r border-[#5F3016]">
                    <h2
                        class="text-[24px] font-normal whitespace-nowrap transform origin-bottom-left -rotate-90 translate-x-[25%] absolute bottom-0 -left-7 uppercase">
                        Undangan Pernikahan
                    </h2>
                </div>

                <div class="relative flex items-center justify-center pt-20">
                    <h1 class="block text-[clamp(1rem,8vw,2.5rem)]">
                        Siti Astari Maulida
                        <br>
                        Ginanjar Mugi. W
                    </h1>

                    <img class="absolute top-[30px] right-[34px]" src="{{ asset('assets/images/flower.svg') }}"
                        alt="Flower">
                </div>
            </div>

            <div class="relative w-[180px] h-[280px] rounded-[90px] mx-auto mb-[70px] -mt-20">
                <img class="w-[180px] h-[280px] rounded-[90px] relative z-[2]"
                    src="{{ asset('assets/images/prewedding_1.png') }}" alt="Prewedding">
                <div class="absolute top-0 left-[11.5px] w-full h-full border-2 border-[#5F3016] rounded-[90px]">
                </div>
            </div>

            <div class="mx-auto text-center">
                <p class="text-[12px]">Kepada Yth. Bapak/Ibu/Saudara/i</p>
                <h3 class="text-[32px] my-3">{{ $invitation->guest_name }}</h3>
                <p class="text-[10px]">*Mohon maaf apabila ada kesalahan nama dan gelar</p>
            </div>

        </section>

        <section>
            <div class="slides">
                <div id="slide-1" class="slide active">
                    <img class="image" src="{{ asset('assets/images/sliders/1.png') }}" alt="Prewedding">
                </div>
                <div id="slide-2" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/2.png') }}" alt="Prewedding">
                </div>
                <div id="slide-3" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/3.png') }}" alt="Prewedding">
                </div>
                <div id="slide-4" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/4.png') }}" alt="Prewedding">
                </div>
                <div id="slide-5" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/5.png') }}" alt="Prewedding">
                </div>
                <div id="slide-6" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/6.png') }}" alt="Prewedding">
                </div>
                <div id="slide-7" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/7.png') }}" alt="Prewedding">
                </div>
                <div id="slide-8" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/8.png') }}" alt="Prewedding">
                </div>
                <div id="slide-9" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/9.png') }}" alt="Prewedding">
                </div>
                <div id="slide-10" class="slide">
                    <img class="image" src="{{ asset('assets/images/sliders/10.png') }}" alt="Prewedding">
                </div>
            </div>
        </section>

        <section class="py-10">

            <p class="max-w-[350px] text-[12px] text-center mx-auto mb-5">
                BISMILLAHIRRAHMANIRRAHIM
            </p>

            <p class="max-w-[290px] text-[12px] text-center mx-auto mb-7">
                Assalamuálaikum warahmatullahi wabarakatuh
                Maha suci Allah yang menciptakan makhluk-Nya berpasang-pasangan
                Ya Allah perkenankanlah kami menikahkan putra-putri kami
            </p>

            <h3 class="text-[27px] font-diallome text-center" style="margin-bottom: 0.5rem;">Siti Astari Maulida</h3>
            <p class="text-[12px] text-center">Putri dari Bpk. Ade Supriatna (alm) dan Ibu Cicih Juarsih</p>

            <h3 class="text-[27px] font-diallome text-center" style="margin: 2rem 0;">dengan</h3>

            <h3 class="text-[27px] font-diallome text-center" style="margin-bottom: 0.5rem;">Ginanjar Mugi Widodo</h3>
            <p class="text-[12px] text-center">Putra dari Bpk. Jumino dan Ibu Samikem</p>

        </section>

        <section class="bg-[#602F14] pt-20 pb-72">

            <img class="mx-auto mb-14" src="{{ asset('assets/images/flower-with-text.svg') }}" alt="Flower">

            <h1 class="text-[12px] text-white text-center mb-7">yang Insya Allah akan dilaksanakan pada :</h1>

            <div class="flex justify-center items-center gap-5">

                <div class="flex flex-col items-center border border-white text-white p-3 rounded-[10px]">
                    <span id="days"></span>
                    <span>Hari</span>
                </div>

                <div class="flex flex-col items-center border border-white text-white p-3 rounded-[10px]">
                    <span id="hours"></span>
                    <span>Jam</span>
                </div>

                <div class="flex flex-col items-center border border-white text-white p-3 rounded-[10px]">
                    <span id="minutes"></span>
                    <span>Menit</span>
                </div>
                <div class="flex flex-col items-center border border-white text-white p-3 rounded-[10px]">
                    <span id="seconds"></span>
                    <span>Detik</span>
                </div>

            </div>

        </section>

        <section class="pt-14 pb-5">

            <div class="absolute w-full aspect-square bg-[#FAF8F4] rounded-full transform translate-y-[-60%]"></div>

            <div class="relative z-[2]">

                <div class="text-center mt-[-125px] mb-12">
                    <h4 class="text-[27px] font-diallome">Akad</h4>
                    <p class="text-[12px]">Minggu, 13 Agustus 2023 <br> 08.00 - 10.00</p>
                    <img class="mx-auto my-3" src="{{ asset('assets/images/paddy.svg') }}" alt="Paddy">
                    <h4 class="text-[27px] font-diallome">Resepsi</h4>
                    <p class="text-[12px]">Minggu, 13 Agustus 2023 <br> 11.00 - 14.00</p>
                </div>

                <div class="max-w-[300px] text-center mx-auto mb-10">
                    <p class="text-[12px] mb-7">
                        BBPMB tekMIRA <br> Jl. Jend. Sudirman No.623 Wr. Muncang Kec. Bandung Kulon, Kota Bandung Jawa
                        Barat
                        40211
                    </p>
                    <p class="text-[12px] mb-7">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apalagi Bapak/Ibu/Saudara/i
                        berkenan untuk hadir memberikan doa serta merestui langkah putra-putri kami
                    </p>
                    <p class="text-[12px]">
                        wassalamualaikum warahmatullahi wabarakatuh
                    </p>
                </div>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7674879268993!2d107.57692771477286!3d-6.918377095001212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e606d1d99309%3A0x258f2b35fa2ac2ac!2sBBPMB%20tekMIRA!5e0!3m2!1sid!2sid!4v1688466747936!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="max-w-[300px] text-center mx-auto mt-10">
                    <p class="text-[12px] mb-7">
                        BBPMB tekMIRA <br> Jl. Jend. Sudirman No.623 Wr. Muncang Kec. Bandung Kulon, Kota Bandung Jawa
                        Barat
                        40211
                    </p>

                    <form action="http://maps.google.com/maps" method="get" target="_blank">
                        <input type="hidden" name="daddr"
                            value="BBPMB tekMIRA Jl. Jend. Sudirman No.623 Wr. Muncang Kec. Bandung Kulon, Kota Bandung Jawa Barat 40211" />
                        <button type="submit" class="bg-[#5F3016] text-white rounded-lg py-3 px-7 mb-7">
                            Lihat Lokasi
                        </button>
                    </form>

                </div>

            </div>

        </section>

        <section class="px-7 pb-14">

            <div class="border-2 border-[#5F3016] rounded-[10px] px-7 py-10">

                <h1 class="text-2xl text-center mb-5">Konfirmasi Kehadiran Anda</h1>

                <div class="w-[75%] h-[1px] bg-[#5F3016] mx-auto mb-5"></div>

                <form
                    action="{{ route('invitations.confirmation', [
                        'wedding' => $wedding,
                        'invitation' => $invitation,
                    ]) }}"
                    method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-5">

                        <div class="form-group">
                            <label class="block mb-1 text-[#5F3016]">Nama</label>
                            <input type="text" class="field focus:outline-[#5F3016] border-2 border-[#5F3016]"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="block mb-1 text-[#5F3016]">Apakah Kamu Akan Hadir?</label>
                            <select name="presence_status"
                                class="field focus:outline-[#5F3016] border-2 border-[#5F3016]">
                                <option value="">-</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Dapat Hadir">Tidak Dapat Hadir</option>
                            </select>
                            @error('presence_status')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="block mb-1 text-[#5F3016]">Jumlah Tamu yang Hadir Termasuk Kamu?</label>
                            <select name="guest_estimates"
                                class="field focus:outline-[#5F3016] border-2 border-[#5F3016]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            @error('guest_estimates')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-center mt-3">
                            <button type="submit" class="bg-[#5F3016] text-white rounded-lg py-3 px-7">
                                Konfirmasi
                            </button>
                        </div>

                    </div>

                </form>

            </div>

        </section>

        <section class="bg-[#602F14] pb-10 pt-20 relative px-7">

            <img class="absolute top-0 left-0" src="{{ asset('assets/images/flower-dark.png') }}" alt="Flower">

            <div class="relative w-[298px] h-[168px] bg-white rounded-lg mx-auto mb-10">

                <div class="w-[298px] h-[168px] border-2 border-white rounded-lg mx-auto mb-10 absolute top-3 left-3">

                </div>
            </div>

            <img class="mx-auto mb-14" src="{{ asset('assets/images/flower-with-text.svg') }}" alt="Flower">

            <div class="bg-[#F9F5F2] rounded-[10px] px-7 py-10">

                <div class="border-2 border-[#5F3016] rounded-[10px] p-5">

                    <h1 class="text-2xl text-[#5F3016] text-center mb-5">Ucapan & Doa</h1>

                    <div class="h-[1px] bg-[#5F3016] mx-auto mb-5" style="width: 50%;"></div>

                    <form
                        action="{{ route('invitations.send_wishes', [
                            'wedding' => $wedding,
                            'invitation' => $invitation,
                        ]) }}"
                        method="POST">
                        @csrf

                        <div class="grid grid-cols-1 gap-5">

                            <div class="form-group">
                                <label class="block mb-1 text-[#5F3016]">Nama</label>
                                <input type="text" class="field focus:outline-[#5F3016] border-2 border-[#5F3016]"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="block mb-1 text-[#5F3016]">Ucapan Anda</label>
                                <textarea name="wishes" class="field focus:outline-[#5F3016] border-2 border-[#5F3016]" rows="3">{{ old('wishes') }}</textarea>
                                @error('wishes')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-center mt-3">
                                <button type="submit" class="bg-[#5F3016] text-white rounded-lg py-3 px-7">
                                    Kirim
                                </button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </section>

        <section class="bg-[#602F14] pb-10 pt-5 px-7">
            <div class="grid grid-cols-1 gap-5 overflow-y-auto" style="max-height: 300px; overflow-y: auto;">
                @foreach ($wedding->wishes as $item)
                    <div class="border-2 border-[#E2ECDF] text-[#E2ECDF] rounded-[10px] p-7">
                        <h2 class="text-[16px] mb-5">{{ $item->name }}</h2>
                        <p class="text-[16px] mb-5">{{ $item->wishes }}</p>
                        <hr>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    <footer class="relative max-w-[428px] bg-[#5F3016] mx-auto font-nt-fabulous text-[#E2ECDF] py-5">
        <p class="text-center">Site by GREAT WEBSITE STUDIO</p>
    </footer>

    @section('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var slides = document.querySelector('.slides');
                var activeSlide = slides.querySelector('.slide.active');

                setInterval(function() {

                    if (activeSlide.nextElementSibling == null) {

                        activeSlide.classList.remove('active');
                        activeSlide = slides.firstElementChild;
                        activeSlide.classList.add('active');
                    } else {

                        activeSlide.classList.remove('active');
                        activeSlide = activeSlide.nextElementSibling;
                        activeSlide.classList.add('active');
                    }

                }, 1000);

                var end = new Date('08/13/2023 08:00 AM');

                var _second = 1000;
                var _minute = _second * 60;
                var _hour = _minute * 60;
                var _day = _hour * 24;
                var timer;

                function showRemaining() {

                    var now = new Date();

                    var distance = end - now;

                    if (distance < 0) {

                        clearInterval(timer);

                        return;
                    }

                    var days = Math.floor(distance / _day);
                    var hours = Math.floor((distance % _day) / _hour);
                    var minutes = Math.floor((distance % _hour) / _minute);
                    var seconds = Math.floor((distance % _minute) / _second);

                    document.getElementById('days').innerHTML = days;
                    document.getElementById('hours').innerHTML = hours;
                    document.getElementById('minutes').innerHTML = minutes;
                    document.getElementById('seconds').innerHTML = seconds;
                }

                timer = setInterval(showRemaining, 1000);

                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>
    @endsection

</x-cube.layout>
