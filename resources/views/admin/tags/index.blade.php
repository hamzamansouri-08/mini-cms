<x-layout>
    <x-slot:title>Tags - Mini-CMS</x-slot:title>
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-3xl font-bold text-gray-900">Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Nouveau tag</a>
    </div>
    <table class="w-full text-left text-sm">
        <thead class="border-b border-gray-200 text-gray-600"><tr><th class="py-2 pr-4">Nom</th><th class="py-2 pr-4">Slug</th><th class="py-2 pr-4">Articles</th><th class="py-2">Actions</th></tr></thead>
        <tbody>
            @forelse ($tags as $tag)
                <tr class="border-b border-gray-100">
                    <td class="py-3 pr-4 font-medium">{{ $tag->name }}</td><td class="py-3 pr-4">{{ $tag->slug }}</td><td class="py-3 pr-4">{{ $tag->posts_count }}</td>
                    <td class="py-3">
                        <a href="{{ route('admin.tags.edit', $tag) }}" class="rounded-md border border-indigo-600 px-4 py-2 text-sm font-medium text-indigo-600">Modifier</a>
                        <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="rounded-md border border-red-600 px-4 py-2 text-sm font-medium text-red-700">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="py-6 text-center text-gray-500">Aucun tag pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
