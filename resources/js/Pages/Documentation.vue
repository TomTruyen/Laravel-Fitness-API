<template>
    <app-layout title="Documentation" :canLogin="canLogin" :canRegister="canRegister">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Documentation
            </h2>
        </template>


        <documentation />
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Documentation from '@/Jetstream/Documentation.vue'

    export default defineComponent({
         props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },
        components: {
            AppLayout,
            Documentation,
        },
    })
</script>
