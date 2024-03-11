<h1>Create To Do</h1>

<form action="{{ route('to-dos.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <button type="submit">Create</button>
</form>