<script setup>
  import { Authenticator } from "@aws-amplify/ui-vue";
  import "@aws-amplify/ui-vue/styles.css";

  import { Amplify } from 'aws-amplify';
  import config from '../amplifyconfiguration.json';
  Amplify.configure(config);
</script>

<template>
  <authenticator>
    <template v-slot="{ user, signOut }">
      <article>
        <a :href="'/user/' + user.username">Profile</a>
      </article>
      <button @click="signOut">Sign Out</button>
    </template>
  </authenticator>
</template>
