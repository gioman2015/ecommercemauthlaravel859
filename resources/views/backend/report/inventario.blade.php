<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
        <tr class="font">
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Cantidad</th>
          </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
        <tr>
            <td><img src="{{public_path($item->product_thambnail)}}" style="width:60px; height: 50px;"></td>
            <td>{{$item->product_name_en}}</td>
            <td>{{$item->product_qty}}</td>
        </tr>
         @endforeach
    </tbody>
  </table>