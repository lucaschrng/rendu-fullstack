<template>
    <div>
        <h1>Create API Key</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Name</label>
                <input id="name" v-model="form.name" type="text" />
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                name: '',
            }),
        };
    },
    methods: {
        submit() {
            this.form.post('/api-keys');
        },
    },
};
</script>
