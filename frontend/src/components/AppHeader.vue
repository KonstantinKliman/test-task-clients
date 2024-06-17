<template>
    <div class="header">
        <div class="header__items">
            <RouterLink class="header__link" to="/">Главная</RouterLink>
            <RouterLink class="header__link" to="/clients" v-if="isAuth">Клиенты</RouterLink>
        </div>
        <div class="header__items" v-if="isAuth">
            <p>{{ user ? user.login : '' }}</p>
            <button class="header__logoutBtn" @click="handleLogout">Выйти</button>
        </div>
        <div class="header__items" v-else>
            <RouterLink class="header__link" to="/login">Войти</RouterLink>
            <RouterLink class="header__link" to="/register">Зарегистрироваться</RouterLink>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    computed: {
        ...mapGetters(['isAuth', 'user'])
    },
    methods: {
        ...mapActions(['logout']),
        handleLogout() {
            this.logout().then(() => {
                this.$router.push('/login');
            })
        }
    },
    mounted() {
        if (this.isAuth && !this.user) {
            this.$store.dispatch('fetchUser');
        }
    },
    watch: {
        isAuth(newVal, oldVal) {
            if (newVal && !this.user) {
                this.$store.dispatch('fetchUser');
            }
        }
    }
}
</script>

<style scoped>
.header {
    background-color: #e2e8f0;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #cbd5e1;
}

.header__items {
    display: flex;
    align-items: center;
}

.header__link {
    padding-left: 5px;
    padding-right: 5px;
}

.header__logoutBtn {
    color: #ef4444;
    background-color: #fee2e2;
    padding: 6px;
    border: 1px solid #f87171;
    border-radius: 5px;
    margin-left: 5px;
}
</style>
