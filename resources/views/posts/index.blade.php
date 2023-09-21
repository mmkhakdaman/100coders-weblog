<x-layouts.guest>
    <div class="max-w-xl mx-auto pt-20 space-y-2">
        <form method="get">
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col">
                    <label for="search" class="text-gray-800">
                        Search
                    </label>
                    <input type="text" name="search" id="search" class="border border-gray-300 rounded-lg p-2">
                </div>
                <div class="flex flex-col">
                    <label for="tag" class="text-gray-800">
                        Tag
                    </label>
                    <select name="tag[]" id="tag" class="border border-gray-300 rounded-lg p-2" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if (in_array($tag->id, request()->query('tag', []))) selected @endif>
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white rounded-lg p-2">
                    Search
                </button>
            </div>
        </form>


        @foreach ($posts as $post)
            <div class="bg-white rounded-lg p-4 shadow flex space-x-2">
                <div class="w-20 flex-shrink-0">
                    <img src="{{ url('/storage/' . $post->banner_url) }}" alt="{{ $post->title }}"
                        class="w-20 aspect-square object-cover">
                </div>
                <div class="grow flex flex-col space-y-2">
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="text-lg font-semibold text-gray-800">
                        {{ $post->title }}
                    </a>
                    <p class="text-gray-600">
                        {{ $post->description }}
                    </p>
                    <p>
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        @endforeach

        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>

</x-layouts.guest>
