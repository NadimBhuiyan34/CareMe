<?php

namespace App\Http\Controllers;
use App\Models\sensordata;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class SensorController extends Controller
{
 
    //
    public function showData()
{
    // $data = sensordata::latest()->limit(1)->get();
    $data = sensordata::latest()->limit(1)->get();
    // return response()->json($data);
    return response()->json(['data'=>$data,]);
}
 
    public function store(Request $request){
    //     $project_api_key="12345";
    //    $api_key=$this->escape_data($request->api_key);
    // //    $method =$request->method();
    //     if($request->isMethod('post')){
    //          if($api_key==$project_api_key)
    //          {
    //             sensordata::create([
    //                 'room_temperature'=>$this->escape_data($request->temperature),
    //                 'humidity'=>$this->escape_data($request->humidity),
    //                 'body_temperature'=>$this->escape_data($request->bodytem),
    //                 'heart_rate'=>$this->escape_data($request->bpm)
                     
    //                ]
    //                );
    //          }
    //          else
	//              {
	// 	            echo "Wrong API Key";
	//              }
    //     }
    //     else
    //         {
	// echo "No HTTP POST request found";
    //         }
          
       
    // //    return redirect()->route('donatebooks.create')->withMessage('Successfully submitted');
  
    // }
    // public function escape_data($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;



      // Get the data sent from the ESP8266 device
      $data = $request->input('data');

      // Do something with the data
      // For example, you could store it in a database or perform some other action

      // Send a response back to the ESP8266 device
      return response()->json([
          'status' => 'success',
          'message' => 'Data received and processed successfully',
      ]);
    }
  
}
