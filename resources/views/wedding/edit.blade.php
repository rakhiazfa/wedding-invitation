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
                                <option {{ old('customer_id', $wedding->owner_id) == $customer->id ? 'selected' : '' }}
                                    value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Nama Pengantin Pria</label>
                        <input type="text" class="field" name="grooms_name"
                            value="{{ old('grooms_name', $wedding->grooms_name) }}"
                            placeholder="Enter the groom name . . .">
                        @error('grooms_name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Nama Pengantin Wanita</label>
                        <input type="text" class="field" name="brides_name"
                            value="{{ old('brides_name', $wedding->brides_name) }}"
                            placeholder="Enter the bride name . . .">
                        @error('brides_name')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Orang Tua Pengantin Pria</label>
                        <input type="text" class="field" name="grooms_parents"
                            value="{{ old('grooms_parents', $wedding->grooms_parents) }}"
                            placeholder="Enter the groom's parents name . . .">
                        @error('grooms_parents')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Orang Tua Pengantin Wanita</label>
                        <input type="text" class="field" name="brides_parents"
                            value="{{ old('brides_parents', $wedding->grooms_parents) }}"
                            placeholder="Enter the bride's parents name . . .">
                        @error('brides_parents')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Tanggal Pernikahan</label>
                        <div class="relative">
                            <div data-te-datepicker-init data-te-input-wrapper-init>
                                <input type="text" class="field" name="date" placeholder="Select a date"
                                    data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref
                                    value="{{ old('date', $wedding->date) }}" />
                            </div>
                        </div>
                        @error('date')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Waktu Mulai</label>
                        <input type="time" class="field" name="time_start"
                            value="{{ old('time_start', $wedding->time_start) }}"
                            placeholder="Enter the wedding start time . . .">
                        @error('time_start')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Waktu Selesai</label>
                        <input type="time" class="field" name="time_finish"
                            value="{{ old('time_finish', $wedding->time_finish) }}"
                            placeholder="Enter the wedding finish time . . .">
                        @error('time_finish')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Gedung Pernikahan</label>
                        <input type="text" class="field" name="hall" value="{{ old('hall', $wedding->hall) }}"
                            placeholder="Enter the wedding hall . . .">
                        @error('hall')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group md:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label class="label">Alamat Pernikahan</label>
                        <textarea class="field" name="address" rows="3">{{ old('address', $wedding->address) }}</textarea>
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
