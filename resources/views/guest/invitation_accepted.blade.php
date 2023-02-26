<x-cube.layout title="Welcome {{ $invitation->guest_name }}">

    <main class="min-h-screen bg-[#f6f8fa]">

        <section class="min-h-screen p-0">

            <div class="normal-wrapper min-h-screen flex justify-center items-center">

                <div class="relative bg-white w-[400px] min-h-screen p-5">

                    <h1 class="text-2xl font-semibold text-center">Welcome {{ $invitation->guest_name }}.</h1>

                </div>

            </div>

        </section>

    </main>

</x-cube.layout>
