<x-cube.layout title="{{ $invitation->guest_name }}">

    <main class="min-h-screen bg-[#f6f8fa]">

        <section class="min-h-screen p-0">

            <div class="normal-wrapper min-h-screen flex justify-center items-center">

                <div class="relative bg-white w-[400px] min-h-screen px-5 py-10">

                    <div class="mb-5">
                        <h1 class="text-lg text-center font-medium mb-5">Guest Details</h1>

                        <table class="table table-sm table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>: {{ $invitation->guest_name }}</td>
                            </tr>
                            <tr>
                                <th>Time Received</th>
                                <td>: {{ $invitation->time_received }}</td>
                            </tr>
                            <tr>
                                <th>Guest Estimates</th>
                                <td>: {{ $invitation->guest_estimates ?? 0 }}</td>
                            </tr>
                            @if ($invitation->is_already_received)
                                <tr>
                                    <th>Arriving Guest</th>
                                    <td>: {{ $invitation->arriving_guest ?? 0 }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>

                    @if (session('success'))
                        <x-cube.alert type="success" message="{{ session('success') }}"></x-cube.alert>
                    @endif

                    @if (!$invitation->is_already_received)
                        <form
                            action="{{ route('invitations.accept', [
                                'accessToken' => $accessToken,
                            ]) }}"
                            method="POST">
                            @csrf

                            <div class="form-group mb-5">
                                <label class="label">Jumlah Tamu</label>
                                <input type="number" class="field" name="arriving_guest" min="1">
                                @error('arriving_guest')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn w-full btn-sm btn-primary">
                                Submit
                            </button>

                        </form>
                    @endif

                </div>

            </div>

        </section>

    </main>

</x-cube.layout>
