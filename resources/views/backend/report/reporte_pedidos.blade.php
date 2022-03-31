<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
        <tr class="font">
            <th>Fecha </th>
            <th>Nro </th>
            <th>Valor </th>
            <th>Metodo de Pago </th>             
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $item)
        <tr>
           <td> {{ $item->order_date }}  </td>
           <td> {{ $item->invoice_no }}  </td>
           <td> ${{ $item->amount }}  </td>
           <td> {{ $item->payment_type }}  </td>                    
        </tr>
         @endforeach
    </tbody>
  </table>