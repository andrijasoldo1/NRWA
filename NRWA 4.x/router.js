import {createRouter, createWebHistory} from "vue-router";


import RentalIndex from "./src/Rent/index.vue";
import Edit from "./src/Rent/edit.vue";
import create from "./src/Rent/create.vue";
import show from "./src/Rent/show.vue";
import Home from "./src/Home.vue";
import login from "./src/Login.vue";
import Logout from "./src/Logout.vue";
import Register from "./src/Register.vue";


const routes = [
    {path: "/", component: Home, name: "Home"},
    {path: "/rental", component: RentalIndex, name: "RentalIndex"},
    {path: "/rental/edit/:id", component: Edit, name: "Edit"},
    {path: "/rental/:id", component: show, name: "Show"},
    {path: "/rental/create", component: create, name: "create"},
    {path: "/login", component: login, name: "login"},
    {path: "/logout", component: Logout, name: "logout"},
    {path: "/register", component: Register, name: "register"},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;

