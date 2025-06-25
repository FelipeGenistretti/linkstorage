<div>
    {{ auth()->id() }}
    <h1>Editar um link</h1>

    @if($message = session()->get("message"))
        <div>{{ $message }}</div>
    @endif

    <div>
        <form action="{{ route('links.update', $link) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <input
                    type="text"
                    name="url"
                    placeholder="Link"
                    value="{{ old('url', $link->url) }}"
                >
                @error('url')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <input
                    type="text"
                    name="title"
                    placeholder="Título"
                    value="{{ old('title', $link->title) }}"
                >
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <br>

            <button>Salvar</button>
        </form>
    </div>
</div>
