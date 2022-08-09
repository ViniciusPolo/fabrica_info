<template>
  <div class="justify-content-center">
    <Navbar />
    <div>
      <router-view />
    </div>
  </div>
</template>

<script>
/* eslint-disable */
import Navbar from "./components/Navbar.vue";


export default {
  components: {
    Navbar,
  },
};
</script>

<style>
</style>

    