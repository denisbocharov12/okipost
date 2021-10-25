<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\IurClients;
use App\Models\IurServices;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyes = IurClients::orderBy('id', 'DESC')->get();
        return view('backend.admin.pages.company.index', compact('companyes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = IurServices::all();
        return view('backend.admin.pages.company.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'string|required',
            'IDNO' => 'string|required',
            'address' => 'nullable',
            'company_person' => 'nullable',
            'requisit_address' => 'string|required',
            'requisit_IDNO' => 'string|required',
            'requisit_nds' => 'string|required',
            'requisit_IBAN' => 'string|required',
            'requisit_BANK' => 'string|required',
            'requisit_CODE' => 'string|required',
            'name' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'service_id' => 'string|required',
        ]);
        $data = $request->all();
        $status = IurClients::create($data);
        if ($status){
            toastr()->success('Заказ на компанию '.$request->input('name').' успешно создан!','Успех');
            return redirect()->route('company.index');
        } else {
            toastr()->error('Что-то пошло не так...','Ошибка');
            return redirect()->back();
        }
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
        $company = IurClients::find($id);
        $services = IurServices::all();
        if ($company){
            return view('backend.admin.pages.company.edit', compact(['company','services']));
        } else {
            toastr()->error('Мы не смогли найти данную компанию в базе данных','Ошибка');
            return redirect()->back();
        }
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
        $company = IurClients::find($id);
        if ($company){
            $this->validate($request, [
                'type' => 'string|required',
                'IDNO' => 'string|required',
                'address' => 'nullable',
                'company_person' => 'nullable',
                'requisit_address' => 'string|required',
                'requisit_IDNO' => 'string|required',
                'requisit_nds' => 'string|required',
                'requisit_IBAN' => 'string|required',
                'requisit_BANK' => 'string|required',
                'requisit_CODE' => 'string|required',
                'name' => 'string|required',
                'email' => 'string|required',
                'phone' => 'string|required',
                'service_id' => 'string|required',
            ]);
            $data = $request->all();
            $status = $company->fill($data)->save();
            if ($status){
                toastr()->success('Заказ на компанию '.$request->input('name').' успешно обновлен!','Успех');
                return redirect()->route('company.index');
            } else {
                toastr()->error('Что-то пошло не так...','Ошибка');
                return redirect()->back();
            }
        } else {
            toastr()->error('Заказ на компанию не найден...','Ошибка');
            return redirect()->back();
        }
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
    public function companyDelete(Request $request){
        $id = $request->id;
        $company = IurClients::find($id);
        $company->delete();
        return response()->json(['msg'=>'Компания '.$company->title.' успешно удалена','status'=>true, 'deleted'=>$id]);
    }
    public function companyStatus(Request $request){
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
