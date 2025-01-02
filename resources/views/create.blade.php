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
    
    <section class="bg-bg dark:bg-gray-900 h-dvh">
        <div class=" mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <form action="/create" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <input type="text" hidden name="author_id">
                    <input type="text" hidden name="slug">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-text">Title</label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title..." required="">
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-text">Content</label>
                        <textarea id="description"
                        name="content" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your content here..." required=""></textarea>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="w-full text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Post Thread
                    </button>
                </div>
            </form>
        </div>
      </section>
</body>

</html>
