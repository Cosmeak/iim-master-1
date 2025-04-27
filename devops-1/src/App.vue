<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from '@/components/Header.vue'
</script>

<template>

  <Header />

  <main class="container">
    <RouterView />
  </main>

  <footer class="container">
    <p>
      copyleft © 2023
    </p>
  </footer>
</template>
