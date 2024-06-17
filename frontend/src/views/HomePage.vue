<template>
    <div class="main">
        <h1>
            Добро пожаловать{{ user ? ', ' + user.fullName : '' }}
        </h1>
        <p v-if="!isAuth">Чтобы получить доступ,
            <RouterLink class="header__link" to="/login">войдите</RouterLink>
            или
            <RouterLink class="header__link" to="/register">зарегистрирутесь</RouterLink>
        </p>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
    computed: {
        ...mapGetters(['isAuth', 'user']),
    },
    mounted() {
        if (this.isAuth && !this.user) {
            this.fetchUser();
        }
    },
    methods: {
        ...mapActions(['fetchUser']),
    }
}
</script>

<style scoped>
.main {
    padding-left: 20px;
    padding-right: 20px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
</style>
