<h1>Edit {{ $to_do->name }}</h1>
<form action="{{ route('to-dos.update', $to_do->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="{{ $to_do->name }}">
    <button type="submit">Edit</button>
</form>