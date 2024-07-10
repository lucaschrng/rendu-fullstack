<template>
    <div>
        <h1>Edit track</h1>

        <Link :href="route('tracks.index')">
            Back
        </Link>
    </div>

    <form @submit.prevent="submit">
        <div>
            <label for="title">Titre</label>
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

        <button
            type="submit"
            :disabled="form.processing"
        >
            Save
        </button>
    </form>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",
    components: {
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.track.title,
                artist: this.track.artist,
                display: !!this.track.display,
            }),
        };
    },
    props: {track: Object},
    methods: {
        submit() {
            this.form.put(route("tracks.update", {track: this.track}));
        },
    },
};
</script>
