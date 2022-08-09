<template>
  <div class="main-container">
    <h1>Alunos</h1>
    <AlunosExibir/>
  </div>
</template>
<script>
import AlunosExibir from '@/components/AlunosExibir.vue';

// @ is an alias to /src
/* eslint-disable */
export default {
    name: "Alunos",
    components: { AlunosExibir }
}
</script>