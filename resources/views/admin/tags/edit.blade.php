<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        <form action="{{ route('admin.tags.update', ['tag' => $tag]) }}" method="POST" class="flex flex-col space-y-5">
            @csrf
            @method('PATCH')
            <label for="title">title</label>
            <input class="dark:text-black" type="text" id="title" name="title"
                value="{{ old('title', $tag->title) }}" required placeholder="title">
            @error('title')
                <small class="text-xs text-rose-500">
                    {{ $message }}
                </small>
            @enderror

            <button type="submit" class="bg-green-500 rounded-lg py-2 text-lg">update</button>
        </form>
    </div>
</x-app-layout>
