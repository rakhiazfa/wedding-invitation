<x-cube.layout title="Login">

    <main class="max-w-[2560px] mx-auto min-h-screen">

        <section class="min-h-screen lg:grid lg:grid-cols-[500px,1fr] 2xl:grid-cols-[650px,1fr] bg-blue-500">

            <div class="min-h-screen flex justify-center items-center bg-white shadow-lg">

                <div class="w-[450px] 2xl:w-[550px] px-5">

                    <h1 class="text-3xl lg:text-4xl font-semibold mb-5 ml-1">Login</h1>

                    <p class="max-w-[375px] text-gray-400 font-normal mb-7 ml-1">
                        Welcome back, please enter your credentials to continue.
                    </p>

                    <form class="grid gap-7" action="" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="label">Email or Username</label>
                            <input type="text" class="field" name="email_or_username"
                                value="{{ old('email_or_username') }}" placeholder="Enter your email or username . . .">
                            @error('email_or_username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Password</label>
                            <input type="password" class="field" name="password"
                                placeholder="Enter your password . . .">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-2 ml-1">
                            <input type="checkbox" name="remember" id="remember">
                            <label class="text-sm font-normal text-gray-500 select-none" for="remember">
                                Remember me
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                </div>

            </div>

            <div class="hidden lg:block relative w-full h-full">
                <img class="w-full h-full object-cover object-center" src="{{ url('assets/images/wedding.jpg') }}"
                    alt="Wedding Photo">
                <div class="absolute inset-0 bg-[rgba(0,0,0,0.25)]"></div>
            </div>

        </section>

    </main>

</x-cube.layout>
