import { createRouter, createWebHashHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import Alunos from '../views/Alunos.vue';

/* eslint-disable */ 
const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },
  {
    path: '/alunos',
    name: 'Alunos',
    component: Alunos
  },
  {
    path: '/cursos',
    name: 'Cursos',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    //component: /*(/* webpackChunkName: "about" */ Cursos
    component: () => import(/* webpackChunkName: "about" */ '../views/Cursos.vue')
  },
]

const router = createRouter({
  history: createWebHashHistory("/"),
  routes
})

export default router;