<?php

namespace App\Jobs;

use App\Mail\Emailotp;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class virtualaccountjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $wallet = wallet::where('username', $this->user->username)->first();

        //
        $username=$this->user['username'].rand(111, 999);

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
            CURLOPT_POSTFIELDS => array('name' => $this->user['name'],
                'uniqueid' => $this->user['username'].rand(000,999),
                'email' => $this->user['email'],'webhook' => "https://paydow.ashmarkets.com/api/account1",
                'phone' =>$this->user['phone']),
            CURLOPT_HTTPHEADER => array(
                'apikey: sk-RwQM6hymqWCe43ct3esB'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['success']=="1"){
            $account = $data["data"]["data"]["account_name"];
            $number = $data["data"]["data"]["account_number"];
            $bank = $data["data"]["data"]["bank_name"];
            $refid = $data["data"]["data"]["account_reference"];

            $wallet->account_number = $number;
            $wallet->account_name= $account;
            $wallet->bank=$bank;
            $wallet->refid = $refid;
            $wallet->save();

        }elseif ($data['success']==0){


        }
        $transaction=transaction::create([
            'username'=>$this->user['username'],
            'activities'=>'Virtual Account Generated Successfully',
        ]);


    }
}
