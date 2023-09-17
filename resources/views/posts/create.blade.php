<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        <form action="{{ route('posts.store') }}" method="POST" class="flex flex-col space-y-5"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <label for="title">title</label>
                <input class="dark:text-black {{ $errors->has('title') ? 'border border-rose-500' : '' }}" type="text"
                    id="title" value="{{ old('title') }}" name="title" placeholder="title" required>
                @error('title')
                    <p class="text-xs text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="description">description</label>
                <textarea class="dark:text-black {{ $errors->has('description') ? 'border border-rose-500' : '' }}" id="description"
                    name="description" placeholder="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="content">content</label>
                <textarea class="dark:text-black {{ $errors->has('content') ? 'border border-rose-500' : '' }}" id="content"
                    name="content" placeholder="content" required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-xs text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="banner">banner</label>
                <input class="dark:text-black {{ $errors->has('banner') ? 'border border-rose-500' : '' }}"
                    type="file" id="banner" name="banner" placeholder="banner" required>
                @error('banner')
                    <p class="text-xs text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="tag_id">tag</label>
                <select class="dark:text-black {{ $errors->has('tag') ? 'border border-rose-500' : '' }}"
                    id="tag_id" name="tag_id" placeholder="tag_id" required>
                    <option value="">choose the tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ old('tag_id') == $tag->id ? 'selected' : '' }}>
                            {{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tag_id')
                    <p class="text-xs text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>



            <button type="submit" class="bg-green-500 rounded-lg py-2 text-lg">create</button>
        </form>
    </div>
</x-app-layout>
