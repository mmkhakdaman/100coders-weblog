<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>
                    {{ $error }}
                </p>
            @endforeach
        @endif
        <form action="{{ route('admin.tags.store') }}" method="POST" class="flex flex-col space-y-5">
            @csrf
            <label for="title">title</label>
            <input class="dark:text-black {{ $errors->has('title') ? 'border border-rose-500' : '' }}"
             type="text" id="title" value="{{ old('title') }}" name="title"
                placeholder="title" required>
            {{-- @error('title')
                <p>
                    {{ $message }}
                </p>
            @enderror --}}



            <button type="submit" class="bg-green-500 rounded-lg py-2 text-lg">create</button>
        </form>
    </div>
</x-app-layout>
