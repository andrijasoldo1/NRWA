<script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'
import AppHeader from "@/components/header.vue";
import Header from "@/components/header.vue";
</script>

<template>

    <Header/>
    
      <RouterView class="full_screen"/>
  
</template>

<style>
.full_screen {
  width: 100%;
  margin: 0; /* Uklanja bilo kakve margine */
  padding: 0; /* Uklanja bilo kakve paddinge */
  box-sizing: border-box; /* Osigurava da padding i border ne utječu na ukupnu širinu */
}
</style>
