<x-cube.auth.layout title="Edit Wedding">

    <x-cube.back_button url="{{ route('weddings') }}"></x-cube.back_button>

    @if (session('success'))
        <x-cube.alert type="success" message="{{ session('success') }}" class="mt-5"></x-cube.alert>
    @endif

    <section>

        <x-cube.card title="Edit Wedding">

            <form action="{{ route('weddings.update', ['wedding' => $wedding]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7 mb-7">

                    <div class="form-group md:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label class="label">Customer</label>
                        <select class="field select2" name="customer_id">
                            <option selected>Select the customer</option>
                            @foreach ($customers as $customer)
                                <option {{ $wedding->owner_id === $customer->id ? 'selected' : '' }}
                                    value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group md:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label class="label">Wedding Name</label>
                        <input type="text" class="field" name="name" value="{{ $wedding->name }}"
                            placeholder="Enter the groom name . . .">
                        @error('name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Bride's Name</label>
                        <input type="text" class="field" name="brides_name" value="{{ $wedding->brides_name }}"
                            placeholder="Enter the bride name . . .">
                        @error('brides_name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Groom's Name</label>
                        <input type="text" class="field" name="grooms_name" value="{{ $wedding->grooms_name }}"
                            placeholder="Enter the bride name . . .">
                        @error('grooms_name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group" data-te-datepicker-init data-te-input-wrapper-init>
                        <label class="label">Wedding Date</label>
                        <div class="relative">
                            <input type="text" class="field" name="date" placeholder="Select a date"
                                data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref
                                value="{{ date('d/m/Y', strtotime($wedding->date)) }}" />
                        </div>
                        @error('date')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Wedding Hall</label>
                        <input type="text" class="field" name="hall" value="{{ $wedding->hall }}"
                            placeholder="Enter the wedding hall . . .">
                        @error('hall')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group md:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label class="label">Wedding Address</label>
                        <textarea class="field" name="address" rows="3">{{ $wedding->address }}</textarea>
                        @error('address')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </x-cube.card>

    </section>

</x-cube.auth.layout>
