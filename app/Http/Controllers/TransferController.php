<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TransferController
{

    function allbank()
    {

        $user=User::where('username', Auth::user()->username)->first();
//        if ($user->bvn == null){
//            $msg="Kindly Update your BVN on your profile";
//            return redirect('account')->with('error', $msg);
//        }
//
//        if ($user->withdraw == "0"){
//            $msg="Transfer option not enable kindly contact the admin";
//            return redirect('account')->with('error', $msg);
//        }else {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.paylony.com/api/v1/bank_list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. env('PAYLONY')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;


            $data = json_decode($response, true);

            $bank = $data["data"]["banks"];
            return view('transfer', compact('bank'));
//        }
    }

    function verifyaccount($valuea, $valueb)
    {

        $url = 'https://app.paylony.com/api/v1/account_name';

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . env('PAYLONY')
        );

        $data = array(
            "bank_code" =>$valueb,
            "account_number" => $valuea,
        );

        $options = array(
            'http' => array(
                'header' => implode("\r\n", $headers),
                'method' => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        $data = json_decode($response, true);


        if ($data["success"]=="true"){
            $name=$data['data'];
        }else{
            $name=$data["message"];
        }

        return response()->json($name);

    }

    function withdraw(Request $request)
    {

        $request->validate([
            'amount'=>'required',
            'number'=>'required',
            'id'=>'required',
            'narration'=>'required',
            'name'=>'required',
            'refid'=>'required',
        ]);

        $user = User::find($request->user()->id);
        $wallet = wallet::where('username', $user->username)->first();

        if ($wallet->balance < $request->amount) {
            $mg = "Insufficient Balance in your wallet";

            return response()->json($mg, Response::HTTP_BAD_REQUEST);


        }
        if ($request->amount < 0) {

            $mg = "error transaction";
            return response()->json($mg, Response::HTTP_BAD_REQUEST);

        }
        if ($request->amount < 100) {

            $mg = "amount must be more than or 100 above";
            return response()->json($mg, Response::HTTP_BAD_REQUEST);

        }
        $bo = Withdraw::where('refid',$request->refid)->first();
        if ($bo){
            $mg = "duplicate transaction";
            return response()->json([
                'message' => $mg, 'user'=>$user
            ], 200);
        }else{


            $tamount=$wallet->balance-$request->amount;
            $ramount=$tamount-10;
            $wallet->balance=$ramount;
            $wallet->save();



//            $payloadData = array(
//                "account_name"=>$request->name,
//                "account_number" => $request->number,
//                "amount" => $request->amount,
//                "bank_code" => $request->id,
//                "narration" => $request->narration,
//                "reference" => $request->refid,
//                "sender_name" => $request->name,
//            );


            $url = 'https://pay.sammighty.com.ng/api/transfer';

            $headers = array(
                'Content-Type: application/json',
                'apikey: sk-RwQM6hymqWCe43ct3esB'
            );

            $data = array(
                "name"=>$request->name,
                "number"=>$request->number,
                "amount"=>$request->amount,
                "id"=>$request->id,
                "narration"=>$request->narration,
                "refid"=>$request->refid,
                "sender_name"=>$request->name,
            );

            $options = array(
                'http' => array(
                    'header' => implode("\r\n", $headers),
                    'method' => 'POST',
                    'content' => json_encode($data),
                ),
            );

            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            $data = json_decode($response, true);
            $create=Withdraw::create([
                'username'=>$user->username,
                'amount'=>$request->amount,
                'plan'=>$request->id,
                'refid'=>$request->refid,
                'bank'=>$request->bank,
                'account_no'=>$request->number,
                'name'=>$request->name,
                'status'=>1,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => $data['message'],
            ]);

        }

    }

}
