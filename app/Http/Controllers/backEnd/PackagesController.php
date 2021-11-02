<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PackageModel;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $track = $request->input('value');
            if ($track == null){
                $packages = PackageModel::with('user')->orderBy('id', 'DESC')->get();
                $view = view('backend.admin.pages.packages.components.package',compact([
                    'packages',
                ]))->render();
                return response()->json(['html'=>$view,'status'=>true]);
            } else{
                $packages = PackageModel::with('user')->where('track','LIKE','%'.$track."%")->orderBy('id', 'DESC')->get();
                $view = view('backend.admin.pages.packages.components.package',compact([
                    'packages',
                ]))->render();
                return response()->json(['html'=>$view,'status'=>true]);
            }

        }else{
            $packages = PackageModel::with('user')->orderBy('id', 'DESC')->get();
        }
        return view('backend.admin.pages.packages.index', compact('packages'));
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
    public function searchPackage(Request $request){
        $track = $request->input('track');
    }
}
