<template>
    <div class="login">
        <form @submit.prevent="handleLogin" class="login__form" method="post">
            <h1 class="login__header">Авторизация</h1>
            <div class="login__inputs">
                <FormInput
                    v-model="data.login"
                    placeholder="Введите логин"
                    name="login"
                    :error="errors.login ? errors.login[0] : ''"
                />
                <FormInput
                    v-model="data.password"
                    type="password"
                    placeholder="Введите пароль"
                    name="password"
                    :error="errors.password ? errors.password[0] : ''"
                />
                <FormButton :disabled="!isFormValid">Войти</FormButton>
            </div>
        </form>
    </div>
</template>

<script>
import FormButton from "@/components/UI/FormButton.vue";
import FormInput from "@/components/UI/FormInput.vue";
import { mapActions } from 'vuex';

export default {
    components: {
        FormButton,
        FormInput
    },
    data() {
        return {
            data: {
                login: '',
                password: ''
            },
            errors: {}
        }
    },
    computed: {
        isFormValid() {
            return this.data.login && this.data.password;
        }
    },
    methods: {
        ...mapActions(['login']),
        async handleLogin() {
            try {
                await this.login(this.data);
                this.$router.push('/');
            } catch (e) {
                if (e.response && e.response.data && e.response.data.errors) {
                    this.errors = e.response.data.errors;
                }
            }
        }
    }
}
</script>

<style scoped>
.login {
    padding-left: 20px;
    padding-right: 20px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.login__form {
    width: 25%;
    padding: 20px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    background-color: #e2e8f0;
}

.login__inputs {
    display: flex;
    flex-direction: column;
}

.login__header {
    margin-bottom: 10px;
    text-align: center;
}
</style>
