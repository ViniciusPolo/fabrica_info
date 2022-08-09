<template>
  <div>
    <div class="cursos_form">
      <form id="cursos-form" @submit="createCurso">
        <div class="input-container">
          <label for="name">Nome do Curso</label>
          <input
            id="name"
            type="text"
            name="name"
            v-model="name"
            placeholder="Digite o Curso:"
          />
        </div>
         <div class="input-container">
          <label for="descricao">Descrição do Curso</label>
          <input
            id="descricao"
            type="text"
            name="descricao"
            v-model="descricao"
            placeholder="Descreva o Curso:"
          />
        </div>
          <div class="">
            <input type="submit" value="Novo Curso">
          </div>
      </form>
    </div>
    <div>
      <ul>
        <li class = "grade" v-for="curso in cursos" :key="curso.id">
          <p>{{ curso.titulo }}</p>
          <p>Descrição: {{ curso.descricao }}</p>
          <button class="delete-btn" @click="deleteCurso(curso.id)">
            Apagar Curso
          </button>
          <button class="delete-btn" @click="deleteCurso(curso.id)">
            Ver Curso
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
/* eslint-disable */ 
export default {
  name: "CursosExibir",
  data() {
    return {
      cursos: null,
    };
  },
  methods: {
    async getCursos() {
      const req = await fetch("http://localhost:8888/api/cursos");
      const data = await req.json();
      this.cursos = data;

      console.log(this.cursos);
    },

    async createCurso(e) {
            e.preventDefault();
            console.log("Curso Criado");
            const data = {
                titulo: this.name,
                descricao: this.descricao,
            };
            console.log("data", data);
            const dataJson = JSON.stringify(data); // transforma em JSON
            console.log("json", dataJson);
             const req = await fetch("http://localhost:8888/api/cursos/novo", {
                 method: "POST",
                 headers: { "Content-Type": "application/json" },
                 body: dataJson
             });
             const res = await req.json();
             console.log(res);
            //colocar uma mensagem de sistema
        // limpar os campos, limpa o v:model
            this.name = "";
            this.descricao = "";

            this.getCursos();

    },


    async deleteCurso(id) {
      console.log(id);
      await fetch(`http://localhost:8888/api/cursos/apagar/${id}`, {
        method: "DELETE",
      });

      // const res = await req.json();
      this.getCursos();
    },
  },
  mounted() {
    this.getCursos();
  },
};
</script>

<style scoped>

</style>
