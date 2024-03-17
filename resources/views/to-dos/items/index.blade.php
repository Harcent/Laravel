<h1>{{ $to_do->name }}</h1>

<ul>
    @foreach ($to_do_items as $item)
        <li>
            <h3>{{ $item->name }}</h3>
            <p>{{ $item->description }}</p>
            <form action="{{ route('items.edit', ['id' => $to_do->id, 'item' => $item->id]) }}" method="get">
                <button type="submit">Edit</button>
            </form>
            <form action="{{ route('items.delete', ['id' => $to_do->id, 'item' => $item->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<form action="{{ route('to-dos.edit', $to_do->id) }}" method="get">
    <button type="submit">Edit</button>
</form>
<form action="{{ route('to-dos.delete', $to_do->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif

<form action="{{ route('items.store', $to_do->id) }}" method="POST">
    @csrf
    <input type="hidden" name="to_do_id" value="{{ $to_do->id }}">
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    <textarea name="description" cols="30" rows="5" placeholder="Description">{{ old('description') }}</textarea>
    <button type="submit">Create</button>
</form>