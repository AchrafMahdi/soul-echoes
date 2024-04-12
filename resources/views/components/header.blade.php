<header class="flex flex-row justify-between items-center bg-gray-800 py-2 px-4 sticky top-0 left-0 w-full z-50">
        <a class="font-bold text-sm md:text-2xl text-gray-50" href="/">Soul Echoes</a>
        <nav class="flex flex-row items-center gap-10">
            <ul class="hidden md:flex flex-row items-center gap-10">
                @guest
                <li class="list-none"><a class="text-gray-50" href="/register">Register</a></li>
                <li class="list-none"><a class="text-gray-50" href="/login">Login</a></li>
                @endguest
                @auth
                <li class="list-none"><a class="text-gray-50" href="/blog">Blog</a></li>
                <li class="list-none"><a class="text-gray-50" href="/profile">Profile</a></li>
                @endauth
                @if (auth()->user()?->id == 1)
                <li class="list-none"><a class="text-gray-50" href="/blogs/create">Create</a></li>                                        
                @endif                
            </ul>            
        </nav>
    </header>