<script setup lang="ts">

import { ref } from 'vue'
import { post, get } from 'aws-amplify/api';
import { useRouter } from 'vue-router'

const router = useRouter();

const updateUserForm = ref({
  company: '',
  firstname: '',
  lastname: '',
});

const getUser = async () => {
  try {
    const userId = ref(router.currentRoute.value.params.id);
    const restOperation = get({
      apiName: 'users',
      path: '/getUser',
    });
    const response = await restOperation.response;
    const user = await response.body.json();
    const currentUser = user.find((user) => user.id === userId.value);
    console.log('currentUser', currentUser);
    updateUserForm.value = {
      company: currentUser.company,
      firstname: currentUser.firstname,
      lastname: currentUser.lastname,
    };
  } catch (error) {
    console.log('GET call failed: ', error);
  }
}
getUser();

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
            firstname: updateUserForm.value.firstname,
            lastname: updateUserForm.value.lastname,
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
    <input type="text" placeholder="firstname" v-model="updateUserForm.firstname">
    <input type="text" placeholder="lastname" v-model="updateUserForm.lastname">
    <input type="text" placeholder="company" v-model="updateUserForm.company">
    <button type="submit">Save</button>
  </form>
</template>

<style scoped>

</style>