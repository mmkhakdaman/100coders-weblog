<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        <a href="{{ route('posts.create') }}" class="bg-red-500 p-4 rounded-md mb-8">
            create a new post
        </a>
        <table style="width: 100%" class="border my-8">
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        banner
                    </th>
                    <th>
                        title
                    </th>
                    <th>
                        user
                    </th>
                    <th>
                        tag
                    </th>
                    <th>
                        view count
                    </th>
                    <th>
                        created at
                    </th>
                    <th>
                        settings
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>
                            <img src="{{ url('/storage/'.$post->banner_url) }}" alt="" class="h-5 w-5 object-cover">
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->user->name }}
                        </td>
                        <td>
                            @foreach ($post->tags as $tag)
                                {{ $tag->title }},
                            @endforeach
                        </td>
                        <td>
                            {{ $post->view_count }}
                        </td>
                        <td>
                            {{ $post->created_at }}
                        </td>
                        <td class="flex space-x-2">
                            <a href="{{ route('posts.edit', ['post' => $post]) }}">
                                edit
                            </a>
                            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No posts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $posts->links() }}


    </div>
</x-app-layout>
