<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Str::words($thread->author->name, 1, ('')).' on '. $thread->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
    <x-navbar :categories="$categories"></x-navbar>

    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-bg dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <a href="{{ url()->previous() }}" class="italic text-lg hover:underline no-underline"><< back</a>
            <header class="mb-4 lg:mb-6 not-format mt-4">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="/author/{{ $thread->author->username }}" rel="author" class="text-xl font-bold text-text dark:text-white hover:underli">{{ $thread->author->name }}</a>
                            <br>
                            <p class="text-base text-gray-500 dark:text-gray-400">{{ $thread->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </address>
                
                @if (Auth::id() == $thread->author->id)
                <a href="/threads/{{ $thread->slug }}/edit"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Edit</button></a>
                <a href="/threads/{{ $thread->slug }}/remove"><button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Remove Thread</button></a>
                @else
                <a href="/threads/{{ $thread->slug }}/report"><button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Report</button></a>
                @endif

                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-text lg:mb-6 lg:text-4xl dark:text-white">{{ $thread->title }}</h1>
            </header>
            <p>{{ $thread->content }}</p>
        </article>
    </div>
</main>

</body>

</html>
