<template>
    <h1>Create a track</h1>

    <form @submit.prevent="submit">
        <div>
            <label for="title">Title</label>
            <input
                v-model="form.title"
                id="title"
                placeholder="Title"
                type="text"
            />
            <p>{{ form.errors.title }}</p>
        </div>

        <div>
            <label for="artist">Artist</label>
            <input
                v-model="form.artist"
                id="artist"
                placeholder="Artist"
                type="text"
            />
            <p>{{ form.errors.artist }}</p>
        </div>

        <div>
            <label for="title">Display</label>
            <select
                name="display"
                id="display"
                v-model="form.display"
            >
                <option :value="true">yes</option>
                <option :value="false">no</option>
            </select>
            <p>{{ form.errors.display }}</p>
        </div>

        <div>
            <label for="image">Album cover</label>
            <input
                @input="form.image = $event.target.files[0]"
                type="file"
                name="image"
                id="image"
            />
            <p>{{ form.errors.image }}</p>
        </div>

        <div>
            <label for="music">Music file</label>
            <input
                @input="form.music = $event.target.files[0]"
                type="file"
                name="music"
                id="music"
            />
            <p>{{ form.errors.music }}</p>
        </div>

        <button
            type="submit"
            :disabled="form.processing"
        >
            Save
        </button>
    </form>
</template>

<script>

export default {
    name: "Create",
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                artist: "",
                image: null,
                music: null,
                display: true,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route("tracks.store"));
        },
    },
};
</script>
