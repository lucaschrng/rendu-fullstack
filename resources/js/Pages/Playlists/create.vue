<template>
    <MusicLayout>
        <template #title>
            Create a playlist
        </template>

        <template #action>
            <Link :href="route('playlists.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">

                <div class="grid mb-4">
                    <label class="font-semibold mb-2" for="title">Titre</label>
                    <input
                        class="border-neutral-300 rounded shadow"
                        id="title" v-model="form.title" type="text" placeholder="Title">
                    <p class="text-red-500 mt-1">{{ form.errors.title }}</p>
                </div>

                <div v-for="track in tracks" :key="track.uuid">
                    <input :id="track.uuid" :value="track.uuid" v-model="form.tracks" type="checkbox" name="tracks"
                           class="mr-5">
                    <label :for="track.uuid">{{ track.title }} &bull; {{ track.artist }}</label>
                </div>

                <p class="text-red-500 mt-1">{{ form.errors.tracks }}</p>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4 mt-4"
                >
                    Create playlist
                </button>
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: 'Create',
    components: {
        MusicLayout,
        Link,
    },
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
