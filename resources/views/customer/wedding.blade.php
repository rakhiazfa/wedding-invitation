<x-cube.auth.layout title="Weddings">

    @if (session('success'))
        <x-cube.alert type="success" message="{{ session('success') }}"></x-cube.alert>
    @endif

    <section class="grid grid-cols-1 xl:grid-cols-2 gap-7">

        @foreach ($weddings as $wedding)
            <x-cube.card title="{!! Str::limit($wedding->name, 30, ' . . . ') !!}">

                <div class="flex justify-around gap-3 mb-8">
                    <a class="flex flex-col items-center gap-2 text-gray-400"
                        href="{{ route('customer.weddings.show', [
                            'username' => request()->route('username'),
                            'wedding' => $wedding,
                        ]) }}">
                        <i class="uil uil-eye"></i>
                        <span class="text-[0.5rem] sm:text-[0.65rem] font-semibold">View Details</span>
                    </a>
                    <a class="flex flex-col items-center gap-2 text-gray-400"
                        href="{{ route('customer.weddings.edit', [
                            'username' => request()->route('username'),
                            'wedding' => $wedding,
                        ]) }}">
                        <i class="uil uil-pen"></i>
                        <span class="text-[0.5rem] sm:text-[0.65rem] font-semibold">Edit</span>
                    </a>
                    <a class="flex flex-col items-center gap-2 text-gray-400"
                        href="{{ route('customer.weddings.show', [
                            'username' => request()->route('username'),
                            'wedding' => $wedding,
                        ]) . '#invitation' }}">
                        <i class="uil uil-envelope"></i>
                        <span class="text-[0.5rem] sm:text-[0.65rem] font-semibold">Invite Guest</span>
                    </a>
                </div>

                <p class="text-xs font-normal">
                    Wedding Date : {{ date('d F Y', strtotime($wedding->date ?? '')) }}
                </p>

            </x-cube.card>
        @endforeach

    </section>

</x-cube.auth.layout>
