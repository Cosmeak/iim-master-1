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
    <div class="grid">
      <article>
        <header><h4 style="margin: 0;">{{ picture.title }}</h4></header>
        <img style="width: 100%;" :src="picture.image" :alt="picture.title" />
        <footer>{{ picture.explanation }}</footer>
      </article>
    </div>
  </template>



</template>