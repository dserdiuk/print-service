<?php

namespace App\Http\Controllers;

use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppController extends Controller
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

    public function showIndexPage()
    {

    }

    public function uploadPdf(Request $request)
    {
        $request->file('file')->storeAs('public', 'pdf/file.pdf');
        ConvertApi::setApiSecret('dxdgaUGOrszBjqER');
        $files = Storage::disk('uploads')->allFiles('/images');
        Storage::disk('uploads')->delete($files);
        $result = ConvertApi::convert('png', [
            'File' => storage_path('app/public/pdf/file.pdf'),
            'ImageHeight' => '300',
            'ImageWidth' => '200',
            'ScaleImage' => 'True',
        ], 'pdf'
        );
        $result->saveFiles(public_path('uploads/images/'));
        $files = Storage::disk('uploads')->allFiles('/images');
        return view('pages', ['pages' => $files]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
