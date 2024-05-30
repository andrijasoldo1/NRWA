import Vuex from 'vuex';
import axios from 'axios';

const store = new Vuex.Store({
    state: {
        user: JSON.parse(localStorage.getItem('user')) || null,
        token: localStorage.getItem('token') || null
    },
    mutations: {
        SET_USER(state, user) {
            state.user = user;
            if (user) {
                localStorage.setItem('user', JSON.stringify(user));
            } else {
                localStorage.removeItem('user');
            }
        },
        SET_TOKEN(state, token) {
            state.token = token;
            if (token) {
                localStorage.setItem('token', token);
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            } else {
                localStorage.removeItem('token');
                delete axios.defaults.headers.common['Authorization'];
            }
        }
    },
    actions: {
        async login({ commit }, credentials) {
            try {
                const response = await axios.post('/login', credentials);
                commit('SET_USER', response.data.user);
                commit('SET_TOKEN', response.data.token);
            } catch (error) {
                console.error('Failed to login:', error);
                throw error;
            }
        },
        async register({ commit }, credentials) {
            try {
                const response = await axios.post('/register', credentials);
                commit('SET_USER', response.data.user);
                commit('SET_TOKEN', response.data.token);
            } catch (error) {
                console.error('Failed to register:', error);
                throw error;
            }
        },
        async logout({ commit }) {
            await axios.post('/logout');
            commit('SET_USER', null);
            commit('SET_TOKEN', null);
        },
        async fetchUser({ commit }) {
            const response = await axios.get('/user');
            commit('SET_USER', response.data);
        }
    },
    getters: {
        isAuthenticated: state => !!state.user,
        getUser: state => state.user
    }
});

export default store;
