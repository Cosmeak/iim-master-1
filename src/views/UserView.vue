<script setup lang="ts">

import { ref } from 'vue'
import { post } from 'aws-amplify/api';

const updateUserForm = ref({
  company: '',
});

async function handleUpdateUser() {
  try {
    await post(
      {
        apiName: 'users',
        path: '/updateUser',
        options: {
          headers: {
            'Content-Type': 'application/json',
          },
          body: {
            company: updateUserForm.value.company,
          },
        }
      }
    );
  } catch (error) {
    console.error('Erreur lors de l’update :', error);
  }
}


</script>

<template>

  <h1>Profil page</h1>

  <form @submit.prevent="handleUpdateUser">
    <input type="text" placeholder="company" v-model="updateUserForm.company">
    <button type="submit">Save</button>
  </form>
</template>

<style scoped>

</style>