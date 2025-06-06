<x-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-fit min-h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img src="{{ asset('storage/images/logo-text-white.png') }}" class="max-h-16 mb-3 dark:block hidden"
                    alt="Logo">
                <img src="{{ asset('storage/images/logo-text-dark.png') }}" class="max-h-16 mb-3 dark:hidden"
                    alt="Logo">
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="text-center">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login ke Akun Anda
                        </h1>
                    </div>
                    @if (session('status'))
                        <div class="text-center">
                            <h1 class="text-base font-bold leading-tight tracking-tight text-green-500">
                                {{ session('status') }}
                                {{-- Informasi Profil Anda Berhasil Diperbarui --}}
                            </h1>
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tuliskan email anda..." required="" value="{{ old('email') }}">
                            @error('email')
                                <?php
                                if ($message === 'These credentials do not match our records.') {
                                    $alert = 'Email/Password yang anda masukkan tidak sesuai';
                                }
                                ?>
                                <span class="text-sm text-red-500 mt-1" role="alert">
                                    <strong>{{ $alert }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" minlength="8" name="password" id="password"
                                placeholder="Tuliskan password anda..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('password')
                                <p class="text-sm text-red-500 mt-1">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" name="remember"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Lupa password?
                            </a>
                        </div>
                        <button type="submit"
                            class="w-full font-bold text-base text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Login
                        </button>

                        <div class="align-center">
                            <a href="{{ route('auth.google') }}"
                                class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                                <!-- SVG di awal -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M3.06364 7.50914C4.70909 4.24092 8.09084 2 12 2C14.6954 2 16.959 2.99095 18.6909 4.60455L15.8227 7.47274C14.7864 6.48185 13.4681 5.97727 12 5.97727C9.39542 5.97727 7.19084 7.73637 6.40455 10.1C6.2045 10.7 6.09086 11.3409 6.09086 12C6.09086 12.6591 6.2045 13.3 6.40455 13.9C7.19084 16.2636 9.39542 18.0227 12 18.0227C13.3454 18.0227 14.4909 17.6682 15.3864 17.0682C16.4454 16.3591 17.15 15.3 17.3818 14.05H12V10.1818H21.4181C21.5364 10.8363 21.6 11.5182 21.6 12.2273C21.6 15.2727 20.5091 17.8363 18.6181 19.5773C16.9636 21.1046 14.7 22 12 22C8.09084 22 4.70909 19.7591 3.06364 16.4909C2.38638 15.1409 2 13.6136 2 12C2 10.3864 2.38638 8.85911 3.06364 7.50914Z">
                                    </path>
                                </svg>
                                Login dengan Google
                            </a>
                        </div>



                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum memiliki akun?
                            <a href="/register"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Register disini
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
