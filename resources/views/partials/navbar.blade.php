<nav class="bg-sky-900 px-12 py-2 sticky top-0 w-full flex items-center justify-evenly">
    <div class="space-x-4 p-1">
        <a href="{{ route('home') }}" class="text-white hover:font-bold" aria-current="page">Home</a>
    </div>
    @auth
    <div class="space-x-4 p-1 flex ml-2 place-self-start items-center w-fit">
        <form action={{route('logout')}} method="post">
            @csrf
            <button type="submit" class="text-white hover:font-bold">Logout</button>
        </form>
    </div>
    @else
    <div class="space-x-4 w-1/5 place-self-end">
        <button class="py-1 px-2 border rounded-md hover:font-bold"><a href="{{ route('login') }}" class="text-white">Login</a></button>
        <button class="py-1 px-2 border rounded-md hover:font-bold"><a href="{{ route('register') }}" class="text-white">Register</a></button>
    </div>
    @endauth
</nav>
