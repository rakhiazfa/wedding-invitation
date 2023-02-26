<x-cube.auth.layout title="Customer Details">

    <x-cube.back_button url="{{ route('customers') }}"></x-cube.back_button>

    <section class="grid grid-cols-1 xl:grid-cols-[650px,1fr] gap-7">

        <x-cube.card title="Customer Details">

            <div class="flex flex-col md:flex-row items-center gap-10">
                <img class="w-[200px] h-[200px] rounded-xl shadow-lg"
                    src="{{ $customer->user->avatar ? url('storage/' . $user->avatar) : $defaultAvatarImage }}"
                    alt="Avatar">

                <div class="w-[375px]">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td>: {{ $customer->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $customer->user->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>: {{ $customer->user->username ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Registered At</th>
                            <td>: {{ $customer->created_at ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
