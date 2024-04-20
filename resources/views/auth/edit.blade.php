<x-layout>
  <form method="post" action="/{{ $user->id }}/profile" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4/5 bg-gray-800 p-8 rounded-lg flex flex-col gap-7">
    @csrf
    <div class="flex flex-row gap-5 justify-between items-center px-10">
      <div class="flex flex-row gap-5 items-center">
        <div class="flex-shrink-0">
          <img class="size-[146px] border-2 border-blue-300 rounded-full" src="{{ $user->image }}" alt="Profile Picture">
        </div>
        
      </div>
      <h1 class="text-white font-semibold text-4xl">{{ $user->name }}</h1>
    </div>
    <div class="flex flex-col gap-4">

      <div>
          <label for="image" class="block text-sm mb-2 dark:text-white">Image url</label>
          <div class="relative">
            <input value="{{ $user->image }}" type="text" id="image" name="image" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">
          </div>
      </div>

      <div>
          <label for="email" class="block text-sm mb-2 dark:text-white">Username</label>
          <div class="relative">
            <input value="{{ $user->name }}" type="text" id="name" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">              
          </div>
      </div>

        <div>
          <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
          <div class="relative">
            <input value="{{ $user->email }}" type="email" id="email" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">              
          </div>
      </div>
    

      <div class=" w-fit self-end mt-4">
        <button type="submit" class="w-full py-3 px-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Save changes</button>
      </div>

</form>
</x-layout>