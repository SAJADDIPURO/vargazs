<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vargazs - Dashboard</title>
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
                <p class="border-b border-black transition-all duration-300 hover:border-gray-500">Home</p>
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
                <p>Profile</p>
            </a>
        </div>
    </div>

    <div class="ml-1/6 pt-72"> 
        <section class="bg-white pt-44 pb-80 pl-8 xl:pl-32">
            <div class="container mx-auto text-center">
                <p class="text-sm text-black font-semibold tracking-wider mb-2">Our Capital, Your <span class="bg-blue-500 text-white rounded-full px-2 py-1">Success</span></p>
                <h1 class="hero-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-bold text-gray-800 mb-8">
                    Fueling the Future <br> with <span class="italic">Creativity.</span>
                </h1>
                <a href="#" class="border border-black rounded-full py-3 px-8 font-semibold hover:bg-black hover:text-white transition-colors duration-300">
                    Find Inspiration
                    <i class="fa-solid fa-arrow-right ml-2 bg-blue-500 text-white rounded-full p-2 align-middle"></i>
                </a>
            </div>
        </section>

        <section class="py-16 px-4 sm:px-8 md:px-12 lg:px-24 xl:py-96 xl:pl-96">
            <div class="mx-auto text-left">
                <p class="text-sm text-black font-semibold tracking-wider mb-2">Trending</p>
                <h1 class="w-full text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:w-1/2 xl:text-6xl font-bold text-gray-800">Recent Inspiration of the Day.</h1>
            </div>

            <div class="flex gap-7 flex-wrap justify-center sm:justify-start">
                <div class="mt-14 space-y-4 w-full sm:w-[calc(50%-0.875rem)] md:w-[calc(50%-0.875rem)] lg:w-[calc(50%-0.875rem)] xl:w-[430px]">
                    <img src="{{ asset('images/trending-img/trending-img-1.png') }}" alt="Trending Image 1" class="w-full">

                    <div class="flex items-center w-full xl:w-[430px]">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-9">
                            <p class="text-sm text-black font-semibold">Lamine Yamal</p>
                        </div>
                        <div class="flex items-center ml-5 bg-gray-300 px-3 rounded-sm">
                            <p class="font-bold text-white text-sm">TEAM</p>
                        </div>

                        <div class="flex items-center space-x-3 ml-auto text-gray-400">
                            <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="1">
                                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                <span class="text-sm font-medium like-count">0</span>
                            </button>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-eye"></i>
                                <p>13k</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 space-y-4 w-full sm:w-[calc(50%-0.875rem)] md:w-[calc(50%-0.875rem)] lg:w-[calc(50%-0.875rem)] xl:w-[430px]">
                    <img src="{{ asset('images/trending-img/trending-img-2.png') }}" alt="Trending Image 2" class="w-full">
                    <div class="flex items-center w-full xl:w-[430px]">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-9">
                            <p class="text-sm text-black font-semibold">Kapten Modric</p>
                        </div>
                        <div class="flex items-center ml-5 bg-gray-300 px-3 rounded-sm">
                            <p class="font-bold text-white text-sm">TEAM</p>
                        </div>

                        <div class="flex items-center space-x-3 ml-auto text-gray-400">
                            <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="2">
                                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                <span class="text-sm font-medium like-count">10</span>
                            </button>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-eye"></i>
                                <p>13k</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 space-y-4 w-full sm:w-[calc(50%-0.875rem)] md:w-[calc(50%-0.875rem)] lg:w-[calc(50%-0.875rem)] xl:w-[430px]">
                    <img src="{{ asset('images/trending-img/trending-img-3.png') }}" alt="Trending Image 3" class="w-full">
                    <div class="flex items-center w-full xl:w-[430px]">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-9">
                            <p class="text-sm text-black font-semibold">Billie Elish</p>
                        </div>
                        <div class="flex items-center ml-5 bg-gray-300 px-3 rounded-sm">
                            <p class="font-bold text-white text-sm">TEAM</p>
                        </div>

                        <div class="flex items-center space-x-3 ml-auto text-gray-400">
                            <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="3">
                                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                <span class="text-sm font-medium like-count">100</span>
                            </button>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-eye"></i>
                                <p>13k</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 space-y-4 w-full sm:w-[calc(50%-0.875rem)] md:w-[calc(50%-0.875rem)] lg:w-[calc(50%-0.875rem)] xl:w-[430px]">
                    <img src="{{ asset('images/trending-img/trending-img-4.png') }}" alt="Trending Image 4" class="w-full">
                    <div class="flex items-center w-full xl:w-[430px]">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-9">
                            <p class="text-sm text-black font-semibold">Donald T.</p>
                        </div>
                        <div class="flex items-center ml-5 bg-gray-300 px-3 rounded-sm">
                            <p class="font-bold text-white text-sm">TEAM</p>
                        </div>

                        <div class="flex items-center space-x-3 ml-auto text-gray-400">
                            <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="4">
                                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                <span class="text-sm font-medium like-count">230</span>
                            </button>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-eye"></i>
                                <p>13k</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 space-y-4 w-full sm:w-[calc(50%-0.875rem)] md:w-[calc(50%-0.875rem)] lg:w-[calc(50%-0.875rem)] xl:w-[430px]">
                    <img src="{{ asset('images/trending-img/trending-img-5.png') }}" alt="Trending Image 5" class="w-full">
                    <div class="flex items-center w-full xl:w-[430px]">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-9">
                            <p class="text-sm text-black font-semibold">Bro Nalisa</p>
                        </div>
                        <div class="flex items-center ml-5 bg-gray-300 px-3 rounded-sm">
                            <p class="font-bold text-white text-sm">TEAM</p>
                        </div>

                        <div class="flex items-center space-x-3 ml-auto text-gray-400">
                            <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="5">
                                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                <span class="text-sm font-medium like-count">809</span>
                            </button>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-eye"></i>
                                <p>13k</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-14 space-y-4 w-full sm:w-[calc(50%-0.875rem)] md:w-[calc(50%-0.875rem)] lg:w-[calc(50%-0.875rem)] xl:w-[430px]">
                    <img src="{{ asset('images/trending-img/trending-img-6.png') }}" alt="Trending Image 6" class="w-full">
                    <div class="flex items-center w-full xl:w-[430px]">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-9">
                            <p class="text-sm text-black font-semibold">AKIRA RWB</p>
                        </div>
                        <div class="flex items-center ml-5 bg-gray-300 px-3 rounded-sm">
                            <p class="font-bold text-white text-sm">TEAM</p>
                        </div>

                        <div class="flex items-center space-x-3 ml-auto text-gray-400">
                            <button class="flex items-center gap-1 focus:outline-none like-button" data-post-id="6">
                                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer"></i>
                                <span class="text-sm font-medium like-count">999</span>
                            </button>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-eye"></i>
                                <p>13k</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 

    <footer class="bg-white border-t border-dashed border-gray-300 text-sm text-gray-700 xl:absolute xl:w-5/6 xl:right-0">
        <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

            <div class="col-span-full lg:col-span-1">
                <h1 class="text-2xl font-semibold hero-title">vargazs.</h1>
            </div>

            <div class="lg:col-span-1">
                <ul class="space-y-1">
                    <li>Website</li>
                    <li>Inspiration</li>
                    <li>Elements</li>
                </ul>
            </div>

            <div class="lg:col-span-1">
                <ul class="space-y-1">
                    <li>Home</li>
                    <li>Explore</li>
                    <li>Notification</li>
                </ul>
            </div>

            <div class="lg:col-span-1">
                <ul class="space-y-1">
                    <li>Saved</li>
                    <li>Upload</li>
                </ul>
            </div>

            <div class="col-span-full md:col-span-1 lg:col-span-1">
                <ul class="space-y-1">
                    <li>FAQs</li>
                    <li>About Us</li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center py-5 border-t border-dashed border-gray-300 text-xs text-gray-600">
            <p>© Copyright 2050</p>
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 mt-2 md:mt-0">
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

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const likeButtons = document.querySelectorAll(".like-button");

        likeButtons.forEach(button => {
            button.addEventListener("click", function () {
                const icon = this.querySelector("i");
                const countSpan = this.querySelector(".like-count");
                let count = parseInt(countSpan.textContent);

                if (icon.classList.contains("fa-regular")) {
                    icon.classList.remove("fa-regular");
                    icon.classList.add("fa-solid", "text-red-500");
                    countSpan.textContent = count + 1;
                } else {
                    icon.classList.remove("fa-solid", "text-red-500");
                    icon.classList.add("fa-regular");
                    countSpan.textContent = count - 1;
                }
            });
        });
    });
</script>

</body>
</html>