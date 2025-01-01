@extends('layouts.admin')

@section('content')
   

    <div class="min-h-screen bg-gray-100 py-12">
        
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white text-center">Update User Profile</h2>
            </div>
            @if (session('success'))
                <div id="alert success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <i class="fa fa-check-circle">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </i>

                </div>
            @endif
            @if (session('error'))
                <div id="alert error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <i class="fa fa-times-circle">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </i>

                </div>
            @endif
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="px-6 py-8 space-y-6">
                <!-- CSRF Token -->
                <div class="mb-4 flex justify-start items-center gap-4 text-gray-600 bg-blue-100 px-4 py-2 rounded-md">
                    <a href="{{ route('admin.user.list') }}"
                        class="text-blue-600 hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Back
                    </a>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-semibold text-gray-800">
                        Full Name
                    </label>
                    <div class="relative">
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-900
                                  focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out"
                            placeholder="Enter your name" required />
                    </div>
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-gray-800">
                        Email Address
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-900
                                  focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out"
                            placeholder="Enter your email" required />
                    </div>
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-gray-800">
                        New Password
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-900
                                  focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 ease-in-out"
                            placeholder="Enter new password (optional)" />
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Leave blank to keep current password</p>
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4 space-y-2 text-right border-t text-white border-gray-200">
                    <button type="submit"
                        class="w-full inline-flex items-center justify-center text-white bg-gradient-to-r from-indigo-600 to-blue-600 py-3 px-6 rounded-md font-medium hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform transition-all duration-150 ease-in-out hover:shadow-lg active:scale-95">
                        Update Profile
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script>
        const alert_success = document.getElementById('alert success');
        setTimeout(() => {
            alert_success.style.display = 'none';
        }, 3000);
    </script>
@endsection
