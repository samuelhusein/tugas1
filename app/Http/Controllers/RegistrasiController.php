<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;


class RegistrasiController extends Controller
{
    public function index()
    {
        $data['registrasi'] = Registrasi::orderBy('id','desc')->paginate(5);
        return view('index',$data);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'loc_foto'=>'required|file|image|mimes:jpeg,png,jpg',
            'loc_sertifikat'=>'file|mimes:zip,rar',
            'loc_cv'=>'file|mimes:pdf',
        ]);

        $file_foto = $request->file('loc_foto');
        $nama_file_foto = time()."_".$file_foto->getClientOriginalName();

        $tujuan_upload_foto = 'data_file/foto';
		$file_foto->move($tujuan_upload_foto,$nama_file_foto);

        $file_sert = $request->file('loc_sertifikat');
        if($request->hasFile('loc_sertifikat')){
            $nama_file_sert = time()."_".$file_sert->getClientOriginalName();
            $tujuan_upload_sert = 'data_file/sertifikat';
            $file_sert->move($tujuan_upload_sert,$nama_file_sert);
        }else{
            $nama_file_sert="";
        }
        
        if($request->hasFile('loc_cv')){
        $file_cv = $request->file('loc_cv');
        $nama_file_cv = time()."_".$file_cv->getClientOriginalName();

        $tujuan_upload_cv = 'data_file/cv';
        $file_cv->move($tujuan_upload_cv,$nama_file_cv);
        }else{
            $nama_file_cv="";
        }

        $registrasi = new Registrasi;
        $registrasi->nama_lengkap = $request->nama_lengkap;
        $registrasi->tempat_lahir = $request->tempat_lahir;
        $registrasi->tanggal_lahir = date_format(date_create($request->tanggal_lahir),"Y-m-d");
        $registrasi->gender = $request->gender;
        $registrasi->loc_foto = $nama_file_foto;
        $registrasi->loc_sertifikat = $nama_file_sert;
        $registrasi->loc_cv = $nama_file_cv;
        $registrasi->save();
        return redirect()->route('registrasi.index')->with('success','Registrasi Mahasiswa Berhasil');

    }
    public function show(Registrasi $registrasi)
    {
    return view('registrasi.show',compact('registrasi'));
    } 
}
