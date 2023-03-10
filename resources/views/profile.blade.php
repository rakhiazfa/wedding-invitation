<x-cube.auth.layout title="Profile">

    @if (session('success'))
        <x-cube.alert type="success" message="{{ session('success') }}"></x-cube.alert>
    @endif

    <section class="grid grid-cols-1 md:grid-cols-[1fr,350px] lg:grid-cols-1 xl:grid-cols-[1fr,350px] gap-7">

        <x-cube.card title="Update Profile">

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-7">

                    <div class="form-group">
                        <label class="label">Name</label>
                        <input type="text" class="field" name="name" value="{{ $profile->name }}">
                        @error('name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="text" class="field" name="email" value="{{ $profile->email }}">
                        @error('email')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </x-cube.card>

        <x-cube.card title="Delete Account" class="h-max" titleClass="text-red-500">

            <p class="text-sm text-gray-500 font-normal mb-5 -mt-3">Once you delete your account, there is no going
                back. Please be certain.</p>

            <div class="flex justify-end">
                <button type="button" class="btn btn-sm btn-border btn-danger modal-trigger"
                    data-target="#deleteAccountModal">
                    Delete
                </button>
            </div>

        </x-cube.card>

        <x-cube.card title="Change Password" class="md:col-span-2 lg:col-span-1 xl:col-span-2">

            <form action="{{ route('profile.change_password') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7">

                    <div class="form-group md:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label class="label">Old Passowrd</label>
                        <input type="password" class="field" name="old_password"
                            placeholder="Enter your old password . . .">
                        @error('old_password')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">New Password</label>
                        <input type="password" class="field" name="new_password"
                            placeholder="Enter your new password . . .">
                        @error('new_password')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Confirm New Password</label>
                        <input type="password" class="field" name="new_password_confirmation"
                            placeholder="Confirm your new password . . .">
                    </div>

                </div>

                <div class="flex justify-end mt-10">
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>

        </x-cube.card>

    </section>

    <div class="modal" id="deleteAccountModal">
        <div class="modal-content top">
            <div class="header">
                <h4>Are you absolutely sure?</h4>
            </div>
            <div class="body">
                <form action="{{ route('profile.destroy') }}" method="POST" id="deleteAccountForm">
                    @csrf
                    @method('DELETE')

                    <div class="form-group">
                        <label class="label">Confirm Your Email</label>
                        <input type="text" class="field" name="email_confirmation"
                            placeholder="Please confirm your email . . .">
                        @error('email_confirmation')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="footer flex justify-end gap-x-5">
                <button type="button" class="btn btn-sm btn-info modal-cancel-trigger">Cancel</button>
                <button type="button" class="btn btn-sm btn-border btn-danger form-trigger"
                    data-target="#deleteAccountForm">
                    Delete
                </button>
            </div>
        </div>
    </div>

</x-cube.auth.layout>
