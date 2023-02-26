<x-cube.layout title="Invitation">

    <main class="min-h-screen bg-[#f6f8fa]">

        <section class="min-h-screen p-0">

            <div class="normal-wrapper min-h-screen flex justify-center items-center">

                <div class="relative bg-white w-[400px] min-h-screen">

                    <img class="w-full min-h-screen object-cover object-bottom"
                        src="{{ url('assets/images/wedding.jpg') }}" alt="Wedding">

                    <div class="absolute z-[50] inset-0 bg-[rgba(0,0,0,0.5)]"></div>

                    <div class="absolute z-[100] top-0 w-full">
                        <div class="text-center py-10">
                            <h1 class="text-2xl text-white font-bold mb-7">{{ $wedding->couple_name }}</h1>
                            <p class="text-white mb-3">{{ $wedding->hall }}</p>
                            <p class="text-white mb-5">{{ $wedding->address }}</p>
                            <p class="text-white">{{ $wedding->date }}</p>
                        </div>
                    </div>

                    <div
                        class="absolute z-[100] bottom-0 w-full h-[350px] flex justify-center items-center bg-white rounded-t-xl">
                        <img src="{{ $invitation->qr_code_link }}" alt="Qr Code">
                    </div>

                </div>

            </div>

        </section>

    </main>

</x-cube.layout>
