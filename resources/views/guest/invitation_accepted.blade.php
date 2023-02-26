<x-cube.layout title="Welcome {{ $invitation->guest_name }}">

    <main class="min-h-screen bg-[#f6f8fa]">

        <section class="min-h-screen p-0">

            <div class="normal-wrapper min-h-screen flex justify-center items-center">

                <div class="relative bg-white w-[400px] min-h-screen p-5">

                    <table class="table table-sm table-borderd">
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

        </section>

    </main>

</x-cube.layout>
