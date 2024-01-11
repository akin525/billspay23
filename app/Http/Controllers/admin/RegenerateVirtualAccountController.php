<?php

namespace App\Http\Controllers\admin;

use App\Console\encription;
use App\Http\Controllers\Controller;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use RealRashid\SweetAlert\Facades\Alert;

class RegenerateVirtualAccountController extends Controller
{
function regenrateaccount1($request)
{
    $user=User::where('id', $request)->first();
    $wallet=wallet::where('username', $user->username)->first();

    $username=$user['username'].rand(111, 999);
    $email=$user['email'];
    $name=$user['name'];
    $phone=$user['phone'];


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://pay.sammighty.com.ng/api/createaccount1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $user['name'],
            'uniqueid' => $user['username'].rand(0000, 9999),
            'email' => $user['email'], 'webhook'=>'https://paydow.ashmarkets.com/api/account1',
            'phone' => "08146328645"),
        CURLOPT_HTTPHEADER => array(
            'apikey: sk-RwQM6hymqWCe43ct3esB'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $data = json_decode($response, true);
//            return $response;
    if ($data['success'] == "1") {
        $account = $data["data"]["data"]["account_name"];
        $number = $data["data"]["data"]["account_number"];
        $bank = $data["data"]["data"]["bank_name"];
        $refid = $data["data"]["data"]["account_reference"];
        $wallet->account_number = $number;
        $wallet->account_name = $account;
        $wallet->bank = $bank;
        $wallet->refid = $refid;
        $wallet->save();
        $transaction = transaction::create([
            'username' => $user['username'],
            'activities' => 'Virtual Account Generated Successfully',
        ]);

        $msg="Account Generated Succesfully";
        Alert::success('success', $msg);
        return back();
    } elseif ($data['success'] == 0) {

        Alert::error('Error', $response);
        return back();
    }
}
function regenrateaccount($request)
{
    $user=User::where('id', $request)->first();
    $wallet=wallet::where('username', $user->username)->first();

    $username=$user['username'].rand(111, 999);
    $email=$user['email'];
    $name=$user['name'];
    $phone=$user['phone'];


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://integration.mcd.5starcompany.com.ng/api/reseller/virtual-account3',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('account_name' => $name,
            'business_short_name' => 'EFE','uniqueid' => $username,
            'email' => $email,'dob' => $user['dob'],
            'address' => $user['address'],'gender' => $user['gender'], 'provider'=>'safeheaven',
            'phone' =>$phone,'webhook_url' => 'https://app.efemobilemoney.com/api/run1'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: mcd_key_aq9vGp2N8679cX3uAU7zIc3jQfd'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $data = json_decode($response, true);
    if ($data['success']==1){
        $account = $data["data"]["customer_name"];
        $number = $data["data"]["account_number"];
        $bank = $data["data"]["bank_name"];

        $wallet->account_number=$number;
        $wallet->account_name=$account;
        $wallet->bank=$bank;
        $wallet->save();

        $transaction=transaction::create([
            'username'=>$user['username'],
            'activities'=>'Virtual Account Generated Successfully',
        ]);

        Alert::success('Success', 'Account Details Generated Successful');
        return back();
    }elseif ($data['success']==0){
        Alert::error('Oops', $response);
        return back();
    }
}
}
