<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Mail\CheckOut;
use App\Models\Main\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class MainFunction extends Controller
{
    public function AddCart(Request $request){
        $old_cart = Cart::where("course_id", "=", $request->course_id)->where("user_id", "=", Auth::user()->id)->count();
        if($old_cart > 0){
            echo "Cart Exists!";
        }else{
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->course_id = $request->course_id;
            $cart->course_title = $request->course_title;
            $cart->course_price = $request->course_price;
            $cart->ini_price = $request->ini_price;
            $cart->status = "pending";
            $save = $cart->save();
            if($save){
                echo "Course Added to Cart Successfully!";
            }else{
                echo "Something Went Wrong!";
            }
        }
    }


    public function deleteCart($id){
        // echo $id;
        $cart = Cart::find($id);
        $delete = $cart->delete();
    }


    // Verify Payment

    public function VerifyPayment($reference){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_81aa8604b6920d33b92528851750b0e1b2b7db74",
        "Cache-Control: no-cache",
        ),
        ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $result = json_decode($response);

    $status = $result->status;
    // $payment_reference = $result->reference;
    // $verification_id = $result->id;
    // $amount = $result->amount;
    // $message = $result->message;
    if($status === true){
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'pending')->get();

        foreach($cart as $item){
            $item->status = "paid";
            $update = $item->update();
        }

        if($update){
            Mail::to(Auth::user()->email)->send(new CheckOut($cart));
            return "success";
        }else{
            return "error";
        }
    }
    }
}
