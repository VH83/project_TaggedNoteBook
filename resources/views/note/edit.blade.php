<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>Update Note</title>
    </head>

    <body class="bg-gray-100 p-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
            <h2 class="text-3xl font-semibold mb-4">Update Note</h2>
            <form action="{{route('note.update', $note)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                    <input type="text" id="title" name="title" value="{{$note->title}}"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                    <textarea id="description" name="description" 
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">{{$note->description}}</textarea>
                </div>

                <div class="mb-6">
                    <label for="coverPhoto" class="block text-sm font-medium text-gray-600">Cover Photo</label>
                    <input type="file" id="coverPhoto" name="coverPhoto" value="{{$note->coverPhoto}}" onchange="updateFileName(this)"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        Update
                    </button>
                </div>
            </form>
        </div>
        <script>
            function updateFileName(input) {
                const fileNameDisplay = document.getElementById("fileName");
                const fileName = input.files[0] ? input.files[0].name : "No file chosen";
                fileNameDisplay.textContent = fileName;
            }
        </script>
    </body>
</html>