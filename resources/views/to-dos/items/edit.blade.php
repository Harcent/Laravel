<h1>Edit {{ $to_do_item->name }}</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif
<form action="{{ route('items.update', ['id' => $to_do->id, 'item' => $to_do_item->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="to_do_id" value="{{ $to_do->id }}">
    <input type="text" name="name" placeholder="Name" value="{{ old('name') ?? $to_do_item->name}}">
    <textarea name="description" cols="30" rows="5" placeholder="Description">{{ old('description') ?? $to_do_item->description }}</textarea>
    <button type="submit">Save</button>
</form>