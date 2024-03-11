<h1>{{ $to_do->name }}</h1>
<a href="{{ route('to-dos.edit', $to_do->id) }}">Edit</a>
<a href="{{ route('to-dos.delete', $to_do->id) }}">Delete</a>