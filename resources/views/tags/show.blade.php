<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        <div class="flex justify-between">
            <p class="text-xl font-bold">
                Title:
            </p>
            <div>
                <h1 class="text-3xl font-bold">{{ $tag->title }}</h1>
                <p class="text-sm">created by {{ $tag->user->name }} at {{ $tag->created_at }}</p>
            </div>
        </div>

        <div class="flex flex-col space-y-2">
            {{-- show posts of tag --}}
            <h2 class="text-2xl font-bold">posts</h2>
            <div class="flex flex-col space-y-2">
                @forelse ($tag->posts as $post)
                    <div class="flex flex-col space-y-2 border border-gray-200 p-2">

                        <h3 class="text-xl font-bold">
                            <a href="{{ route('posts.show', ['post' => $post]) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-sm">created by {{ $post->user->name }} at {{ $post->created_at }}</p>
                    </div>
                @empty
                    <p class="text-sm">No posts found.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
