<template>
  <div>
    <div id="cursos_form">
      <form id="cursos-form" @submit="createAluno">
        <div class="input-container">
          <label htmlFor="name"
            >Nome do Aluno
            <input
              id="name"
              type="text"
              name="name"
              v-model="name"
              placeholder="Digite o Curso:"
            />
          </label>
        </div>
        <div class="input-container">
          <label for="email">Email</label>
          <input
            id="email"
            type="email"
            name="email"
            v-model="email"
            placeholder="Digite o email"
          />
        </div>
        <div class="input-container">
          <label for="data_nascimento">Data de Nascimento</label>
          <input
            id="data_nascimento"
            type="date"
            name="data_nascimento"
            v-model="data_nascimento"
            placeholder="  /  /   "
          />
        </div>
        <div class="input-container">
          <label for="curso">Curso</label>
          <select
            id="curso"
            type="text"
            name="descricao"
            v-model="curso_aluno"
            placeholder="Curso:"
          >
            <option value="">Escolha o curso</option>
            <option v-for="curso in cursos" :key="curso.id" :value="curso.id">
              {{ curso.titulo }}
            </option>
          </select>
        </div>
        <div class="">
          <input type="submit" value="Matricular" />
        </div>
      </form>
    </div>
    <div>
      <ul>
        <li class="grade" v-for="aluno in alunos" :key="aluno.id">
          <div class="">
            <p>Aluno: {{ aluno.nome }}</p>
            <p>email: {{ aluno.email }}</p>
            <p>Data de Nascimento: {{ aluno.data_nascimento }}</p>
            <p>Curso: {{ aluno.curso }}</p>
            <button class="delete-btn" @click="deleteAluno(aluno.id)">
              Apagar Aluno
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
/* eslint-disable */
export default {
  name: "AlunosExibir",
  data() {
    return {
      alunos: null,
      cursos: null,
    };
  },
  methods: {
    async getAlunos() {
      const req = await fetch("http://localhost:8888/api/alunos/descricao");
      const data = await req.json();
      this.alunos = data;

      console.log(this.alunos);
    },
    async getCursos() {
      const req = await fetch("http://localhost:8888/api/cursos");
      const data = await req.json();
      this.cursos = data;
      console.log(this.cursos);
    },
    async createAluno(e) {
      e.preventDefault();
      console.log("Aluno Criado");
      const data = {
        nome: this.name,
        email: this.email,
        data_nascimento: this.data_nascimento,
        curso_id: this.curso_aluno,
      };
      console.log("data", data);
      const dataJson = JSON.stringify(data); // transforma em JSON
      console.log("json", dataJson);
      const req = await fetch("http://localhost:8888/api/alunos/novo", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: dataJson,
      });
      const res = await req.json();
      console.log(res);
      //colocar uma mensagem de sistema
      // limpar os campos, limpa o v:model
      this.name = "";
      this.email = "";
      this.data_nascimento = "";
      this.curso_aluno = "";

      this.getAlunos();
    },

    
    async deleteAluno(id) {
      console.log(id);
      await fetch(`http://localhost:8888/api/alunos/apagar/${id}`, {
        method: "DELETE",
      });

      // const res = await req.json();
      this.getAlunos();
    },
  },
  mounted() {
    this.getAlunos();
    this.getCursos();
  },
};
</script>

<style>
</style>
