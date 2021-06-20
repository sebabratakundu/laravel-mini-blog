<div class="w-full">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
    @csrf
    @if($btnTxt == "Update")
      @method("PUT")
    @endif
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Post Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title"  type="text" placeholder="Title" value="{{ $title }}">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="excerpt">
        Excerpt
      </label>
      <input class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="excerpt" type="text" name="excerpt" placeholder="this is our first post" value="{{ $excerpt }}">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
        Post Description
      </label>
      <textarea rows="5" class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="body" type="text" name="body" placeholder="this is your post body">{{ $desc }}</textarea>
    </div>
    <div class="flex items-center justify-center">
      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        {{$btnTxt}}
      </button>
    </div>
  </form>
</div>