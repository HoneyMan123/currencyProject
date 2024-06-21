

<script>


    export default {
        data(){
            return {
                isCurrencyVisible: false,
                buyCurrencyIsClicked: false,
                input2: '',
                input1: '',
                CurrencyColumn: [],
                userIsPoor: '',


            };
        },
    methods: {
        getExchange() {
        fetch(`https://${host}/latest?amount=10&from=GBP&to=USD`)
            .then(resp => resp.json())
            .then((data) => {
            alert(`10 GBP = ${data.rates.USD} USD`);
            });
        },
         buyCurrency(){
    let buyCurrency = document.getElementById('buyCurrency');
   this.buyCurrencyIsClicked = true
   buyCurrency.remove();

},
submitCurrency(){
    let submitCurrency = document.getElementById('submitBtnCurrency');
    submitCurrency.addEventListener('click', function(e){
})
},

chooseCurrencyExchange(){

    let amountOfTranslatedCurrency = document.getElementById('amountOfCurrencyExchange2');
    const host = 'api.frankfurter.app';
    const firstCurrency = document.getElementById('currencyFirst').value;
    const secondCurrency = document.getElementById('currencySecond').value;
    let numberOfCurrency = document.getElementById('amountOfCurrencyExchange1').value
    if (numberOfCurrency == ''){
        numberOfCurrency = 1
    } else {
        numberOfCurrency = numberOfCurrency
    }
    fetch(`https://${host}/latest?amount=${numberOfCurrency}&from=${firstCurrency}&to=${secondCurrency}`)
    .then(resp => resp.json())
    .then((data)=>{
        if (firstCurrency != secondCurrency ){
        amountOfTranslatedCurrency.value = data.rates[secondCurrency];
        } else{
            amountOfTranslatedCurrency.innerText = 'please choose different currencies'
        }
    })


},
exchangeSubmit2() {
axios.post('/GetCurrencyColumn')
.then(response =>{
    const firstCurrency = document.getElementById('currencyFirst').value;
    let   amountOfCurrencyExchange1 = document.getElementById('amountOfCurrencyExchange1').value;

    this.CurrencyColumn = response.data;
   let firstInputColumnValue =  this.CurrencyColumn[firstCurrency]

if (firstInputColumnValue > amountOfCurrencyExchange1){
    this.userIsPoor = false;

    axios.post('/save-data', {
  amountOfCurrencyExchange2: document.getElementById('amountOfCurrencyExchange2').value,
  amountOfCurrencyExchange1: document.getElementById('amountOfCurrencyExchange1').value,
  currencyFirst: document.getElementById('currencyFirst').value,
  currencySecond: document.getElementById('currencySecond').value,
})
  .then(response => {
    console.log(response);
  })
  .catch(error => {
    console.error(error);
  });} else{
    this.userIsPoor = true;
 }

})
.catch(error=>{
    console.log(error)
})

},

exchangeCurrency(){
let buttonSubmitExchangment= document.getElementById('buttonSubmitExchangment');
this.isCurrencyVisible = true;
buttonSubmitExchangment.remove()
},
    }
    }
    </script>
    <script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import axios from 'axios';

    import DropdownLink from '@/Components/DropdownLink.vue';
import { Axios } from 'axios';
import { getTransitionRawChildren } from 'vue';
    </script>

    <template>
        <Head title="Exchange" />
        <AuthenticatedLayout>
    <template #header>
        <h2 class="profile text-gray-400 text-[30px]">Exchange</h2>
    </template>
  <div class="exchangeClass flex flex-col items-center gap-10 " >
<button class="a text-[35px] gap-30 text-gray-300 " id="buttonSubmitExchangment" @click="exchangeCurrency" >Exchange</button>
<div v-if="isCurrencyVisible">
    <div class="exchangeContainer flex flex-row ">
        <div class="thingToProceedBuying text-[35px] pr-5 ">
            <form class="menuCurrency pb-5"  id="submitCurrencyExchange"   >
                <div class="allCurrencyInputs flex items-stretch">
                    <select name="currencyFirst" id="currencyFirst" multiple>
                    <option value="AUD">AUD</option><option value="BGN">BGN</option><option value="BRL">BRL</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CNY">CNY</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="HKD">HKD</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="ISK">ISK</option><option value="JPY">JPY</option><option value="KRW">KRW</option><option value="MXN">MXN</option><option value="MYR">MYR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PHP">PHP</option><option value="PLN">PLN</option><option value="RON">RON</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="USD">USD</option><option value="ZAR">ZAR</option><option value="CZK">CZK</option>
                    </select>
                    <input id="amountOfCurrencyExchange1" v-model="input1"  name="amountOfCurrencyExchange1" type="number">
                </div>
            </form>

            <form  class="menuCurrency2"  id="submitCurrency">
                <div class="allCurrencyInputs flex items-stretch">
                    <select @click="chooseCurrencyExchange" name="currencySecond" id="currencySecond" multiple>
                        <option value="AUD">AUD</option><option value="BGN">BGN</option><option value="BRL">BRL</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CNY">CNY</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="HKD">HKD</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="ISK">ISK</option><option value="JPY">JPY</option><option value="KRW">KRW</option><option value="MXN">MXN</option><option value="MYR">MYR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PHP">PHP</option><option value="PLN">PLN</option><option value="RON">RON</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="USD">USD</option><option value="ZAR">ZAR</option><option value="CZK">CZK</option></select>
                            <input name="amountOfCurrencyExchange2"   v-model="input2" id="amountOfCurrencyExchange2" class="bg-white w-full"></input>
                    </div>
                    <input id="exchangeSubmit2" @click.prevent="exchangeSubmit2"  class="submitCurrencyExchange text-white text-[40px]" type="submit"></input>
                </form>
            </div>
            <div v-if="userIsPoor" class="youPoor text-white text-[25px] ">You dont have enough currency to exchange!</div>
            </div>
    </div>
    <div class="buyContainer">
        <button  id="buyCurrency" class="buyCurrency text-[35px] text-gray-300 " @click="buyCurrency">Buy currency</button>
<div v-if="buyCurrencyIsClicked"><div class="thingToProceedBuying text-[35px]"><form class="menuCurrency" id="submitCurrency" action="submitCurrency"><div class="allCurrencyInputs flex items-stretch"><select name="currency" id="currency" multiple><option value="AUD">AUD</option><option value="BGN">BGN</option><option value="BRL">BRL</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CNY">CNY</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="HKD">HKD</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="ISK">ISK</option><option value="JPY">JPY</option><option value="KRW">KRW</option><option value="MXN">MXN</option><option value="MYR">MYR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PHP">PHP</option><option value="PLN">PLN</option><option value="RON">RON</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="USD">USD</option><option value="ZAR">ZAR</option><option value="CZK">CZK</option></select><input id="inputNumber" name="amountOfCurrency" type="number"></div><input id="submitBtnCurrency" action="submitBuyCurrency" @click="submitCurrency" class="submitCurrency text-white" type="submit"   value="Submit"></form></div></div>
    </div>
  </div>
</AuthenticatedLayout>
        </template>
