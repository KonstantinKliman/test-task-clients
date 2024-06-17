<template>
    <header>
        <app-header/>
    </header>
    <main>
        <RouterView/>
    </main>
    <footer>
        <div class="footer">
            <p>Some text here</p>
        </div>
    </footer>
</template>

<script>
import AppHeader from "@/components/AppHeader.vue";

export default {
    components: {AppHeader},
}
</script>

<style>
.footer {
    background-color: #e2e8f0;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 1px solid #cbd5e1;
}
</style>