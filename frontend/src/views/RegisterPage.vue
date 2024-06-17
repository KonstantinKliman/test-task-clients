<template>
    <div class="register">
        <form @submit.prevent="register" class="register__form" method="post">
            <h1 class="register__header">Регистрация</h1>
            <div class="register__inputs">
                <FormItem
                    v-model="data.fullName"
                    placeholder="Введите ФИО"
                    name="fullName"
                    :error="errors.fullName ? errors.fullName[0] : ''"
                />
                <FormItem
                    v-model="data.login"
                    placeholder="Введите логин"
                    name="login"
                    :error="errors.login ? errors.login[0] : ''"
                />
                <FormItem
                    v-model="data.password"
                    type="password"
                    placeholder="Введите пароль"
                    name="password"
                    :error="errors.password ? errors.password[0] : ''"
                />
                <FormItem
                    v-model="data.passwordConfirmation"
                    type="password"
                    placeholder="Подтвердите пароль"
                    name="passwordConfirmation"
                    :error="errors.passwordConfirmation ? errors.passwordConfirmation[0] : ''"
                />
                <FormButton :disabled="!isFormValid">Зарегистрироваться</FormButton>
            </div>
        </form>
    </div>
</template>

<script>
import FormItem from "@/components/UI/FormInput.vue";
import FormButton from "@/components/UI/FormButton.vue";
import api from "@/api/index.js";

export default {
    components: {
        FormButton,
        FormItem
    },
    data() {
        return {
            data: {
                fullName: '',
                login: '',
                password: '',
                passwordConfirmation: ''
            },
            errors: {}
        }
    },
    computed: {
        isFormValid() {
            return this.data.fullName && this.data.login && this.data.password && this.data.passwordConfirmation;
        }
    },
    methods: {
        async register() {
            try {
                const response = await api.post('/register', this.data);
                console.log(response);
                this.$router.push('/login');
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
.register {
    padding-left: 20px;
    padding-right: 20px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.register__form {
    width: 25%;
    padding: 20px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    background-color: #e2e8f0;
}

.register__inputs {
    display: flex;
    flex-direction: column;
}

.register__header {
    margin-bottom: 10px;
    text-align: center;
}
</style>
