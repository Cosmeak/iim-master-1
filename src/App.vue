<script setup>
import { RouterLink, RouterView } from 'vue-router'
import AuthForm from './components/AuthForm.vue'
</script>

<template>
    <header>
        <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

        <div class="wrapper">
            <nav>
                <RouterLink to="/">Home</RouterLink>
                <RouterLink to="/nasa">Nasa</RouterLink>
            </nav>
        </div>
    </header>

    <AuthForm />
    <RouterView />
</template>
