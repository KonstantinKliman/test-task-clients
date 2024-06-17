import { createStore } from 'vuex';
import api from '@/api';

const store = createStore({
    state: {
        token: localStorage.getItem('token') || null,
        user: null,
    },
    mutations: {
        setToken(state, token) {
            state.token = token;
            localStorage.setItem('token', token);
        },
        setUser(state, user) {
            state.user = user;
        },
        clearAuthData(state) {
            state.token = null;
            state.user = null;
            localStorage.removeItem('token');
        }
    },
    actions: {
        async login({ commit }, authData) {
            const response = await api.post('/login', authData);
            const token = response.data.token;
            commit('setToken', token);
            await this.dispatch('fetchUser');
        },
        async fetchUser({ commit, state }) {
            if (!state.token) {
                return;
            }
            const response = await api.get('/user', {
                headers: {
                    'Authorization': 'Bearer ' + state.token
                }
            });
            commit('setUser', response.data);
        },
        // logout({ commit }) {
        //     commit('clearAuthData');
        // },
        async logout({ commit, state }) {
            try {
                await api.post('/logout', null, {
                    headers: {
                        'Authorization': 'Bearer ' + state.token
                    }
                });
            } catch (error) {
                console.error('Error logout:', error);
            }
            commit('clearAuthData');
        }
    },
    getters: {
        isAuth(state) {
            return !!state.token;
        },
        user(state) {
            return state.user;
        }
    }
});

export default store;
