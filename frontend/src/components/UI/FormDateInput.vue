<template>
    <div class="client__form__item" :class="{ 'has-error': hasError }">
        <input
            v-bind="$attrs"
            :value="modelValue"
            @input="updateValue"
            class="client__form__input"
            type="date"
        >
        <p class="client__formError" v-if="hasError">{{ error }}</p>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: {
            type: String,
            required: true
        },
        error: {
            type: String,
            default: ''
        }
    },
    computed: {
        hasError() {
            return this.error !== '';
        }
    },
    methods: {
        updateValue(event) {
            this.$emit('update:modelValue', event.target.value);
        }
    }
};
</script>

<style scoped>
.client__form__item {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
    width: 100%;
}

.client__form__input {
    padding: 10px;
    background-color: #cbd5e1;
    border: 1px solid #94a3b8;
    border-radius: 5px;
    width: auto;
}

.client__form__item.has-error .client__form__input {
    border-color: #b91c1c;
    background-color: #fca5a5;
}

.client__formError {
    font-weight: 300;
    font-size: small;
    color: #ef4444;
}
</style>
