<template>
    <div>

        <h1 class="mx-auto text-center my-4 text-3xl font-bold leading-none tracking-tight text-emerald-400 md:text-5xl lg:text-6xl dark:text-emerald-400">Register a customer</h1>
        <form @submit.prevent="createCustomer" class="max-w-sm mx-auto">
          <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer name</label>
            <input v-model="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="customer's full name" required>
          </div>
          <div class="mb-5">
            <label for="ssn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer social security number</label>
            <input v-model="ssn" type="text" id="ssn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>

          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import axios from "axios";
import { ref } from "vue";

const name = ref("");
const ssn = ref("");
const router = useRouter();

const createCustomer = async () => {
    try {
        const response = await axios.post("/api/customers", {
            name: name.value,
            ssn: ssn.value,
        });

        router.push({ name: "accounts", params: { id: response.data.id }})
    } catch (error) {
        console.log(error);
    }
};
</script>
