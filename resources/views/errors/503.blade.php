<x-layout>
    <x-slot:title>Service indisponible - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold text-gray-900">Service indisponible</h1>
    <p class="mt-2 mb-8 text-gray-600">{{ $exception->getMessage() ?: 'Le site est temporairement indisponible.' }}</p>

    <x-alert type="warning" title="Erreur 503" class="max-w-2xl">
        Les fonctionnalités d'écriture sont momentanément désactivées.
    </x-alert>

    <p class="mt-6">
        <a href="{{ route('home') }}" class="font-medium text-indigo-600 hover:underline">Retour à l'accueil</a>
    </p>
</x-layout>
