@props(['categories'])

<div>
    <nav class="bg-bg text-text dark:bg-gray-900 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-4xl whitespace-nowrap font-jersey font-bold ">GAMEDEV
                    FORUM</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-accent divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm font-bold text-text dark:text-white">{{ Auth::user()->name }}</span>
                        <span class="block text-sm italic  text-text truncate">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        @if (Auth::user()->isAdmin == false)
                            <li>
                                <a href="/MyProfile"
                                    class="block px-4 py-2 text-sm text-text hover:text-primary dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="/create"
                                    class="block px-4 py-2 text-sm text-text hover:text-primary dark:hover:bg-gray-600 dark:hover:text-white">Post</a>
                            </li>
                            
                        @endif
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button
                                class="block px-4 py-2 w-max text-text hover:text-primary dark:hover:bg-gray-600 dark:hover:text-white">Log
                                out</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-text rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-textrounded md:bg-transparent md:p-0 md:dark:text-blue-500 {{ request()->is('home') ? 'text-primary' : 'text-text' }} "
                            aria-current="{{ request()->routeIs('/') ? 'page' : false }}">Home</a>
                    </li>
                    @if (Auth::user()->isAdmin == false)
                        <li>
                            <div class="flex items-center w-full space-x-3 md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="block py-2 px-3 {{ request()->is('categories') ? 'text-primary' : 'text-text' }} rounded hover:text-primary md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="{{ request()->is('categories') ? 'page' : false }}">Categories</button>
                                    
                                    <div id="actionsDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                        @foreach ($categories as $category)
                                        <li>
                                            <a href="/categories/{{ $category->slug }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</a>
                                          </li>
                                        @endforeach
                                      </ul>
                                    </div>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-text rounded hover:text-primary md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Explore</a>
                        </li>
                    @else
                        <li>
                            <a href="/reportedThread"
                                class=" {{ request()->routeIs('reportedThread') ? 'text-primary' : 'text-text' }} block py-2 px-3 rounded hover:text-primary md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="{{ request()->routeIs('reportedThread') ? 'page' : false }}">Reported</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
