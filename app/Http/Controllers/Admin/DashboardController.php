<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;


class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function get_ocr(){
        return view('backend.ocr.upload_image');
    }
}
