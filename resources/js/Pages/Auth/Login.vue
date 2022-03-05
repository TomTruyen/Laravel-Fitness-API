<template>
    <div>
        <Head title="Sign in" />

        <jet-authentication-card>
            <!-- <template #logo>
                <jet-authentication-card-logo />
            </template> -->

            <jet-validation-errors class="mb-4" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>



            <div class="flex items-center justify-center mt-4" @click.prevent="signInWithGoogle">
                <div class="google-blue text-gray-100 hover:text-white shadow font-bold text-sm py-3 px-4 rounded flex justify-start items-center cursor-pointer w-64">
                    <svg viewBox="0 0 24 24" class="fill-current mr-3 w-6 h-5" xmlns="http://www.w3.org/2000/svg"><path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/></svg>
                    <span class="border-l border-blue-500 h-6 w-1 block"></span>
                    <span class="pl-3">Sign in with Google</span>
                </div>
            </div>

            <div class="flex items-center mt-4 justify-center my-4">
                <strong>OR</strong>
            </div>

            <form @submit.prevent="submit">
                <div>
                    <jet-label for="email" value="Email" />
                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                </div>

                <div class="mt-4">
                    <jet-label for="password" value="Password" />
                    <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center mt-4">
                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 ml-auto">
                        Forgot your password?
                    </Link>
                </div>

                <div class="flex items-center mt-4">
                    <jet-button class="w-full justify-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Sign in
                    </jet-button>
                </div>

                <div class="flex items-center mt-4">
                    <a :href="route('register')" class="text-sm text-gray-700 underline">
                        Need an account?
                    </a>
                </div>


            </form>
        </jet-authentication-card>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: true
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            },
            signInWithGoogle() {
                location.href = "auth/google";
            }
        }
    })
</script>
