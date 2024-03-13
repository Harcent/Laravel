<h1>All To-Dos</h1>

<a href="{{ route('to-dos.create') }}">Create To-Do</a>

<table>
    <thead>
        <th>Name</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($to_dos as $to_do)
            <tr>
                <td>{{ $to_do['name']  }}</td>
                <td><a href="{{ route('items.index', $to_do['id']) }}">Open</a></td>
            </tr>
        @endforeach
    </tbody>
</table>