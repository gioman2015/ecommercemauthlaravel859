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
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReportYear;
use App\Exports\ExportReportYearMonth;
use App\Exports\ExportReportDate;
use App\Exports\ExportStock;
use App\Exports\ExportVentasYear;
use App\Exports\ExportVentasYearMonth;
use App\Exports\ExportVentasDate;

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
        $orderItem = OrderItem::with('product')->where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
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
        if ($request->txtyear==null) {
            $year = Carbon::now()->format('Y');
        }else {
            $year = $request->txtyear;
        }
        $nombre = 'Reporte '. $year.'.pdf';
        $orders = Order::where('order_year',$year)->latest()->get();
        $pdf = PDF::loadView('backend.report.reporte_pedidos',compact('orders'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($nombre);
        /* return (new ExportReportYear($year))->download($nombre); */
	} // end method

    public function AdminInvoiceDownloadOrdersMonths(Request $request){
        if ($request->monthyear==null) {
            $year = Carbon::now()->format('Y');
        }else {
            $year = $request->monthyear;
        }
        if ($request->monthyear==null) {
            $month = Carbon::now()->format('F');
        }else {
            $month = $request->monthmonth;
        }
        $nombre = 'Reporte '.$month.'-'. $year.'.pdf';
        $orders = Order::where('order_month',$month)->where('order_year',$year)->latest()->get();
        $pdf = PDF::loadView('backend.report.reporte_pedidos',compact('orders'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($nombre);
        /* return (new ExportReportYearMonth($year,$month))->download($nombre); */
	} // end method

    public function AdminInvoiceDownloadOrdersDate(Request $request){
        if ($request->txtdate==null) {
            $formatDate = Carbon::now()->format('d F Y');
        }else {
            $date = new DateTime($request->txtdate);
            $formatDate = $date->format('d F Y');
        }
        $nombre = 'Reporte'. $formatDate.'.pdf';
        $orders = Order::where('order_date',$formatDate)->latest()->get();
        $pdf = PDF::loadView('backend.report.reporte_pedidos',compact('orders'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($nombre);
        /* return (new ExportReportDate($date))->download($nombre); */
	} // end method

    public function StockDownload(){
        $products = Product::latest()->get();
        $pdf = PDF::loadView('backend.report.inventario',compact('products'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('Inventario.pdf');
        /* return (new ExportStock())->download('inventario.xlsx'); */
    }

    public function AdminInvoiceDownloadVentas(Request $request){
        if ($request->txtyear==null) {
            $year = Carbon::now()->format('Y');
        }else {
            $year = $request->txtyear;
        }
        $nombre = 'Ventas'. $year.'.pdf';
        $orderItem = OrderItem::with('product')->where('order_year',$year)->latest()->get();
        $pdf = PDF::loadView('backend.report.reporte_ventas',compact('orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($nombre);
        /* return (new ExportVentasYear($year))->download($nombre); */
	} // end method

    public function AdminInvoiceDownloadVentasMonths(Request $request){
        if ($request->monthyear==null) {
            $year = Carbon::now()->format('Y');
        }else {
            $year = $request->monthyear;
        }
        if ($request->monthyear==null) {
            $month = Carbon::now()->format('F');
        }else {
            $month = $request->monthmonth;
        }
        $nombre = 'Ventas '.$month.'-'. $year.'.pdf';
        $orderItem = OrderItem::with('product')->where('order_month',$month)->where('order_year',$year)->latest()->get();
        $pdf = PDF::loadView('backend.report.reporte_ventas',compact('orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($nombre);
        /* return (new ExportVentasYearMonth($year,$month))->download($nombre); */
	} // end method

    public function AdminInvoiceDownloadVentasDate(Request $request){
        if ($request->txtdate==null) {
            $formatDate = Carbon::now()->format('d F Y');
        }else {
            $date = new DateTime($request->txtdate);
            $formatDate = $date->format('d F Y');
        }

        $orderItem = OrderItem::with('product')->where('order_date',$formatDate)->latest()->get();
        
        $nombre = 'Ventas '. $formatDate.'.pdf';
        $pdf = PDF::loadView('backend.report.reporte_ventas',compact('orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($nombre);
        
        /* return (new ExportVentasDate($date))->download($nombre); */
	} // end method

    public function AdminDownloadUser(){
        $user = User::with('order')->get();
        $pdf = PDF::loadView('backend.report.usuario',compact('user'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('Usuario.pdf');
        /* return (new ExportStock())->download('inventario.xlsx'); */
    }
    
}
