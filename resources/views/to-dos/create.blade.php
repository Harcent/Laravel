<h1>Create To Do</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif

<form action="{{ route('to-dos.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    <button type="submit">Create</button>
</form>