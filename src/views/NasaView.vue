<script setup>
import { get } from 'aws-amplify/api';

import { ref } from 'vue'

const nasa = ref([]);

async function getPictures() {
  try {
    const restOperation = get({
      apiName: 'nasa',
      path: '/getNasaPictures',
    });
    const response = await restOperation.response;
    nasa.value = await response.body.json();
    console.log('GET call succeeded: ', response);
  } catch (error) {
    console.log('GET call failed: ', error);
  }
}

getPictures();

</script>

<template>

  <h1>Nasa</h1>

  <template v-for="(picture, index) in nasa" :key="index">
    <div class="card">
      <h4>{{ picture.title }}</h4>
      <img :src="picture.image" :alt="picture.title" />
      <p>{{ picture.explanation }}</p>
    </div>
  </template>



</template>