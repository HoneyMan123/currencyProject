<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_currencies;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class CurrencyController extends Controller
{
    public function exchangeVue(){
        return Inertia::render('Exchange');
    }
    public function SubmitCurrency(Request $request){
        //variables
        $userCurrency = new user_currencies();
        $userCurrencyWhereUser = $userCurrency->where('email', Auth::user()->email);

        if ($userCurrencyWhereUser->exists() ){
            $value = $userCurrency->UpdateValue($request->input('currency'),$request->input('amountOfCurrency'));
            $getValue = $userCurrency->getValue('currency');
} else{
    $currencies = ['AUD' => 0,'BGN' => 0,'BRL' => 0,'CAD' => 0,'CHF' => 0,'CNY' => 0,'CZK' => 0,'DKK' => 0,'EUR' => 0,'GBP' => 0,'HKD' => 0,'HUF' => 0,'IDR' => 0,'ILS' => 0,'INR' => 0,'ISK' => 0,'JPY' => 0,'KRW' => 0,'MXN' => 0,'MYR' => 0,'NOK' => 0,'NZD' => 0,'PHP' => 0,'PLN' => 0,'RON' => 0,'SEK' => 0,'SGD' => 0,'THB' => 0,'TRY' => 0,'USD' => 0,'ZAR' => 0];
    user_currencies::create(['email'=>Auth::user()->email]);
    $userCurrencyWhereUser->update(['currency'=> $currencies]);
    $value = $userCurrency->UpdateValue($request->input('currency'),$request->input('amountOfCurrency'));
    echo $request->input('amountOfCurrencyExchange1');
}
return inertia::render('Exchange');
    }
    public function submitCurrencyExchange(Request $request)
    {
        $userCurrency = new user_currencies();
        $userCurrency->exchangeValue($request->currencyFirst, $request->amountOfCurrencyExchange1, $request->currencySecond, $request->amountOfCurrencyExchange2);
}
public function GetCurrencyColumn(){
    $userCurrency = new user_currencies();
    $userCurrencyWhereUser = $userCurrency->where('email', Auth::user()->email);

    $value =  $userCurrency->GetValue('currency');
    return $value;
}
public function returnAllCurrencies(){
    $userCurrency = new user_currencies();

    $userCurrencyWhereUser = $userCurrency->where('email', Auth::user()->email);

$value = $userCurrencyWhereUser->value('currency');
return $value;
}






}
