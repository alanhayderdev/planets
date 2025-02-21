<template>
  <button @click="fetchPlanets" class="bg-blue-500 text-white px-4 py-2 rounded">
    Fetch Planets
  </button>
  <ul v-if="planets.length">
    <li v-for="planet in planets" :key="planet.name">{{ planet.name }}</li>
  </ul>
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
