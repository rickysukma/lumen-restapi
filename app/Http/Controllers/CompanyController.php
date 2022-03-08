<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
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
        $company = Company::get();
        return response()->json(['result' => $company]);
    }
    
    public function show(Request $request, $kode){
        $company = Company::where('kode',$kode)->get();
        return response()->json(['result' => $company]);
    }

    public function store(Request $request){
        $this->validate($request, [
        'kode' => 'required',
        'nama' => 'required'
         ]);
        if(Company::create($request->all())){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    public function update(Request $request, $kode){
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required'
         ]);
         $company = new Company();
        if($company->where(['kode' => $kode])->update($request->all())){
           return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }

    public function destroy($kode){
        if(Company::destroy($kode)){
             return response()->json(['status' => 'success']);
        }
    }
}
