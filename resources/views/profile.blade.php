<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vargazs - Profile</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="style.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="fixed flex justify-between xl:justify-center w-full pb-3 pt-9 px-4 xl:px-0 gap-4 xl:gap-7 bg-white flex-wrap xl:flex-nowrap z-40">
        <a href="" class="mt-2 ml-5 block xl:hidden" id="menu-toggle">
            <i class="fa-solid fa-bars xl:hidden sm:block text-2xl"></i>
        </a>
        <div class="xl:ml-56 md:block hidden xl:w-full xl:max-w-5xl relative flex md:ml-5 md:w-[450px]">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" class="w-full border border-gray-400 pl-12 py-3 pr-3 rounded focus:outline-none" placeholder="Search">
        </div>

        <div class="flex items-center gap-4 mr-5 xl:mr-0">
            {{-- Cek apakah user sudah login --}}
            @auth
                {{-- Nama Pengguna --}}
                <span>{{ Auth::user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="w-8 h-8 rounded-full">

                {{-- Dropdown Profile (Opsional, jika ingin lebih kompleks) --}}
            @else
                {{-- Jika tidak login, tampilkan tombol login/register (harusnya tidak terjadi di dashboard) --}}
                <a href="{{ route('login') }}" class="bg-blue-500 px-5 py-3 rounded-md text-white transition-all duration-300 hover:bg-transparent hover:text-blue-500 hover:border-blue-500 border">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-5 py-3 rounded-md text-black transition-all duration-300 hover:bg-gray-200">Sign Up</a>
                @endif
            @endauth
        </div>
    </nav>

    <div class="xl:block hidden xl:fixed xl:top-0 xl:left-0 xl:z-50 xl:h-screen xl:border-r xl:border-gray-400 xl:w-1/6 xl:px-6 xl:py-4 xl:bg-white">
        <p class="hero-title flex justify-center pt-7 font-bold text-3xl">vargazs</p>

        <div class="mt-16">
            <a href="{{ url('/dashboard') }}" class="flex items-center justify-start gap-3 mb-11 ml-20 text-lg transition-all duration-300 hover:text-gray-500 @if(Request::is('dashboard')) @endif">
                <i class="fa-solid fa-house text-xl"></i>
                <p>Home</p>
            </a>
            <a href="{{ route('explore') }}" class="flex items-center justify-start gap-3 mb-11 ml-20 text-lg transition-all duration-300 hover:text-gray-500 @if(Request::is('explore') || Request::is('posts')) border-b border-black @endif">
                <i class="fa-solid fa-compass text-xl"></i>
                <p>Explore</p>
            </a>
            <a href="{{ route('notifications') }}" class="flex items-center justify-start gap-3 mb-11 ml-20 text-lg transition-all duration-300 hover:text-gray-500">
                <i class="fa-solid fa-bell text-xl"></i>
                <p>Notification</p>
            </a>
            <a href="{{ route('post.saved') }}" class="flex items-center justify-start gap-3 mb-11 ml-20 text-lg transition-all duration-300 hover:text-gray-500">
                <i class="fa-solid fa-bookmark text-xl"></i>
                <p>Saved</p>
            </a>
            <a href="{{ route('posts.create') }}" class="flex items-center justify-start gap-3 mb-11 ml-20 text-lg transition-all duration-300 hover:text-gray-500 @if(Request::is('posts/create')) border-b border-black @endif">
                <i class="fa-solid fa-arrow-up-from-bracket text-xl"></i>
                <p>Post</p>
            </a>
        </div>

        <div class="absolute bottom-10 left-6 w-full"> {{-- Sesuaikan posisi ini dengan layout Anda --}}
            <a href="{{ route('my-profile') }}" class="flex items-center justify-start gap-3 mb-11 ml-20 text-lg transition-all duration-300 hover:text-gray-500 @if(Request::is('profile')) border-b border-black @endif">
                <i class="fa-solid fa-user-circle text-xl"></i> {{-- Icon untuk Profile, Anda bisa ganti --}}
                <p class="border-b border-black transition-all duration-300 hover:border-gray-500">Profile</p>
            </a>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-40">
        <!-- Profile Section -->
        <div class="flex items-center space-x-6 mb-10">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="w-24 h-24 rounded-full">
            <div>
                <h2 class="text-2xl font-bold text-black">{{ Auth::user()->name }}</h2>
                <div class="flex space-x-4 mt-2">
                    <a href="profile" class="px-4 py-2 bg-blue-500 text-white rounded-md">Edit Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-4 py-2 bg-red-500 text-white rounded-md">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- User's Posts -->
        <h3 class="text-3xl font-semibold mb-3 text-black">Your Posts</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            @foreach ($posts as $post)
                <div class="bg-white rounded-xl mb-4">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-52 rounded-t-lg">
                        <div class="flex items-center">
                            <div class="flex items-center gap-2 mt-3">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="w-8 h-8 rounded-full">
                                <span class="font-bold">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="flex items-center space-x-3 ml-auto text-gray-400">
                                <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="1"> <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                    <span class="text-sm font-medium like-count">0</span>
                                </button>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-eye"></i>
                                    <p>1</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    @if (Auth::id() === $post->user_id)
                        <div class="flex justify-between mt-2">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <footer class="w-5/6 absolute right-0 bg-white border-t border-dashed border-gray-300 text-sm text-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
            <div>
            <h1 class="text-2xl font-semibold hero-title">vargazs.</h1>
            </div>
            <div>
            <ul class="space-y-1">
                <li>Website</li>
                <li>Inspiration</li>
                <li>Elements</li>
            </ul>
            </div>
            <div>
            <ul class="space-y-1">
                <li>Home</li>
                <li>Explore</li>
                <li>Notification</li>
            </ul>
            </div>
            <div>
            <ul class="space-y-1">
                <li>Saved</li>
                <li>Upload</li>
            </ul>
            </div>
            <div>
            <ul class="space-y-1">
                <li>FAQs</li>
                <li>About Us</li>
                <li>Contact Us</li>
            </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center py-5 border-t border-dashed border-gray-300 text-xs text-gray-600">
            <p>© Copyright 2050</p>
            <div class="flex items-center gap-6 mt-2 md:mt-0">
            <div class="bg-gray-100 px-4 py-2 rounded text-gray-800 text-sm">Jakarta, Indonesia</div>
            <div class="flex items-center gap-2">
                <span class="font-semibold text-black">Connect:</span>
                <a href="#" class="hover:underline">Instagram</a>
                <a href="https://youtu.be/dQw4w9WgXcQ?si=KokLdieVsfaUm4nz" class="hover:underline">Youtube</a>
                <a href="#" class="hover:underline">Linkedin</a>
            </div>
            </div>
        </div>
    </footer>
</body>
</html>