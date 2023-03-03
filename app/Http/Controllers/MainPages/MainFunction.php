<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Mail\AdminCart;
use App\Mail\CheckOut;
use App\Models\Main\Cart;
use App\Models\Main\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class MainFunction extends Controller
{
    public function AddCart(Request $request)
    {
        $old_cart = Cart::where("course_id", "=", $request->course_id)->where("user_id", "=", Auth::user()->id)->count();
        if ($old_cart > 0) {
            echo "Cart Exists or Course Purchased!";
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->course_id = $request->course_id;
            $cart->course_title = $request->course_title;
            $cart->course_price = $request->course_price;
            $cart->ini_price = $request->ini_price;
            $cart->type = "course";
            $cart->status = "pending";
            $save = $cart->save();
            if ($save) {
                echo "Course Added to Cart Successfully!";
            } else {
                echo "Something Went Wrong!";
            }
        }
    }


    public function AddEbookCart(Request $request)
    {
        $old_cart = Cart::where("course_id", "=", $request->course_id)->where("user_id", "=", Auth::user()->id)->count();
        if ($old_cart > 0) {
            echo "Cart Exists or E-Book Has Been Purchased!";
        } else {
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->course_id = $request->course_id;
            $cart->course_title = $request->course_title;
            $cart->course_price = $request->course_price;
            $cart->ini_price = $request->ini_price;
            $cart->type = "ebook";
            $cart->status = "pending";
            $save = $cart->save();
            if ($save) {
                echo "E-Book Added to Cart Successfully!";
            } else {
                echo "Something Went Wrong!";
            }
        }
    }


    public function deleteCart($id)
    {
        // echo $id;
        $cart = Cart::find($id);
        $delete = $cart->delete();
    }


    // Verify Payment

    public function VerifyPayment($reference)
    {
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
        $payment_reference = $reference;
        $verification_id = $result->data->id;
        $amount = $result->data->amount;
        $message = $result->message;
        if ($status === true) {
            $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'pending')->get();

            //Update Payment Table
            $payment = new Payment();
            $payment->status = $status;
            $payment->payment_reference = $payment_reference;
            $payment->verification_id = $verification_id;
            $payment->amount = $amount;
            $payment->user_id = Auth::user()->id;
            $payment->save();

            foreach ($cart as $item) {
                $item->status = "paid";
                $item->payment_reference = $payment_reference;
                $update = $item->update();
            }

            if ($update) {
                Mail::to(Auth::user()->email)->send(new CheckOut($cart, $payment_reference));

                $admin = User::where('user_type', '=', 'admin')->get();
                $user = Auth::user()->name;
                foreach($admin as $admin){
                    Mail::to($admin->email)->send(new AdminCart($cart, $payment_reference, $user));
                }
                return "success";
            } else {
                return "error";
            }
        }
    }
}
