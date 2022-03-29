<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\User;
use PDF;

class ReportController extends Controller
{
    public function ReportView(){
        return view('backend.report.report_view');
    }

    public function ReportByDate(Request $request){
        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.report.report_show',compact('orders'));
    } // end mehtod 

    public function ReportByMonth(Request $request){
        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.report_show',compact('orders'));
    } // end mehtod 

    public function ReportByYear(Request $request){
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.report_show',compact('orders'));
    } // end mehtod 

    public function StockView(){
        $products = Product::latest()->get();
        return view('backend.report.stock_view', compact('products'));
    }

    public function StockVentas(){
        /* $orderItem = OrderItem::with('product')->get();
        /* dd($orderItem->product->product_thambnail);
        return view('backend.report.order_view', compact('orderItem')); */
        return view('backend.report.order_search');
    }

    public function ReportByDateVentas(Request $request){
        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orderItem = OrderItem::with('product')->where('order_date',$formatDate)->latest()->get();
        return view('backend.report.order_view', compact('orderItem'));
    } // end mehtod 

    public function ReportByMonthVentas(Request $request){
        $orderItem = OrderItem::with('product')->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.order_view',compact('orderItem'));
    } // end mehtod 

    public function ReportByYearVentas(Request $request){
        $orderItem = OrderItem::with('product')->where('order_year',$request->year)->latest()->get();
        return view('backend.report.order_view',compact('orderItem'));
    } // end mehtod 

    public function UserOrder(){
        $user = User::with('order')->get();
        return view('backend.report.user_order_view',compact('user'));
    }

    public function CantOrder(){
        $pending = Order::where('status','pending')->orderBy('id','DESC')->get();
        $confirm = Order::where('status','confirm')->orderBy('id','DESC')->get();
        $picked = Order::where('status','picked')->orderBy('id','DESC')->get();
        $shipped = Order::where('status','shipped')->orderBy('id','DESC')->get();
        $delivered = Order::where('status','delivered')->orderBy('id','DESC')->get();
        $cancel = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.report.cant_order_view',compact('pending','confirm','picked','shipped','delivered','cancel'));
    }

    public function AdminInvoiceDownloadOrders(Request $request){
		$var = 'test';
		/* dd($request); */
        $orders = Order::where('order_year',$request->txtyear)->latest()->get();
		$pdf = PDF::loadView('backend.report.report_order',compact('orders'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Reporte.pdf');

	} // end method
}
