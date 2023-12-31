@props(['post'])

<article
        {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>

            <img src="{{ $post->thumbnail ? asset('storage/'.$post->thumbnail) : 'images/illustration-1.png' }}" alt="" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm truncate">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 truncate">
                        <a href="/?author={{$post->author->username}}"><h5
                                    class="font-bold">{{$post->author->name}}</h5></a>

                    </div>
                </div>

                <div class="flex space-x-2">
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-4"
                    >Read More</a>
                </div>
            </footer>
            @can('admin')
                <div class="flex space-x-4 mt-2 justify-center">
                    <a href="/admin/posts/{{ $post->id }}/edit"
                       class="transition-colors duration-300 text-xs text-white font-semibold bg-blue-300 hover:bg-blue-500 rounded-full py-2 px-4"
                    >Edit</a>
                    <form action="/admin/posts/{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="transition-colors duration-300 text-xs text-white font-semibold bg-red-300 hover:bg-red-500 rounded-full py-2 px-4" type="submit">Delete</button>
                    </form>
                </div>
            @endcan

        </div>
    </div>
</article>
