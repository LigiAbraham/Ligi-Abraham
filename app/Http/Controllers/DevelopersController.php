<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function unserialize(Request $request){

    }

    public function unserializeLoad(){
        return view('developer.unserialize-repair');
    }

    public function unserializeFix(Request $request){
        $data = $request->data;
        // Remove unwanted characters
        $data = str_replace(["\r", "\n", "\t"], '', $data);

        // Fix string lengths
        $data = preg_replace_callback(
            '/s:(\d+):"(.*?)";/',
            function ($matches) {
                $actualLength = strlen($matches[2]);
                return 's:' . $actualLength . ':"' . $matches[2] . '";';
            },
            $data
        );

        // Try unserializing
        $result = @unserialize($data);

        if ($result === false && $data !== 'b:0;') {

            $tempVar = preg_replace_callback(
                '!^s:(\d+)(?=:"(.*?)";$)!s', array($this, 'serialize_fix_callback'), $data
            );
            $tempVar = preg_replace_callback(
                '!(?<=^|;)s:(\d+)(?=:"(.*?)";(?:}|a:|s:|b:|d:|i:|o:|N;))!s', array($this, 'serialize_fix_callback'), $tempVar
            );
            $result = @unserialize($tempVar);

            if ($result === false && $data !== 'b:0;') {
                return "Unable to repair serialized data.";
            }
        }

        return $result;
    }

    public function jsonDecode(Request $request){
        return json_decode($request->data);
    }

    public function jsonEncode(Request $request){
        return json_encode($request->data);
    }

    public function base64Decode(Request $request){
        return base64_encode($request->data);
    }

    public function base64Encode(Request $request){
        return base64_decode($request->data);
    }
}
