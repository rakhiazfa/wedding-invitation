<x-cube.auth.layout title="Wedding Details">

    <x-cube.back_button
        url="{{ route('customer.weddings', [
            'username' => request()->route('username'),
        ]) }}">
    </x-cube.back_button>

    @if (session('success'))
        <x-cube.alert type="success" message="{{ session('success') }}" class="mt-5"></x-cube.alert>
    @endif

    <section class="grid grid-cols-1 xl:grid-cols-[1fr,425px] gap-7">

        <x-cube.card title="Wedding Details">

            <table class="table table-sm">
                <tr>
                    <th>Wedding Name</th>
                    <td>: {{ $wedding->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Couple Name</th>
                    <td>: {{ $wedding->couple_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Couple Date</th>
                    <td>: {{ date('d F Y', strtotime($wedding->date ?? '')) }}</td>
                </tr>
                <tr>
                    <th>Wedding Hall</th>
                    <td>: {{ $wedding->hall ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="align-top">Wedding Address</th>
                    <td class="flex items-start gap-x-2 align-top">
                        <span>:</span>
                        <p>{{ $wedding->address ?? '-' }}</p>
                    </td>
                </tr>
            </table>

        </x-cube.card>

        <x-cube.card title="" class="h-max">



        </x-cube.card>

    </section>

    <section class="grid grid-cols-1 gap-7" id="#invitation">

        <x-cube.card title="Invite Guest">

            <form
                action="{{ route('customer.weddings.invitations.invite', [
                    'username' => request()->route('username'),
                    'wedding' => $wedding,
                ]) }}"
                method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-7">

                    <div class="form-group">
                        <label class="label">Guest Name</label>
                        <input type="text" class="field" name="guest_name" value="{{ old('guest_name') }}"
                            placeholder="Enter the guest name . . .">
                        @error('guest_name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary">Invite</button>
                    </div>

                </div>

            </form>

        </x-cube.card>

        <x-cube.card title="Invitations">

            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Guest Name</th>
                            <th>Invitation Link</th>
                            <th>Already Come?</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wedding->invitations as $invitation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $invitation->guest_name }}</th>
                                <td>
                                    <a class="text-blue-500 hover:underline" href="{{ $invitation->callback_link }}"
                                        target="_blank">
                                        {{ $invitation->callback_link }}
                                    </a>
                                </td>
                                <td>
                                    @if ($invitation->is_already_received)
                                        <div
                                            class="w-max bg-emerald-500 text-white text-xs font-medium rounded-full px-2 py-1">
                                            Yes
                                        </div>
                                    @else
                                        <div
                                            class="w-max bg-red-500 text-white text-xs font-medium rounded-full px-2 py-1">
                                            No
                                        </div>
                                    @endif
                                </td>
                                <th>
                                    <div class="table-actions">
                                        <button type="button" class="copy-to-clipboard"
                                            data-value="{{ $invitation->callback_link }}" title="Copy Link">
                                            <i class="uil uil-link text-inherit"></i>
                                        </button>

                                        <button type="button" class="modal-trigger"
                                            data-target="#cancelInvitationModal-{{ $loop->iteration }}" title="Delete">
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </div>
                                </th>
                            </tr>

                            <div class="modal" id="cancelInvitationModal-{{ $loop->iteration }}">
                                <div class="modal-content top">
                                    <div class="header">
                                        <h4>Are you absolutely sure?</h4>
                                    </div>
                                    <form
                                        action="{{ route('customer.weddings.invitations.cancel_invitation', [
                                            'username' => request()->route('username'),
                                            'wedding' => $wedding,
                                            'invitation' => $invitation,
                                        ]) }}"
                                        method="POST" id="cancelInvitationForm-{{ $loop->iteration }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="footer flex justify-end gap-x-5">
                                        <button type="button"
                                            class="btn btn-sm btn-info modal-cancel-trigger">Cancel</button>
                                        <button type="button" class="btn btn-sm btn-border btn-danger form-trigger"
                                            data-target="#cancelInvitationForm-{{ $loop->iteration }}">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
