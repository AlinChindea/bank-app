<template>
    <section>
      <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-[#4B4B4B] rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl md:text-2xl lg:text-4xl font-semibold leading-tight tracking-tight text-emerald-400  dark:text-emerald-400">Register a customer</h1>
              <form @submit.prevent="createCustomer" class="space-y-4 md:space-y-6">
                <div class="mb-5">
                  <label for="name" class="block mb-2 text-sm md:text-lg font-medium text-white dark:text-white">Customer name</label>
                  <input v-model="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="customer's full name" required>
                </div>
                <div class="mb-5">
                  <label for="ssn" class="block mb-2 text-sm md:text-lg font-medium text-white dark:text-white">Customer's social security number</label>
                  <input v-model="ssn" type="text" id="ssn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <button type="submit" class="text-[#353535] bg-rose-400 hover:bg-rose-600 focus:ring-4 focus:outline-none focus:ring-rose-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-rose-400 dark:hover:bg-rose-600 dark:focus:ring-rose-700">Submit</button>
              </form>
            </div>
        </div>
      </div>
    </section>
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
