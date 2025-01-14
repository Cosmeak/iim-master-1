<script setup lang="ts">

import { RouterLink } from 'vue-router'
import Modal from '@/components/Modal.vue'
import AuthForm from '@/components/AuthForm.vue'
import { Authenticator } from '@aws-amplify/ui-vue'
import { ref } from 'vue'

const modalAuth = ref(false)



</script>

<template>

  <nav class="container">
    <ul>
      <li><strong>Brand</strong></li>
    </ul>
    <ul>
      <li>
        <RouterLink to="/">Home</RouterLink>
      </li>
      <li>
        <RouterLink to="/nasa">Nasa</RouterLink>
      </li>
      <li>
        <button @click="modalAuth = !modalAuth">Auth</button>
      </li>

    </ul>
  </nav>

  <modal title="Connect with us" :isOpen="modalAuth" @close="modalAuth = false">
    <auth-form />
  </modal>
</template>