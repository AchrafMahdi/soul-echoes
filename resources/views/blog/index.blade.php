<x-layout>
    <!-- @if ($posts->count())
    <div class="w-full h-80 flex flex-row">
        <div class="w-[50%] h-80 bg-gray-500"></div>
        <div class=" bg-gray-200 h-80 w-[50%]">
            <h1>
                {{ $posts[0]->title }}
                {{ $posts[0]->body }}

            </h1>
        </div>
    </div>
    @endif -->
    <div>
        <form action="/blog" class="flex flex-col justify-center py-6 gap-5">
            <div class="self-center">
              <input type="text" class="bg-gray-800 text-gray-100 w-96 py-1 px-3 rounded-3xl" placeholder="Search..." name="search">
              <button class="bg-blue-800 rounded-full px-6 py-2 text-gray-50">search</button>
            </div>
        

        <div>


  <div class="max-w-sm mx-auto">
    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a category</label>
    <select name="category" id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option selected value="">Choose a category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->title }}">{{ $category->title }}</option>
      @endforeach
    </select>
  </div>
</form>

        </div>
    </div>
    @if ($posts->count())
        
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
<div class="grid lg:grid-cols-2 gap-6">
    @foreach ($posts as $post)
        
    <!-- Card -->
    
    <a class="group relative block rounded-xl" href="/blog/{{ $post->id }}">        
      <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:size-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
        @if ($post->image)
            <img class="size-full absolute top-0 start-0 object-cover" src="{{ $post->image }}" alt="Image Description">
        @else
            <img class="size-full absolute top-0 start-0 object-cover" 
            src="https://images.unsplash.com/photo-1611325058432-30bee87d45c8?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjM1fHxncmFkaWVudHxlbnwwfHwwfHx8MA%3D%3D" 
            alt="Image Description">
        @endif
      </div>

      <div class="absolute top-0 inset-x-0 z-10">
        <div class="p-4 flex flex-col h-full sm:p-6">
          <!-- Avatar -->
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="size-[46px] border-2 border-white rounded-full" src="{{ $post->user->image }}" alt="Image Description">
            </div>
            <div class="ms-2.5 sm:ms-4">
              <h4 class="font-semibold text-white">
                {{ $post->user->name }}
              </h4>
              <p class="text-xs text-white/[.8]">
                {{ $post->updated_at->diffForHumans() }}
              </p>
            </div>
          </div>
          <!-- End Avatar -->
        </div>
      </div>

      <div class="absolute bottom-0 inset-x-0 z-10">
        <div class="flex flex-col h-full p-4 sm:p-6">
          <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
            {{ $post->title }}
          </h3>
          <!-- <p class="mt-2 text-white/[.8]">
            Facebook launched the Watch platform in August
          </p> -->
        </div>
      </div>
    </a>
    <!-- End Card -->

    @endforeach
</div>
    </div>
@else
<div>
    <h1 class="text-4xl text-gray-400 text-center my-10">No posts yet, come back later.</h1>
</div>
    @endif

</x-layout>