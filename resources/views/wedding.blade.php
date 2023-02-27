<x-cube.auth.layout title="Weddings">

    @if (session('success'))
        <x-cube.alert type="success" message="{{ session('success') }}"></x-cube.alert>
    @endif

    <section>

        <x-cube.card title="Weddings" :actions="[
            [
                'text' => 'Create a new wedding',
                'url' => route('weddings.create'),
            ],
        ]">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Wedding Name</th>
                            <th>Client Name</th>
                            <th>Wedding Date</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weddings as $wedding)
                            <tr>
                                <td>{{ ($weddings->currentPage() - 1) * $weddings->perPage() + $loop->iteration }}</td>
                                <th>{{ $wedding->name ?? '' }}</th>
                                <td>{{ $wedding->owner->name ?? '' }}</td>
                                <th>{{ $wedding->date ?? '' }}</th>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('weddings.show', ['wedding' => $wedding]) }}" title="Detail">
                                            <i class="uil uil-eye"></i>
                                        </a>

                                        <a href="{{ route('weddings.edit', ['wedding' => $wedding]) }}" title="Edit">
                                            <i class="uil uil-pen"></i>
                                        </a>

                                        <button type="button" class="modal-trigger"
                                            data-target="#deleteWeddingModal-{{ $loop->iteration }}" title="Delete">
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal" id="deleteWeddingModal-{{ $loop->iteration }}">
                                <div class="modal-content top">
                                    <div class="header">
                                        <h4>Are you absolutely sure?</h4>
                                    </div>
                                    <form action="{{ route('weddings.destroy', ['wedding' => $wedding]) }}"
                                        method="POST" id="deleteWeddingForm-{{ $loop->iteration }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="footer flex justify-end gap-x-5">
                                        <button type="button"
                                            class="btn btn-sm btn-info modal-cancel-trigger">Cancel</button>
                                        <button type="button" class="btn btn-sm btn-border btn-danger form-trigger"
                                            data-target="#deleteWeddingForm-{{ $loop->iteration }}">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $weddings->links('pagination.tailwind') }}
            </div>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
