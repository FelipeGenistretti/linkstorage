<div>
    {{ auth()->id() }}
    <h1>Criar um link</h1>

    @if($message = session()->get("message"))
        <div>{{ $message }}</div>
    @endif

    <div>
        <form action="{{ route('links.store') }}" method="post">
            @csrf

            <div>
                <input type="text" name="url" placeholder="Link" value="{{ old('url') }}">
                @error('url')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <input type="text" name="title" placeholder="title" value="{{ old('title') }}">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <br>

            <button>Salvar</button>
        </form>
    </div>
</div>
