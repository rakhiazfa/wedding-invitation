<x-cube.auth.layout title="Wedding Details">

    <x-cube.back_button url="{{ route('weddings') }}"></x-cube.back_button>

    <section class="grid grid-cols-1 md:grid-cols-[1fr,425px] lg:grid-cols-1 xl:grid-cols-[1fr,425px] gap-7">

        <x-cube.card title="Wedding Details">

            <div class="table-responsive">
                <table class="table table-sm">
                    <tr>
                        <th class="whitespace-nowrap">Wedding Name</th>
                        <td>: {{ $wedding->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="whitespace-nowrap">Couple Name</th>
                        <td>: {{ $wedding->couple_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="whitespace-nowrap">Wedding Date</th>
                        <td>: {{ date('d F Y', strtotime($wedding->date ?? '')) }}</td>
                    </tr>
                    <tr>
                        <th class="whitespace-nowrap">Time</th>
                        <td>
                            : {{ date('H:i', strtotime($wedding->time_start ?? '')) }} -
                            {{ date('H:i', strtotime($wedding->time_finish ?? '')) }}
                        </td>
                    </tr>
                    <tr>
                        <th class="whitespace-nowrap">Wedding Hall</th>
                        <td>: {{ $wedding->hall ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="align-top whitespace-nowrap">Wedding Address</th>
                        <td class="flex items-start align-top gap-x-2">
                            <span>:</span>
                            <p>{{ $wedding->address ?? '-' }}</p>
                        </td>
                    </tr>
                </table>
            </div>

        </x-cube.card>

        <x-cube.card title="Owner" class="h-max">

            <div class="flex items-center justify-between gap-10">
                <div class="flex items-center gap-7">
                    <img class="w-[50px] h-[50px] rounded-xl shadow-lg"
                        src="{{ $wedding->owner->user->avatar ? url('storage/' . $user->avatar) : $defaultAvatarImage }}"
                        alt="Avatar">

                    <span class="text-sm font-normal lg:text-base">{{ $wedding->owner->name ?? '-' }}</span>
                </div>

                <a href="{{ route('customers.show', ['customer' => $wedding->owner]) }}">
                    <i class="text-gray-400 uil uil-eye"></i>
                </a>
            </div>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
