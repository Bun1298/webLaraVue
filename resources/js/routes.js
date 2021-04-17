import ListJurusan from './components/ListJurusan.vue';
import CreateJurusan from './components/CreateJurusan.vue';
import EditJurusan from './components/EditJurusan.vue';
import Admin from './components/Admin.vue';
import Home from './components/Index.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import DetailLoker from './components/DetailLoker.vue';
import homeSuccess from './components/homeSuccess.vue';
import lowongan from './components/lowongan.vue';
import cekLowongan from './components/cekLowongan.vue';
import tambahLowongan from './components/tambahLowongan.vue';

export const routes = [
    {
        name: 'home',
        path: '/admin/tb_alumni/',
        component: ListJurusan
    },
    {
        name: 'tambah',
        path: '/admin/tb_alumni/tambah',
        component: CreateJurusan
    },
    {
        name: 'edit',
        path: '/admin/tb_alumni/edit/:id',
        component: EditJurusan
    },
    {
        name:'admin',
        path: '/admin/',
        component:Admin
    },
    {
        name:'index',
        path:'/',
        component:Home
    },
    {
        name:'login',
        path:'/login/',
        component:Login
    },
    {
        name:'register',
        path:'/register/',
        component:Register
    },
    {
        name:'detailLoker',
        path:'/detail_loker/:id',
        component:DetailLoker
    },
    {
        name:'login_success',
        path:'/home_success/:id',
        component:homeSuccess
    },
    {
        name:'lowongan',
        path:'/admin/lowongan',
        component:lowongan
    },
    {
        name:'ceklowongan',
        path:'/ceklowongan',
        component:cekLowongan
    },
    {
        name:'tambahLowongan',
        path:'/tambahLowongan',
        component:tambahLowongan
    },
];