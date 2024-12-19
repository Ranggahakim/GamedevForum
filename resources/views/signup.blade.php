<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
    <section class="bg-bg dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <h1 class="self-center text-7xl whitespace-nowrap font-jersey font-bold text-text mb-2">GAMEDEV FORUM</h1>
            <h3 class="self-center text-2xl whitespace-nowrap font-jersey font-light text-text mb-12">Sign Up</h3>

            <div class="w-full bg-post rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create Account!
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/signup" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            @error('name')
                                is-invalid
                            @enderror" placeholder="Insert your name" required="" 
                            
                            />

                            @error('name')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</div>
                                
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            @error('username')
                                is-invalid
                            @enderror" placeholder="Insert your username" required="" 
                            />

                            @error('username')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</div>
                                
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            @error('email')
                                is-invalid
                            @enderror" placeholder="Insert your email" required="" 
                            />

                            @error('email')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</div>
                                
                            @enderror
                        </div> 
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            @error('password')
                                is-invalid
                            @enderror" required="" 
                            >

                            @error('password')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</div>
                                
                            @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign Up</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already had account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>    
</body>

</html>
