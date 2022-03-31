<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Imagen</th>
        <th>Nombre de Producto</th>
        <th>Cantidad Vendida</th>
        <th>Fecha de Ventas </th>
      </tr>
    </thead>
    <tbody>

     @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->product->product_thambnail)  }}" style="height: 50px; width: 50px;" alt="">
        </td>
        <td align="center"> {{ $item->product->product_name_en }}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">{{ $item->created_at }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>