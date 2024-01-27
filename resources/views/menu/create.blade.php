
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm"><h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your Menu</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/api/menu" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Menu Name</label>
                    <div class="mt-2">
                        <input value="{{old('name')}}" id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                    </div>
                </div>
                <div>
                    <label for="restaurant" class="block text-sm font-medium leading-6 text-gray-900">Restaurant Name</label>
                    <div class="mt-2">
                        <input value="{{old('restaurant')}}" id="restaurant" name="restaurant" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                    </div>
                </div>

                <div class="flex flex-col mt-2">
                    <label for="thumbnail">Upload an image</label>
                    <input class="border border-gray-400 rounded p-4" type="file" name="thumbnail" id="thumbnail"
                           value="{{old('thumbnail')}}">
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                </div>
            </form>


        </div>
    </div>
