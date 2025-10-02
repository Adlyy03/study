<div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg p-6">
    <div class="mb-6">
        <h2 class="text-xl font-bold bg-gradient-to-r from-[#977DFF] to-[#000C9E] bg-clip-text text-transparent">
            Update Password
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="update_password_current_password" class="block text-sm font-semibold text-gray-700 mb-2">Current Password</label>
                <input id="update_password_current_password" name="current_password" type="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('current_password', 'updatePassword') border-red-500 @enderror" 
                       autocomplete="current-password">
                @error('current_password', 'updatePassword')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="update_password_password" class="block text-sm font-semibold text-gray-700 mb-2">New Password</label>
                    <input id="update_password_password" name="password" type="password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('password', 'updatePassword') border-red-500 @enderror" 
                           autocomplete="new-password">
                    @error('password', 'updatePassword')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="update_password_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#977DFF] focus:border-transparent transition-all duration-200 @error('password_confirmation', 'updatePassword') border-red-500 @enderror" 
                           autocomplete="new-password">
                    @error('password_confirmation', 'updatePassword')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                <i class="fas fa-key mr-2"></i>
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600 font-medium">
                    <i class="fas fa-check-circle mr-1"></i>
                    Password updated successfully!
                </p>
            @endif
        </div>
    </form>
</div>
