<form action="{{ route('logout') }}" method="POST" class="d-inline-block">
    @csrf
    <button type="submit" class="flex items-center px-4 py-2 text-white bg-[#f9533b] rounded-lg text-xs font-semibold hover:bg-[#d9452f] focus:outline-none focus:ring-2 focus:ring-[#f9533b] focus:ring-opacity-50">
        <!-- Back Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <!-- Logout Text -->
        Logout
    </button>
</form>
