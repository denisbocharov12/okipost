<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\IurClients;
use App\Models\PayedModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payeds = PayedModel::orderBy('id', 'DESC')->get();
        return view('backend.admin.pages.payed.index', compact('payeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function payedDelete(Request $request){
        $id = $request->id;
        $payed = PayedModel::find($id);
        $payed->delete();
        return response()->json(['msg'=>'Оплата  №'.$payed->id.' успешно удалена','status'=>true, 'deleted'=>$id]);
    }
    public function payedStatus(Request $request){
        if ($request->mode =='true'){
            DB::table('iur_clients')->where('id', $request->id)->update(['status'=>'active']);
        } else {
            DB::table('iur_clients')->where('id', $request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Успешное редактирование статуса','status'=>true]);
    }

    public function PDFView(Request $request) {
        $id = $request->input('company');
        $company = IurClients::where('id', $id)->get();
        $pdf = PDF::loadView('pdf.services.pdf', compact(['company']));
        return $pdf->stream();
    }
    public function GeneratePDF(Request $request){
        $id = $request->input('order');
        $order = Order::where('id', $id)->get();
        $order_items = OrderItem::where('order_id', $id)->get();
        $pdf = PDF::loadView('backend.admin.pdf.invoice', compact(['order','order_items']));
        return $pdf->download('order.pdf');
    }
}
