<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Ciclo;
use Doutrina\Models\File;
use Doutrina\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    protected $usuario;
    protected $aquivos;
    protected $ciclo;

    public function __construct(User $usuario, File $arquivos, Ciclo $ciclo)
    {
        $this->middleware('auth');
        $this->usuario  = $usuario;
        $this->arquivos = $arquivos;
        $this->ciclo    = $ciclo;
    }
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user   = $this->arquivos->where('users_id', '=', $userId)->get();
        $ciclo  = $this->ciclo->all();
        return view('arquivos/index', compact('user', 'ciclo'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('documento')) {
            $nome        = $this->sanitizeString($request->name);
            $documento   = $request->file('documento');
            $filename    = $nome. '.' . $documento->getClientOriginalExtension();
            $storagePath = public_path('uploads/arquivos/');
            $documento->move($storagePath,$filename);

            $file           = new File();
            $file->name     = $filename;
            $file->users_id = $request->userId;
            $file->ciclo_id = $request->ciclo_id;
            $file->save();

        }

        return redirect()->back()->with('status','Upload realizado com sucesso!');
    }
    public function download($fileId)
    {
        $file = \Doutrina\Models\File::find($fileId);
        $storagePath = public_path('uploads/arquivos');
        return \Response::download($storagePath.'/'.$file->name);
    }
    public function destroy($fileId)
    {
        $file = \Doutrina\Models\File::find($fileId);
        $storagePath = public_path('uploads/arquivos');
        $file->delete();
        unlink($storagePath.'/'.$file->name);
        return redirect()->back()->with('success', 'Arquivo removido com sucesso!');
    }

    public function sanitizeString($string) {

        // matriz de entrada
        $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );

        // matriz de saída
        $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

        // devolver a string
        return strtolower(str_replace($what, $by, $string));
    }
}
