<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">Users /<span class="text-gray-700"> Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <base-input label="Name" required v-model="form.name"></base-input>
                        <base-input type="email" label="Email address" required v-model="form.email"></base-input>
                        <base-input label="Password" type="password" required v-model="form.password"></base-input>
                        <base-input label="Password confirmation" type="password" required
                                    v-model="form.password_confirmation"></base-input>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit"
                                class="px-3 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">
                            Update User
                        </button>
                    </div>
                </form>
            </base-panel>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
        props: ['user'],
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        created() {
            this.form = this.user;
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/users', this.form);
            }
        }
    }
</script>
