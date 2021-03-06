<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;



class OrderController extends Controller
{

	// Pending Orders
	public function PendingOrders(){
		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} // end mehtod


	// Pending Order Details
	public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method



	// Confirmed Orders
	public function ConfirmedOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} // end mehtod


	// Processing Orders
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} // end mehtod


		// Picked Orders
	public function PickedOrders(){
		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));

	} // end mehtod



			// Shipped Orders
	public function ShippedOrders(){
		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} // end mehtod


			// Delivered Orders
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	} // end mehtod


				// Cancel Orders
	public function CancelOrders(){
		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	} // end mehtod

	public function CancelOrder($order_id){
		Order::findOrFail($order_id)->update(['status' => 'cancel','return_reason' => 'Cancelada por Administrador']);

      $notification = array(
			'message' => 'Pedido Cancelado con ??xito',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

	} // end mehtod


	public function PendingToConfirm($order_id){
		/* Descuento Stock Start */
		$product = OrderItem::where('order_id',$order_id)->get();
		foreach ($product as $item) {
			Product::where('id',$item->product_id)
					->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
		}
		/* Descuento Stock End */
		/* Calculo de puntos Start */
		$order = Order::findorfail($order_id)->first();
		$product = OrderItem::where('order_id',$order_id)->get();
		foreach ($product as $item) {
			$puntos = Product::where('id',$item->product_id)->first();
			$cont = $puntos->puntos * $item->qty;
			
			User::where('id', $order->user_id)
					->update(['puntos' => DB::raw('puntos+'.$cont)]);
		}
		/* Calculo de puntos End */

      Order::findOrFail($order_id)->update(['status' => 'confirm','confirmed_date' => Carbon::now()]);

      $notification = array(
			'message' => 'Orden Confirmarda con ??xito',
			'alert-type' => 'success'
		);

		return redirect()->route('pending-orders')->with($notification);


	} // end method

	public function ConfirmToPending($order_id){
		/* Descuento Stock Start */
		$product = OrderItem::where('order_id',$order_id)->get();
		foreach ($product as $item) {
			Product::where('id',$item->product_id)
					->update(['product_qty' => DB::raw('product_qty+'.$item->qty)]);
		}
		/* Descuento Stock End */
		/* Calculo de puntos Start */
		$order = Order::findorfail($order_id)->first();
		$product = OrderItem::where('order_id',$order_id)->get();
		foreach ($product as $item) {
			$puntos = Product::where('id',$item->product_id)->first();
			$cont = $puntos->puntos * $item->qty;
			
			User::where('id', $order->user_id)
					->update(['puntos' => DB::raw('puntos-'.$cont)]);
		}
		/* Calculo de puntos End */

      Order::findOrFail($order_id)->update(['status' => 'Pending','confirmed_date' => '']);

      $notification = array(
			'message' => 'Orden Confirmarda a Pendiente',
			'alert-type' => 'success'
		);

		return redirect()->route('pending-orders')->with($notification);
	} // end method





	public function ConfirmToProcessing($order_id){

      Order::findOrFail($order_id)->update(['status' => 'processing','processing_date' => Carbon::now()]);

      $notification = array(
			'message' => 'Procesamiento de pedido con ??xito',
			'alert-type' => 'success'
		);

		return redirect()->route('confirmed-orders')->with($notification);


	} // end method



		public function ProcessingToPicked($order_id){

      /* Order::findOrFail($order_id)->update(['status' => 'picked','picked_date' => Carbon::now()]); */

	  Order::findOrFail($order_id)->update(['status' => 'shipped','shipped_date' => Carbon::now()]);

      $notification = array(
			'message' => 'Orden empacado con ??xito',
			'alert-type' => 'success'
		);

		return redirect()->route('processing-orders')->with($notification);


	} // end method


	 public function PickedToShipped($order_id){

      Order::findOrFail($order_id)->update(['status' => 'shipped','shipped_date' => Carbon::now()]);

      $notification = array(
			'message' => 'Pedido enviado con ??xito',
			'alert-type' => 'success'
		);

		return redirect()->route('picked-orders')->with($notification);


	} // end method

	public function PickedToProcessing($order_id){

		Order::findOrFail($order_id)->update(['status' => 'confirm','shipped_date' => '']);
  
		$notification = array(
			  'message' => 'Empacado a Confirmado con ??xito',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('picked-orders')->with($notification);
  
  
	  } // end method


	 public function ShippedToDelivered($order_id){
	
	 $order = Order::findorfail($order_id)->first();

	 $product = OrderItem::where('order_id',$order_id)->get();
	 foreach ($product as $item) {
		 $puntos = Product::where('id',$item->product_id)->first();
		 $cont = $puntos->puntos * $item->qty;
		 
		 User::where('id', $order->user_id)
		 		->update(['puntos' => DB::raw('puntos+'.$cont)]);
	 	/* Product::where('id',$item->product_id)
	 			->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]); */
	 }

      Order::findOrFail($order_id)->update(['status' => 'delivered','delivered_date' => Carbon::now()]);

      $notification = array(
			'message' => 'Pedido entregado con ??xito',
			'alert-type' => 'success'
		);

		return redirect()->route('shipped-orders')->with($notification);


	} // end method


	public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method

	public function GuiaOrder(Request $request){
		/* dd($request); */
        $id = $request->orderid;
        Order::findOrFail($id)->update([
            'post_code' => $request->guia,
        ]);
        $notification = array(
            'message' => 'Nro de Guia Guardado con ??xito',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

	public function AdminInvoiceDownloadOrders(Request $request){
		$var = 'test';
		dd($request);
		/* dd($orders); */

		/* $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf'); */

	} // end method
}
