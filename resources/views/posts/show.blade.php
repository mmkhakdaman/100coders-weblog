<x-layouts.guest>
    <div class="max-w-xl mx-auto pt-20 space-y-2">
        <h1 class="text-3xl font-semibold text-gray-800">
            {{ $post->title }}
        </h1>

        <div class="bg-white rounded-lg p-4 shadow flex space-x-2">
            <div class="w-20 flex-shrink-0">
                <img src="{{ url('/storage/' . $post->banner_url) }}" alt="{{ $post->title }}"
                    class="w-20 aspect-square object-cover">
            </div>
            <div class="grow flex flex-col space-y-2">
                <p class="text-gray-600">
                    {{ $post->description }}
                </p>
                <div class="flex-grow">

                    {{ $post->content }}
                </div>
            </div>
        </div>

    </div>

</x-layouts.guest>
