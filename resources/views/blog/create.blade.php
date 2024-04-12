<x-layout>

<div class=" bg-gray-900 p-11 grid place-content-center h-[778px]">
<form action="/blog/create" method="post" class="flex flex-col gap-11">
    @csrf
    <div class="flex flex-col items-start gap-1">
        <label class="text-white font-medium text-2xl">title</label>
        <input class="border border-gray-400 rounded-md px-5 py-1 bg-transparent text-gray-100" type="text" name="title" id="" required>
        @error('title')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex flex-col items-start gap-1">
        <label class="text-white font-medium text-2xl">Slug</label>
        <input class="border border-gray-400 rounded-md px-5 py-1 bg-transparent text-gray-100" type="text" name="slug" id="" required>
        @error('slug')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col items-start gap-1">
        <label class="text-white font-medium text-2xl">Image url (optional)</label>
        <input class="border border-gray-400 rounded-md px-5 py-1 bg-transparent text-gray-100" type="text" name="image" id="" >
        @error('image')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex flex-col items-start gap-1">
        <label class="text-white font-medium text-2xl">Body</label>
        <textarea  class="border border-gray-400 rounded-md px-5 py-1 bg-transparent text-gray-100 md:w-[900px] h-72" name="body"></textarea>
        @error('body')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class=" self-end">
        <button type="submit" class="text-white bg-blue-950 rounded-full px-6 py-2">Submit</button>
    </div>
</form>
</div>

</x-layout>