<x-guest-layout>
    <div class="h-screen md:flex">
        <!-- Left side -->
        <div class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 justify-around items-center hidden">
            <div>
                <h1 class="text-white font-bold text-4xl font-sans">GoFinance</h1>
                <p class="text-white mt-1">The most popular peer to peer lending at SEA</p>
                <button type="button" class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">Read More</button>
            </div>
            <!-- Decorative circles -->
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>

        <!-- Right side -->
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            <form method="POST" action="{{ route('register') }}" class="bg-white w-full max-w-md px-6">
                @csrf

                <h1 class="text-gray-800 font-bold text-2xl mb-1">Create Account</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Register to get started</p>

                <!-- Name -->
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <x-text-input id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name"
                        placeholder="Full name"
                        class="pl-2 outline-none border-none w-full bg-transparent"/>
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 mb-2" />

                <!-- Email -->
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <x-text-input id="email" name="email" type="email" :value="old('email')" required autocomplete="username"
                        placeholder="Email Address"
                        class="pl-2 outline-none border-none w-full bg-transparent"/>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 mb-2" />

                <!-- Password -->
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <x-text-input id="password" name="password" type="password" required autocomplete="new-password"
                        placeholder="Password"
                        class="pl-2 outline-none border-none w-full bg-transparent"/>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 mb-2" />

                <!-- Confirm Password -->
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                              clip-rule="evenodd"/>
                    </svg>
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                        placeholder="Confirm Password"
                        class="pl-2 outline-none border-none w-full bg-transparent"/>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 mb-2" />

                <!-- Submit Button -->
                <button type="submit"
                        class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">
                    Register
                </button>

                <div class="text-sm text-center mt-2">
                    Already registered?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
