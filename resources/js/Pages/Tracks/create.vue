<template>
    <MusicLayout>
        <template #title>Create a track</template>

        <template #action>
            <Link :href="route('tracks.index')"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>

        <template #content>
            <form
                @submit.prevent="submit"
                class="max-w-2xl"
            >
                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="title">Title</label>
                    <input
                        class="border-neutral-300 rounded shadow"
                        v-model="form.title"
                        id="title"
                        placeholder="Title"
                        type="text"
                    />
                    <p class="text-red-500 mt-1">{{ form.errors.title }}</p>
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
                    <p class="text-red-500 mt-1">{{ form.errors.artist }}</p>
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
                    <p class="text-red-500 mt-1">{{ form.errors.display }}</p>
                </div>

                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="image">Album cover</label>
                    <input
                        @input="form.image = $event.target.files[0]"
                        type="file"
                        name="image"
                        id="image"
                    />
                    <p class="text-red-500 mt-1">{{ form.errors.image }}</p>
                </div>

                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="music">Music file</label>
                    <input
                        @input="form.music = $event.target.files[0]"
                        type="file"
                        name="music"
                        id="music"
                    />
                    <p class="text-red-500 mt-1">{{ form.errors.music }}</p>
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
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",
    components: {
        MusicLayout,
        Link,
    },
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
