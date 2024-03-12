<h1>{{ $to_do->name }}</h1>
<form action="{{ route('to-dos.edit', $to_do->id) }}" method="get">
    <button type="submit">Edit</button>
</form>
<form action="{{ route('to-dos.delete', $to_do->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>