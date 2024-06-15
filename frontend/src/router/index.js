import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "../views/HomeView.vue"
import LoginView from "../views/LoginView.vue"
import RegisterView from "../views/RegisterView.vue"
import SerieView from "../views/SerieView.vue"
import SearchView from '../views/SearchView.vue'
import AccountView from '../views/accountView.vue'
import HistoryView from '@/views/HistoryView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: '/home'
    },
    {
      path: '/home',
      name: 'home',
      component: HomeView
    }, 
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/serie/:serieId',
      name: 'serie',
      component: SerieView
    },
    {
      path: '/search',
      name: 'search',
      component: SearchView
    },
    {
      path: '/account',
      name: 'account',
      component: AccountView
    },
    {
      path: '/history',
      name: 'history',
      component: HistoryView
    },
  ]
})

export default router
