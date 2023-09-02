import { createRouter, createWebHistory } from 'vue-router'

import ToDoView from '../components/ToDo.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path : '/',
      name : 'ToDoView',
      component : ToDoView,
      children : [
      ]
    }
  ]
})

export default router
