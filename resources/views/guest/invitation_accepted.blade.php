<x-cube.layout title="{{ $invitation->guest_name }}">

    <main class="min-h-screen bg-[#f6f8fa]">

        <section class="min-h-screen p-0">

            <div class="normal-wrapper min-h-screen flex justify-center items-center">

                <div class="relative bg-white w-[400px] min-h-screen flex justify-center items-center p-5">

                    <div>
                        <h1 class="text-lg font-medium mb-5">Guest Details</h1>

                        <table class="table table-sm table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>: {{ $invitation->guest_name }}</td>
                            </tr>
                            <tr>
                                <th>Time Received</th>
                                <td>: {{ $invitation->time_received }}</td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>

        </section>

    </main>

</x-cube.layout>
