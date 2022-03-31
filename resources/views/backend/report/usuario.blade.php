<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Cantidad de Ordenes</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($user as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>
                @if ($item->type_user == 1)
                    <span >Proveedor</span>
                @else
                    <span >Usuario Normal</span>
                @endif
            </td>
            <td>
                @php
                    $orders = App\Models\Order::where('user_id',$item->id)->get();
                @endphp
                {{ count($orders) }}</td>
        </tr>
      @endforeach

    </tbody>
  </table>