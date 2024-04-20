<x-layout>
    
<style>
    h1{
        font-weight: 700;
        color: whitesmoke;
        font-size: xx-large;
    }

    *{
        color: whitesmoke;
        
    }

    li{
        list-style:circle;
    }
    ul{
        padding-left: 1.4rem;
    }
    img {
        /*w-full object-cover rounded-xl*/
        width: 100%;
        object-fit: cover;
        border-radius: .5rem;
        margin-block: 1.3rem;
    }
</style>
<body>
<div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
    
    <div class="flex flex-col gap-11 py-8">
    <div class="flex flex-row gap-5 items-center justify-between">
        <div class="w-full flex items-center gap-5 flex-row">
            <div class=" flex-shrink-0">
                <img
                src="{{ $post->user->image }}"
                class="rounded-full size-12"
                 alt="">
            </div>
            <div class="flex flex-col gap-1">
                <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $post->user->name }}</span>
                <span class="text-xs text-gray-500">
                        {{ $post->updated_at->diffForHumans() }}
                      </span>
            </div>
        </div>
        
        @if ($post->user == auth()->user())
        
        <a href="/blogs/{{ $post->id }}/edit" class="bg-blue-800 rounded-full px-6 font-medium py-2 text-gray-50">Edit</a>
        
        @endif
    </div>    
    <div class="">
    <a href="/blog?category={{ $post->category->title }}" class="inline-flex items-center gap-x-1.5 py-1.5 px-4 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
        {{ $post->category->title }}
    </a>
    </div>
            @if ($post->image)
            <img src="{{ $post->image }}" class="rounded-md" />
            @endif
        <h1 class="text-gray-50 font-bold text-4xl">
            {{ $post->title }}
        </h1>

        <div class="flex flex-col gap-2">
            {!! $post->body !!}
        </div>
    </div>    
    <a  href="/blog">
    <button class="bg-blue-800 w-60 rounded-full px-6 py-2 text-gray-50"> back to blogs</button>
    </a>
    <x-comments :post="$post" />
</div>    
</x-layout>