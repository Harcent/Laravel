<h1>Edit {{ $to_do->name }}</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif

<form action="{{ route('to-dos.update', $to_do->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="{{ $to_do->name }}" value="{{ old('name') }}">
    <button type="submit">Save</button>
</form>