@props(['comment'])
<article class="flex space-x-4 bg-gray-100 p-6 rounded border border-gray-200">
    <div class="flex-shrink-0">
        <img class="rounded-full" src="https://i.pravatar.cc/60?id={{$comment->author->id}}" width="100" height="100">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->username}} </h3>
            <p class="text-xs">Posted
                <time>{{$comment->created_at}}</time>
            </p>
        </header>
    </div>
    <p>{{$comment->body}}</p>
</article>