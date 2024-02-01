<template>
    <section>
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h1 class="mb-4 text-xl md:text-2xl lg:text-4xl font-semibold leading-tight tracking-tight text-gray-900 dark:text-white">Add a new account</h1>
            <form @submit.prevent="createAccount">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="account" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account number</label>
                        <input v-model="account_number" type="text" name="account" id="account" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type or generate account number" required>
                    </div>
                    <div>
                        <label for="account_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account name</label>
                        <select v-model="account_name" id="account_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option selected="">Select name</option>
                            <option value="brokerage">Brokerage</option>
                            <option value="certificate_of_deposit">Certificate of deposit</option>
                            <option value="checking">Checking</option>
                            <option value="credit_card">Credit card</option>
                            <option value="investment">Investment</option>
                            <option value="loan">LOAN</option>
                            <option value="mortgage">Mortgage</option>
                            <option value="pension">Pension</option>
                            <option value="savings">Savings</option>
                        </select>
                    </div>
                    <div>
                        <label for="currency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Currency</label>
                        <select v-model="currency" id="currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option selected="">Select currency</option>
                            <option value="NOK">Norwegian kroner</option>
                            <option value="EUR">Euro</option>
                            <option value="USD">US dollars</option>
                            <option value="GBP">British pound</option>
                            <option value="DKK">Danish kroner</option>
                            <option value="SEK">Swedish kroner</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-[#353535] bg-rose-400 rounded-lg focus:ring-4 focus:ring-rose-300 dark:bg-rose-400 dark:hover:bg-rose-600 dark:focus:ring-rose-700 hover:bg-rose-600">
                    Add account
                </button>
            </form>
        </div>
    </section>
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router';
import axios from "axios";
import { ref } from "vue";

const route = useRoute();
const id = ref(route.params.id);
const account_number = ref("");
const account_name = ref("");
const currency = ref("");

const createAccount = async () => {
    try {
        const response = await axios.post(`/api/customers/${id.value}/accounts`, {
            account_number: account_number.value,
            account_name: account_name.value,
            currency: currency.value,
        });
    } catch (error) {
        console.log(error);
    }
};
</script>
