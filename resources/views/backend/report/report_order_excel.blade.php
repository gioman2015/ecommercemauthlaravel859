<table>
    <thead>
    <tr>
        <th>id</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $item)
        <tr>
            <td>{{ $item->id }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>