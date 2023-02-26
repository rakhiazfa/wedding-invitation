<x-cube.auth.layout title="Register a new customer">

    <x-cube.back_button url="{{ route('customers') }}"></x-cube.back_button>

    <section>

        <x-cube.card title="Register a new customer">

            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7 mb-7">

                    <div class="form-group">
                        <label class="label">Customer Name</label>
                        <input type="text" class="field" name="name" value="{{ old('name') }}"
                            placeholder="Enter the customer name . . .">
                        @error('name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Customer Username</label>
                        <input type="text" class="field" name="username" value="{{ old('username') }}"
                            placeholder="Enter the customer username . . .">
                        @error('username')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group md:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label class="label">Customer Email</label>
                        <input type="text" class="field" name="email" value="{{ old('email') }}"
                            placeholder="Enter the customer email . . .">
                        @error('email')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Customer Password</label>
                        <input type="password" class="field" name="password"
                            placeholder="Enter the customer password . . .">
                        @error('password')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Confirm Customer Password</label>
                        <input type="password" class="field" name="password_confirmation"
                            placeholder="Confirm the customer password . . .">
                    </div>

                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

            </form>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
