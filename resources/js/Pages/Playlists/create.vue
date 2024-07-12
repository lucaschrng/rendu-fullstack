<template>
    <form @submit.prevent="submit">

        <div>
            <label for="title">Titre</label>
            <input id="title" v-model="form.title" type="text" placeholder="Title">
            <p>{{ form.errors.title }}</p>
        </div>

        <div v-for="track in tracks" :key="track.uuid">
            <input :id="track.uuid" :value="track.uuid" v-model="form.tracks" type="checkbox" name="tracks"
                   class="mr-5">
            <label :for="track.uuid">{{ track.title }}</label>
        </div>

        <p>{{ form.errors.tracks }}</p>

        <button type="submit" :disabled="form.processing">
            Create playlist
        </button>
    </form>
</template>

<script>
export default {
    name: 'Create',
    props: {
        tracks: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                tracks: [],
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('playlists.store'));
        }
    }
}
</script>
