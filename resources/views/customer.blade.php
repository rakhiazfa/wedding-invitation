<x-cube.auth.layout title="Customers">

    @if (session('success'))
        <x-cube.alert type="success" message="{{ session('success') }}"></x-cube.alert>
    @endif

    <section>

        <x-cube.card title="Customers" :actions="[
            [
                'text' => 'Register a new customer',
                'url' => route('customers.create'),
            ],
        ]">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Username</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    {{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}
                                </td>
                                <th>{{ $customer->name ?? '-' }}</th>
                                <td>{{ $customer->user->email ?? '-' }}</td>
                                <td>{{ $customer->user->username ?? '' }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('weddings.create', ['customer' => $customer]) }}"
                                            title="Make a wedding">
                                            <i class="uil uil-heart"></i>
                                        </a>

                                        <a href="{{ route('customers.show', ['customer' => $customer]) }}" title="Detail">
                                            <i class="uil uil-eye"></i>
                                        </a>

                                        <a href="{{ route('customers.edit', ['customer' => $customer]) }}"
                                            title="Edit">
                                            <i class="uil uil-pen"></i>
                                        </a>

                                        <button type="button" class="modal-trigger"
                                            data-target="#deleteCustomerModal-{{ $loop->iteration }}" title="Delete">
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal" id="deleteCustomerModal-{{ $loop->iteration }}">
                                <div class="modal-content top">
                                    <div class="header">
                                        <h4>Are you absolutely sure?</h4>
                                    </div>
                                    <form action="{{ route('customers.destroy', ['customer' => $customer]) }}"
                                        method="POST" id="deleteCustomerForm-{{ $loop->iteration }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="footer flex justify-end gap-x-5">
                                        <button type="button"
                                            class="btn btn-sm btn-info modal-cancel-trigger">Cancel</button>
                                        <button type="button" class="btn btn-sm btn-border btn-danger form-trigger"
                                            data-target="#deleteCustomerForm-{{ $loop->iteration }}">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5 px-1">
                {{ $customers->links('pagination.tailwind') }}
            </div>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
