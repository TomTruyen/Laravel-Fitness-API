<template>
    <app-layout title="Welcome">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Documentation
            </h2>
        </template>


        <welcome />
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
        },
    })
</script>
