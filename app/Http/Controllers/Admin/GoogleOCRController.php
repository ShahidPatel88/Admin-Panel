<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Likelihood;

class GoogleOCRController extends Controller
{
    public function index()
    {
        return view('backend.ocr.googleOcr');
    }

    /**
     * handle the image
     *
     * @param 
     * @return void
     */
    public function submit(Request $request)
    {
        
        if($request->file('image')) {

            // convert to base64
            $image = base64_encode(file_get_contents($request->file('image')));
            
            $client = new ImageAnnotatorClient();
            $client->setImage($image);
            $client->setFeature("TEXT_DETECTION");

            $google_request = new GoogleCloudVision([$client],  env('GOOGLE_CLOUD_KEY'));

            $response = $google_request->annotate();

            dd($response);
        }
    }
}
