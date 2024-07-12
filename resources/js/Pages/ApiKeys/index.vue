<template>
    <div>
        <h1>Your API keys</h1>
        <div v-if="apiKeys.length === 0">
            <p>You don't have any API keys yet.</p>
        </div>
        <div v-else>
            <ul>
                <li v-for="apiKey in apiKeys" :key="apiKey.id">
                    <p>{{ apiKey.name }}</p>
                    <p>{{ apiKey.key }}</p>
                    <button @click="deleteApiKey(apiKey.id)">Delete</button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Index',
    props: {apiKeys: Array},
    methods: {
        deleteApiKey(apiKeyId) {
            this.$inertia.delete(`/api-keys/${apiKeyId}`);
        },
    },
};
</script>
