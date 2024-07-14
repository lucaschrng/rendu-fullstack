<template>
    <MusicLayout>
        <template #title>Edit track</template>

        <template #action>
            <Link :href="route('tracks.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>

        <template #content>
            <form
                @submit.prevent="submit"
                class="max-w-2xl"
            >
                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="title">Titre</label>
                    <input
                        class="border-neutral-300 rounded shadow"
                        v-model="form.title"
                        id="title"
                        placeholder="Title"
                        type="text"
                    />
                    <p>{{ form.errors.title }}</p>
                </div>

                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="artist">Artist</label>
                    <input
                        class="border-neutral-300 rounded shadow"
                        v-model="form.artist"
                        id="artist"
                        placeholder="Artist"
                        type="text"
                    />
                    <p>{{ form.errors.artist }}</p>
                </div>

                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="title">Display</label>
                    <select
                        name="display"
                        id="display"
                        v-model="form.display"
                        class="border-neutral-300 rounded shadow"
                    >
                        <option :value="true">yes</option>
                        <option :value="false">no</option>
                    </select>
                    <p>{{ form.errors.display }}</p>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4"
                >
                    Save
                </button>
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
    name: "Create",
    components: {
        MusicLayout,
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
