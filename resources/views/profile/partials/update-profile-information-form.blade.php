<div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg p-6">
    <div class="mb-6">
        <h2 class="text-xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent">
            Update Profile Information
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror" 
                       required autofocus autocomplete="name">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror" 
                       required autocomplete="username">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-sm text-yellow-800">
                            Your email address is unverified.
                            <button form="send-verification" class="underline text-sm text-yellow-600 hover:text-yellow-800 font-medium">
                                Click here to re-send the verification email.
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                A new verification link has been sent to your email address.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                <i class="fas fa-save mr-2"></i>
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-600 font-medium">
                    <i class="fas fa-check-circle mr-1"></i>
                    Saved successfully!
                </p>
            @endif
        </div>
    </form>
</div>
