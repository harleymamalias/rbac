@extends('mainLayout')

@section('page-title', 'Manage Users')

@section('page-content')
@vite('resources/css/app.css')
<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    .content {
        display: flex;
        flex: 1;
    }

    .main-content {
        flex: 1;
        padding: 15px;
    }
</style>

<!-- Main Content -->
<div class="content">
    <!-- Sidebar -->
    <aside class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r dark:bg-gray-900 dark:border-gray-700">
        <a href="#" class="mx-auto">
            <img class="w-auto h-8 sm:h-9 md:h-12 lg:h-16 xl:h-20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="">
        </a>

        <div class="flex flex-col items-center mt-6 -mx-2">
            <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
            @if(Auth::check())
            <div class="mx-2 mt-2">
                <h4 class="font-medium text-gray-800 dark:text-gray-200">
                    {{ Auth::user()->userInfo->user_firstname . ' ' . Auth::user()->userInfo->user_lastname }}
                </h4>
                <p class="mt-1 text-sm font-medium text-gray-600 dark:text-white">
                    {{ Auth::user()->email }}
                </p>
                <hr>
                <p class="mt-2 text-sm justify-center flex font-medium text-gray-600 dark:text-gray-400">
                    <span class="fs-6 font-bold">
                        @if(Auth::user()->hasRole('admin'))
                        Admin User
                        @else
                        : User
                        @endif
                    </span>
                </p>
            </div>
            @endif

        </div>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav>
                <a class="flex items-center px-4 py-2 text-white rounded-lg bg-[#f94d2d] dark:text-white-200" href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Accounts</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Tickets</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Settings</span>
                </a>
                <a class="flex items-center px-4 py-2 mt-12 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-[#f94d2d] hover:text-white" href="#" onclick="document.getElementById('logout-form').submit();">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 17L21 12M21 12L16 7M21 12H9M13 7V5C13 4.46957 12.7893 3.96086 12.4142 3.58579C12.0391 3.21071 11.5304 3 11 3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H11C11.5304 21 12.0391 20.7893 12.4142 20.4142C12.7893 20.0391 13 19.5304 13 19V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="mx-4 font-medium">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="main-content bg-white p-6 rounded-lg shadow-lg">
        <div class="card">
            <h1 class="text-2xl font-bold mb-4">Manage Users</h1>
            @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
            @endif
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 light:bg-gray-800">
                    <tr>
                        <th rowspan="2" class="border p-2">ID</th>
                        <th rowspan="2" class="border p-2">Username</th>
                        <th rowspan="2" class="border p-2">Email</th>
                        <th rowspan="2" class="border p-2">Roles</th>
                        <th rowspan="2" class="border p-2">Permissions</th>
                        <th colspan="{{ count($roles) }}" class="border p-2">Roles</th>
                        <th rowspan="2" class="border p-2">Update Roles</th>
                    </tr>
                    <tr>
                        @foreach($roles as $role)
                        <th class="border p-2">{{ $role->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->id }}</td>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">
                            @foreach($user->roles as $role)
                            {{ $role->name }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td class="border p-2">
                            @foreach($user->permissions as $permission)
                            {{ $permission->name }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <!-- Update Roles Form -->
                        <form action="{{ route('assign.roles', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @foreach($roles as $role)
                            <td class="border p-2">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{
                                    $user->roles->contains($role) ? 'checked' : '' }} class="form-checkbox">
                            </td>
                            @endforeach

                            <td class="border p-2">
                                <div class="flex items-center justify-center">
                                    <button type="submit" class="flex items-center bg-teal-600 text-white px-2 py-2 rounded hover:bg-teal-500">
                                        <!-- Edit Pen Icon -->
                                        <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 17.25V21H6.75L17.175 10.575L13.425 6.825L3 17.25Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.675 5.325L18.675 8.325" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Update Roles
                                    </button>
                                </div>
                            </td>

                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                function openModal(userId) {
                    document.getElementById(`modal-${userId}`).classList.remove('hidden');
                }

                function closeModal(userId) {
                    document.getElementById(`modal-${userId}`).classList.add('hidden');
                }
            </script>


            @endsection