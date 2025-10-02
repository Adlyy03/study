<div class="bg-red-50 border border-red-200 rounded-2xl p-6">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-red-800">
            Delete Account
        </h2>
        <p class="mt-1 text-sm text-red-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </div>

    <button 
        onclick="document.getElementById('deleteModal').classList.remove('hidden')"
        class="px-6 py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-all duration-300 hover:scale-105">
        <i class="fas fa-trash mr-2"></i>
        Delete Account
    </button>

    <!-- Delete Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">
                        Are you sure you want to delete your account?
                    </h2>
                    <p class="text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                    </p>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200 @error('password', 'userDeletion') border-red-500 @enderror">
                    @error('password', 'userDeletion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="document.getElementById('deleteModal').classList.add('hidden')" 
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-all duration-300 hover:scale-105">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
