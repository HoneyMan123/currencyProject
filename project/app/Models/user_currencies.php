<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class user_currencies extends Model
{



Protected function casts():array
{
    return [
        'currency' => 'array',
    ];
}

    protected $table = 'user_currencies';
    use HasFactory;
    protected $fillable = ['email'];

    public function UpdateValue($index, $value)
    {
        $currency = user_currencies::where('email', Auth::user()->email)->value('currency');
        $currency[$index] += $value;
        user_currencies::where('email', Auth::user()->email)->update(['currency' => $currency]);
    }


    public function GetValue($value){
        return  user_currencies::where('email', Auth::user()->email)->value($value);

    }

    public function decreaseValue($index1, $valueFirstArgument){
        $currency = user_currencies::where('email', Auth::user()->email)->value('currency');
$currency[$index1] = $currency[$index1] - $valueFirstArgument;
user_currencies::where('email', Auth::user()->email)->update(['currency' => $currency]);
    }
    public function exchangeValue($index1, $valueFirstArgument, $index2 ,$valueSecondArgument){
//increase second index value
$this->UpdateValue($index2, $valueSecondArgument);
//decrease first index value
$this->decreaseValue($index1, $valueFirstArgument);




    }


}
