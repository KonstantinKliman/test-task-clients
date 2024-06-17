<template>
    <div class="register__form__item" :class="{ 'has-error': hasError }">
        <input
            v-bind="$attrs"
            :value="modelValue"
            @input="updateValue"
            class="register__form__input"
        >
        <p class="register__form__error" v-if="hasError">{{ error }}</p>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: {
            type: [String, Number],
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
}
</script>

<style scoped>
.register__form__item {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
    width: 100%;
}

.register__form__item.has-error .register__form__input {
    border-color: #b91c1c;
    background-color: #fca5a5;
}

.register__form__input {
    padding: 10px;
    background-color: #cbd5e1;
    border: 1px solid #94a3b8;
    border-radius: 5px;
    width: auto;
}

.register__form__error {
    font-weight: 300;
    font-size: small;
    color: #ef4444;
}

.register__form__input[type=number]::-webkit-inner-spin-button,
.register__form__input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.register__form__input[type=number] {
    -moz-appearance: textfield;
}
</style>
