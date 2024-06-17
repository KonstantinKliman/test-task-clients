<template>
    <button
        class="register__form__button"
        :disabled="disabled"
        @click="handleClick"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        disabled: {
            type: Boolean,
            required: true
        }
    },
    methods: {
        handleClick(event) {
            if (!this.disabled) {
                this.$emit('click', event);
            }
        }
    }
}
</script>

<style scoped>
.register__form__button {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #cbd5e1;
    border: 1px solid #94a3b8;
    border-radius: 5px;
}
</style>