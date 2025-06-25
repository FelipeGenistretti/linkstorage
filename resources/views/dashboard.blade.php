<x-app-layout>
    <x-slot name="header">
        <h1>Olá, {{ auth()->user()->name }}</h1>
        <h2>Dashboard</h2>
    </x-slot>

    @if (session('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Formulário de busca --}}
    <form method="GET" action="{{ route('dashboard') }}" style="margin-bottom: 20px;">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Buscar links por título ou URL"
            style="padding: 8px; border-radius: 6px; border: 1px solid #ccc; width: 250px;"
        >
        <button
            type="submit"
            style="background-color: black; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer; margin-left: 8px;"
        >
            Buscar
        </button>
    </form>

    <div class="mb-6">
        <a href="{{ route('links.create') }}"
           style="background-color: black; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none;">
            Criar um link
        </a>
    </div>

    <div class="space-y-4">
        @forelse ($links as $link)
            <div style="padding: 16px; background-color: white; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <a href="{{ $link->url }}" target="_blank" style="color: blue; text-decoration: underline;">
                        {{ $link->title }}
                    </a>
                    <!-- Link para editar -->
                    <a href="{{ route('links.edit', $link) }}" style="margin-left: 15px; color: orange; text-decoration: underline;">
                        Editar
                    </a>
                </div>
                <form action="{{ route('links.destroy', $link) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este link?')">
                    @csrf
                    @method('DELETE')
                    <button style="background-color: black; color: white; padding: 10px 16px; border-radius: 6px; border: none; cursor: pointer;">
                        Deletar
                    </button>
                </form>
            </div>
        @empty
            <p style="color: gray;">Nenhum link cadastrado ainda.</p>
        @endforelse
    </div>
</x-app-layout>
