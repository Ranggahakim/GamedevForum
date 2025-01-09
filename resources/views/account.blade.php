<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
    <x-navbar></x-navbar>

    <hr>
    
    <section class="bg-bg dark:bg-gray-900">
        @if ($status == 'view')
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <section class=" dark:bg-gray-900 w-1/2 mx-auto">
                <div class="py-4 md:py-8 bg-post rounded-md padding px-8">
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-8 lg:gap-16">
                      <div class="space-y-4">
                        <div class="flex space-x-4">
                          <div>
                            <h1 class="flex items-center font-jersey font-bold leading-none text-gray-900 dark:text-white text-4xl">{{ Auth::user()->username }} 
                                <a href="MyProfile/edit"><svg class="w-6 h-6 ml-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                                  </svg>
                                  </a>
                            </h1>
                          </div>
                        </div>
                        <dl class="">
                          <dt class="font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</dt>
                          <dd class="text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</dd>
                        </dl>
                        <dl>
                          <dt class="font-semibold text-gray-900 dark:text-white font-jersey text-2xl">bio</dt>
                          <dd class="flex items-center gap-1 text-gray-500 dark:text-gray-400">
                            {{ Auth::user()->bio }}
                          </dd>
                        </dl>
                        <div class="mt-9">
                            <a href="/create">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Post</button>
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
            </section>

            <br>
            <hr>
            <br>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($threads as $thread)
                <article class="p-6 bg-post rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/categories/{{ $thread->category->slug }}">
                            <span style="background-color: {{ $thread->category->color }}" class="text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                {{ $thread->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $thread->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-3xl font-bold font-jersey tracking-tight text-gray-900 dark:text-white hover:text-primary"><a href="/threads/{{ $thread->slug }}">{{ Str::words($thread->title, 5) }}</a></h2>
                    <p class="mb-5 font-light text-gray-700 dark:text-gray-400">{{ Str::limit($thread->content, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="/author/{{ $thread->author->username }}" class="group">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                <span class="font-medium dark:text-white group-hover:text-primary">
                                    {{ Str::words($thread->author->name, 2) }}
                                </span>
                            </div>
                        </a>
                        <a href="/threads/{{ $thread->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline hover:text-primary">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>  
                @endforeach         
            </div>  
        </div>
        @elseif ($status == 'edit')
        <section class="bg-bg dark:bg-gray-900 text-text h-screen">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                <a href="/MyProfile" class="italic text-lg hover:underline no-underline"><< back</a>
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-text dark:text-white">Edit Profile</h2>
                <form action="/MyProfile" method="POST" class="space-y-8">
                    @csrf
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-text dark:text-text">Username</label>
                        <input type="text" id="username" name="username" class="shadow-sm bg-gray-50 border border-gray-300 text-bg text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" value="{{ Auth::user()->username }}" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="bio" class="block mb-2 text-sm font-medium text-text dark:text-text">bio</label>
                        <textarea id="bio" rows="6" name="bio" class="block p-2.5 w-full text-sm text-bg bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">{{ Auth::user()->bio }}</textarea>
                    </div>
                    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit Profile</button>
                </form>
            </div>
          </section>
        @endif
      </section>

</body>

</html>
