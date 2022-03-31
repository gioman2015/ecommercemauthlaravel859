<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Orden</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>EasyShop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               EasyShop Head Office
               Email:support@easylearningbd.com <br>
               Mob: 1245454545 <br>
               Dhaka 1207,Dhanmondi:#4 <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          
        </td>
        <td>
          
        </td>
    </tr>
  </table>
  <br/>
  <br>
    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr>
                <th>Date </th>
                <th>Invoice </th>
                <th>Amount </th>
                <th>Payment </th>
                <th>Status </th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $item)
                <tr>
                    <td> {{ $item->order_date }}  </td>
                    <td> {{ $item->invoice_no }}  </td>
                    <td> ${{ $item->amount }}  </td>
                    <td> {{ $item->payment_type }}  </td>
                    <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td>
                </tr>
            @endforeach
        </tbody>

    </table>
  
</body>
</html>
