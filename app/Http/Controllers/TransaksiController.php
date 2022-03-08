<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tranx = Transaksi::get();
        return response()->json(['result' => $tranx]);
    }
    
    public function show(Request $request, $id){
        $tranx = Transaksi::where('id',$id)->get();
        return response()->json(['result' => $tranx]);
    }

    public function store(Request $request){
        $this->validate($request, [
        'kode_perusahaan' => 'required',
        'id_barang' => 'required|numeric',
        'jumlah'    => 'required|numeric'
         ]);
         $request->merge(['tanggalinput'=>date('Y-m-d')]);
        if(Transaksi::create($request->all())){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'id' => 'required',
            'nama' => 'required'
         ]);
         $tranx = new Company();
        if($tranx->where(['id' => $id])->update($request->all())){
           return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }

    public function destroy($id){
        if(Transaksi::destroy($id)){
             return response()->json(['status' => 'success']);
        }
    }
}
