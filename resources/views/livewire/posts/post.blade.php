<div>

    <h1 class="max-w-sm m-auto text-xl mt-10 font-bold"> Publish new post</h1>

    <section class="w-1/2 m-auto mt-4  border p-10 rounded">

        <form wire:submit.prevent="create" enctype="multipart/form-data">

            <div class="flex flex-col">
                <label for="title">Title</label>
                <input class="border border-gray-400 rounded" type="text" name="title" id="title"
                       value="{{old('title')}}"
                wire:model.live="title">
                @error('title')
                <p class="text-xs text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="slug">Slug</label>
                <input class="border border-gray-400 rounded" type="text" name="slug" id="slug"
                       value="{{old('slug')}}"
                       wire:model.live="slug">
                @error('slug')
                <p class="text-xs text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="excerpt">Excerpt</label>
                <input class="border border-gray-400 rounded " type="text" name="excerpt" id="excerpt"
                       value="{{old('excerpt')}}"
                       wire:model.live="excerpt">
                @error('excerpt')
                <p class="text-xs text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col mt-2">
                <label for="thumbnail">Upload an image</label>
                <input class="border border-gray-400 rounded p-4" type="file" name="thumbnail" id="thumbnail"
                       value="{{old('thumbnail')}}"
                       wire:model.live="thumbnail">
                @error('thumbnail')
                <p class="text-xs text-red-500"> {{ $message }}</p>
                @enderror
                @if ($thumbnail)
                    Photo Preview:
                    <img class="max-w-xl" src="{{ $thumbnail->temporaryUrl() }}">
                @endif
            </div>

            <div class="flex flex-col mt-2">
                <label for="body">Body</label>
                <textarea wire:model.live="body" class="border border-gray-400 rounded" name="body" id="body"  rows="5" >{{old('body')}}</textarea>
                @error('body')
                <p class="text-xs text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="category_id">Select category</label>
                <select wire:model.live="category_id" class="border border-gray-400 rounded mt-2" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option  value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="flex justify-end">
                <button class="py-2 px-4 bg-blue-500 text-white mt-4 rounded" type="submit">Publish</button>
            </div>


        </form>
    </section>
</div>
