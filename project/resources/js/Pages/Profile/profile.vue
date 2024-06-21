<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';


</script>
<script >
 export default {
    data(){
        return {
            allCurrencies: [],
        }
    },
    mounted(){
        this.returnAllCurrencies()
    },
    methods:{
        returnAllCurrencies(){
            axios.post('/returnCurrencies')
            .then(response=>{
                this.allCurrencies = response.data;
                console.log(response.data);
            console.log(1)
            })
            .catch(error => {
            console.error(error);
            });
        }
    }
 }
</script>
<template >
   <Head title="Profile" />
    <AuthenticatedLayout>
<template #header>
    <h2 class="profile text-gray-400 text-[30px]">Profile</h2>
</template>
<div class="allCurrencyWrap">
<div name="AUD" id="AUD" class="AUD"> </div>
<div name="BGN" id="BGN" class="BGN"> </div>
<div name="BRL" id="BRL" class="BRL"> </div>
<div name="CAD" id="CAD" class="CAD"> </div>
<div name="CHF" id="CHF" class="CHF"> </div>
<div name="CNY" id="CNY" class="CNY"> </div>
<div name="CZK" id="CZK" class="CZK"> </div>
<div name="DKK" id="DKK" class="DKK"> </div>
<div name="EUR" id="EUR" class="EUR"> </div>
<div name="GBP" id="GBP" class="GBP"> </div>
<div name="HKD" id="HKD" class="HKD"> </div>
<div name="HUF" id="HUF" class="HUF"> </div>
<div name="IDR" id="IDR" class="IDR"> </div>
<div name="ILS" id="ILS" class="ILS"> </div>
<div name="INR" id="INR" class="INR"> </div>
<div name="ISK" id="ISK" class="ISK"> </div>
<div name="JPY" id="JPY" class="JPY"> </div>
<div name="KRW" id="KRW" class="KRW"> </div>
<div name="MXN" id="MXN" class="MXN"> </div>
<div name="MYR" id="MYR" class="MYR"> </div>
<div name="NOK" id="NOK" class="NOK"> </div>
<div name="NZD" id="NZD" class="NZD"> </div>
<div name="PHP" id="PHP" class="PHP"> </div>
<div name="PLN" id="PLN" class="PLN"> </div>
<div name="RON" id="RON" class="RON"> </div>
<div name="SEK" id="SEK" class="SEK"> </div>
<div name="SGD" id="SGD" class="SGD"> </div>
<div name="THB" id="THB" class="THB"> </div>
<div name="TRY" id="TRY" class="TRY"> </div>
<div name="USD" id="USD" class="USD"> </div>
<div name="ZAR" id="ZAR" class="ZAR"> </div>
<div name="CZK" id="CZK" class="CZK"> </div>
</div>


    </AuthenticatedLayout>
</template>
