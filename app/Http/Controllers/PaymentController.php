<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Exception\CardException;

class PaymentController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(config('cashier.STRIPE_SECRET'));
    }
    public function payment(Request $request)
    {
        // $user = auth()->user();
        // dd($request->all(), $request->stripeToken);
        // $input = $request->all();
        // $token =  $request->stripeToken;
        // $paymentMethod = $request->paymentMethod;
        try {

            // $stripe = new \Stripe\StripeClient(config('cashier.STRIPE_SECRET'));
            // dd($stripe, $request->all());

            $token = $this->createToken($request);

            $charge = $this->createCharge($token['id'], 200);
            dd($token,$charge);
            // $stripe->tokens->create([
            //     'card' => [
            //         'number' => $request->number,
            //         'exp_month' => 12,
            //         'exp_year' => 2023,
            //         'cvc' => 123,
            //         ]
            // ]);


            // Stripe\Stripe::setApiKey(config('cashier.STRIPE_SECRET'));
            
            // if (is_null($user->stripe_id)) {
            //     $stripeCustomer = $user->createAsStripeCustomer();
            // }

            // \Stripe\Customer::createSource(
            //     $user->stripe_id,
            //     ['source' => $token]
            // );

            // $user->newSubscription('test',$input['plane'])
            //     ->create($paymentMethod, [
            //     'email' => $user->email,
            // ]);

            return back()->with('success','Subscription is completed.');
        } catch (\Exception $e) {
            return back()->with('success',$e->getMessage());
        }
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => 4242424242424242,
                    'exp_month' => 12,
                    'exp_year' => 23,
                    'cvc' => 123
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (\Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                // 'customer' => "Henry Ahmad",
                'description' => 'My secend payment'
            ]);
        } catch (\Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
