<template>
    <div class="clients">
        <div class="clients__header">
            <h1>Клиенты</h1>
            <RouterLink class="clients__link" to="/clients/create">Добавить клиента</RouterLink>
        </div>
        <div class="clients__info">
            <table class="clients__table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>Дата рождения</th>
                    <th>ИНН</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(client, index) in clients" :key="client.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ client.fullName }}</td>
                    <td>{{ client.dateOfBirth }}</td>
                    <td>{{ client.inn }}</td>
                    <td>
                        <form action="">
                            <select v-model="client.statusId" @change="updateStatus(client)">
                                <option v-for="(status, id) in statuses" :value="id" :key="id">{{ status }}</option>
                            </select>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import api from "@/api";

export default {
    data() {
        return {
            clients: [],
            statuses: {
                1: "Не в работе",
                2: "В работе",
                3: "Отказ",
                4: "Сделка закрыта"
            }
        }
    },
    mounted() {
        this.fetchClients();
    },
    methods: {
        async fetchClients() {
            try {
                const response = await api.get('/clients', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                });
                this.clients = response.data.map(client => ({
                    ...client,
                    fullName: `${client.firstName} ${client.middleName} ${client.lastName}`
                }));
                console.log('Clients fetched successfully:', this.clients);
            } catch (error) {
                console.error('Error fetching clients:', error);
            }
        },
        async updateStatus(client) {
            try {
                const response = await api.patch('/clients/' + client.id, { statusId : client.statusId }, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                });
            } catch (error) {
                console.error('Error updating client:', error);
            }
        }
    }
}
</script>

<style scoped>
.clients__header {
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.clients__link {
    color: #22c55e;
}

.clients__info {
    padding: 20px;
}

.clients__table {
    width: 100%;
}

table {
    border-collapse: collapse;
    border-color: #cbd5e1;
}

caption {
    caption-side: bottom;
    padding: 10px;
    font-weight: bold;
}

thead,
tfoot {
    background-color: #e2e8f0;
}

th,
td {
    border: 1px solid #cbd5e1;
    padding: 8px 10px;
}

td:last-of-type {
    text-align: center;
}

tbody > tr:nth-of-type(even) {
    background-color: rgb(237 238 242);
}

tfoot th {
    text-align: right;
}

tfoot td {
    font-weight: bold;
}

</style>