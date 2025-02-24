<template>
  <div class="p-6 bg-gray-100 min-h-screen flex flex-col items-center">
    <button 
      @click="fetchPlanets" 
      class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md mb-6 transition duration-300 ease-in-out"
    >
      Fetch Planets
    </button>

    <div v-if="planets.length" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full max-w-6xl">
      <div v-for="planet in planets" :key="planet.name" class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        <h2 class="text-xl font-semibold text-blue-600">{{ planet.name }}</h2>
        <p class="text-gray-700 mt-2"><span class="font-semibold">Rotation Period:</span> {{ planet.rotation_period }}</p>
        <p class="text-gray-700"><span class="font-semibold">Orbital Period:</span> {{ planet.orbital_period }}</p>
        <p class="text-gray-700"><span class="font-semibold">Climate:</span> {{ planet.climate }}</p>
        <p class="text-gray-700"><span class="font-semibold">Population:</span> {{ planet.population }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";

const planets = ref([]);

const fetchPlanets = async () => {
  const response = await axios.get("/api/planets");
  planets.value = response.data;
};
</script>
