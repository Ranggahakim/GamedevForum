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
    <x-navbar :categories="$categories"></x-navbar>

    <hr>
    
    <section class="bg-bg dark:bg-gray-900 min-h-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            
        @if (Auth::user()->isAdmin == false)
            
        @if ($pageTitle == 'Home Page')
        
        <section class=" dark:bg-gray-900">
            <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                <article class="p-6 bg-post rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/categories/{{ $newestThread->category->slug }}">
                            <span style="background-color: {{ $newestThread->category->color }}" class="text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                {{ $newestThread->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $newestThread->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-3xl font-bold font-jersey tracking-tight text-gray-900 dark:text-white hover:text-primary"><a href="/threads/{{ $newestThread->slug }}">{{ Str::words($newestThread->title, 5) }}</a></h2>
                    <p class="mb-5 font-light text-gray-700 dark:text-gray-400">{{ Str::limit($newestThread->content, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="/author/{{ $newestThread->author->username }}" class="group">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                <span class="font-medium dark:text-white group-hover:text-primary">
                                    {{ Str::words($newestThread->author->name, 2) }}
                                </span>
                            </div>
                        </a>
                        <a href="/threads/{{ $newestThread->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline hover:text-primary">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>
                <div class="mt-4 md:mt-0">
                    <h1 class="text-8xl mb-7 text-text font-jersey ">{!! $title !!}</h1>
                </div>
            </div>
        </section>
        @else
        <h1 class="text-8xl mb-7 text-text font-jersey ">{!! $title !!}</h1>
        @endif
        
        
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

        @else
        <form action="#">
            <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                <div class="relative w-full">
                    <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                    <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                    border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                    dark:focus:border-primary-500" placeholder="Search Thread" name="search" type="search" id="search" autocomplete="off">
                </div>
                <div>
                    <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 text-text dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                      </svg>
                      </button>
                </div>
            </div>
        </form>
            
            <table class="border-collapse border border-slate-500 border-spacing-1 m-auto text-gray-400 mt-7 w-full">
                <tr>
                    <th class="border border-slate-600 ">Title</th>
                    <th class="border border-slate-600">Author</th>
                    <th class="border border-slate-600">Content</th>
                    <th class="border border-slate-600">Publish Date</th>
                    <th class="border border-slate-600">Action</th>
                </tr>
                @forelse ($threads as $thread)
                <tr>
                    <td class="border border-slate-700">{{ Str::limit($thread->title, 50) }}</td>
                    <td class="border border-slate-700">{{ $thread->author->name }}</td>
                    <td class="border border-slate-700">{{ Str::limit($thread->content, 75) }}</td>
                    <td class="border border-slate-700">{{ $thread->created_at }}</td>
                    <td class="border border-slate-700">
                        <div class="mx-auto w-5 ">
                            <a href="/threads/{{ $thread->slug }}">
                                <svg class="w-6 h-6 text-text hover:text-primary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>                              
                            </a>
                            <a href="/threads/{{ $thread->slug }}/remove">
                                <svg class="w-6 h-6 text-text hover:text-primary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                  </svg>                                  
                            </a>
                        </div>
                        
                    </td>
                </tr>

                @empty
                <tr class="h-36">
                    <td class="text-center font-jersey text-4xl" colspan="5">EMPTY BRUHH</td>
                </tr>
                @endforelse
            </table>
        @endif    
    </div>
</section>

</body>

</html>
