<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        <a href="{{ route('admin.tags.create') }}" class="bg-red-500 p-4 rounded-md mb-8">
            create a new tag
        </a>
        <table style="width: 100%" class="border my-8">
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        title
                    </th>
                    <th>
                        user
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
                @forelse ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->id }}
                        </td>
                        <td>
                            {{ $tag->title }}
                        </td>
                        <td>
                            {{ $tag->user->name }}
                        </td>
                        <td>
                            {{ $tag->created_at }}
                        </td>
                        <td class="flex space-x-2">
                            <a href="{{ route('admin.tags.edit', ['tag' => $tag]) }}">
                                edit
                            </a>
                            <a href="{{ route('admin.tags.show', ['tag' => $tag]) }}">
                                show
                            </a>
                            <form action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}" method="post">
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
                            No tags found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $tags->links() }}


    </div>
</x-app-layout>
