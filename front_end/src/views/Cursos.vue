<template>
  <div class="main-container">
    <h1>Cursos</h1>
    <CursosExibir/>
  </div>
</template>
<script>
import CursosExibir from '@/components/CursosExibir.vue';

// @ is an alias to /src
/* eslint-disable */
export default {
    name: "Cursos",
    components: { CursosExibir }
}
</script>