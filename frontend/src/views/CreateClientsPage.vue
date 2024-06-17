<template>
    <div class="client">
        <form @submit.prevent="createClient" class="client__form" method="post">
            <h1 class="client__header">Добавить клиента</h1>
            <div class="client__inputs">
                <FormInput
                    v-model="data.firstName"
                    placeholder="Введите имя"
                    name="firstName"
                />
                <FormInput
                    v-model="data.lastName"
                    placeholder="Введите фамилию"
                    name="lastName"
                />
                <FormInput
                    v-model="data.middleName"
                    placeholder="Введите отчество"
                    name="middleName"
                />
                <FormInput
                    v-model="data.inn"
                    placeholder="Введите ИНН"
                    name="middleName"
                    type="number"
                />
                <FormDateInput
                    v-model="data.dateOfBirth"
                    placeholder="Введите дату рождения"
                    name="dateOfBirth"
                />
                <FormButton :disabled="!isFormValid">Добавить</FormButton>
            </div>
        </form>
    </div>
</template>

<script>
import FormInput from "@/components/UI/FormInput.vue";
import FormButton from "@/components/UI/FormButton.vue";
import FormDateInput from "@/components/UI/FormDateInput.vue";
import api from "@/api";

export  default {
    components: {FormDateInput, FormButton, FormInput},
    data() {
        return {
            data: {
                firstName: '',
                middleName: '',
                lastName: '',
                dateOfBirth: '',
                inn: ''
            }
        }
    },
    computed: {
        isFormValid() {
            return this.data.firstName && this.data.middleName && this.data.lastName && this.data.dateOfBirth && this.data.inn;
        }
    },
    methods: {
        async createClient() {
            try {
                const response = await api.post('/clients', this.data, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                this.$router.push('/clients');
            } catch (e) {
                console.error('Error creating client:', error);
            }
        }
    }
}
</script>

<style scoped>
.client {
    padding-left: 20px;
    padding-right: 20px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.client__form {
    width: 25%;
    padding: 20px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    background-color: #e2e8f0;
}

.client__inputs {
    display: flex;
    flex-direction: column;
}

.client__header {
    margin-bottom: 10px;
    text-align: center;
}
</style>