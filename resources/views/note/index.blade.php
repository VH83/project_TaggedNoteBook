{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Index of Notes</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
        <h2 class="text-3xl font-semibold mb-4">Index of Notes</h2>
        <p class="text-gray-600 mb-6">Welcome to the Index of Notes. Explore your notes or add a new one!</p>
        <div class="flex items-center justify-between">
            <form action="{{ route('search') }}" method="post" class="mr-4 flex-grow">
                @csrf
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <input type="search" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <div class="mb-6">
                <a href="{{ route('note.create') }}" class="text-blue-800 my-2 font-bold hover:text-blue-500 underline">Add a Note</a>
            </div>
        </div>      

        @foreach ($notes as $note)
            <div class="mb-6 border rounded-md p-4 hover:bg-gray-50 transition duration-300 ease-in-out">
                <h3 class="text-xl font-semibold mb-2">{{ $note->title }}</h3>
                <p class="text-gray-600 mb-2">{{ $note->description }}</p>
                @if ($note->coverPhoto)
                    <img src="{{ asset('storage/' . $note->coverPhoto) }}" class="w-full h-auto mb-4 rounded-md" alt="Cover Photo">
                @endif
                <ul>
                    <li>
                        {{$note->tag->tag}}
                    </li>
                </ul>
                <div class="flex space-x-4">
                    <a href="{{ route('note.edit', $note->id) }}" class="text-green-500 hover:underline">Edit</a>
                    <form action="{{ route('note.destroy', $note->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Index of Notes</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
        <h2 class="text-3xl font-semibold mb-4">Index of Notes</h2>
        <p class="text-gray-600 mb-6">Welcome to the Index of Notes. Explore your notes or add a new one!</p>
        <div class="flex items-center justify-between mb-4">
            <form action="{{ route('search') }}" method="post" class="mr-4 flex-grow">
                @csrf
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <input type="search" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <div class="mb-6">
                <a href="{{ route('note.create') }}" class="text-blue-800 my-2 font-bold hover:text-blue-500 underline">Add a Note</a>
            </div>
        </div>

        @foreach ($notes as $note)
            <div class="mb-6 border rounded-md p-4 hover:bg-gray-50 transition duration-300 ease-in-out relative">
                <div class="absolute inset-0 bg-cover bg-center z-[-1] rounded-md" style="background-image: url('{{ asset('storage/' . $note->coverPhoto) }}');"></div>
                <div class="relative z-10">
                    <h3 class="text-xl font-semibold mb-2 text-white">{{ $note->title }}</h3>
                    <p class="text-gray-300 mb-2">{{ $note->description }}</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5">
                        <li class="">
                            {{$note->tag->tag}}
                        </li>
                    </ul>
                    <div class="flex space-x-4">
                        <a href="{{ route('note.edit', $note->id) }}" class="text-green-500 hover:underline">Edit</a>
                        <form action="{{ route('note.destroy', $note->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
