<script setup lang="ts">
  import { defineProps, defineEmits } from 'vue'
  defineProps<{
    title: string
    isOpen: boolean
  }>()

  const emit = defineEmits(['close'])

  const outSideClick = (e: MouseEvent) => {
    if (e.target === e.currentTarget) {
      emit('close')
    }
  }

</script>

<template>
  <dialog :open="isOpen" @click="outSideClick">
    <article>
      <header class="flex justify-between items-start relative">
        <h2>{{ title }}</h2>
        <button aria-label="Close" @click="$emit('close')" class="close-button">x</button>
      </header>
      <slot />
    </article>
  </dialog>
</template>

<style scoped>
.relative {
  position: relative;
}
.close-button {
  position: absolute;
  top: 0;
  right: 0;
  padding: 1rem;
  margin: 0.5rem;
  background: transparent;
  border: none;
  cursor: pointer;
  font-size: 1.5rem;
  line-height: 1;
  color: #333;
  transition: color 0.3s ease;
  width: fit-content;
}
</style>