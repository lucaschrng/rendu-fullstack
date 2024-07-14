<template>
    <MusicLayout>
        <template #title>
            {{ playlist.title }}
        </template>

        <template #action>
            <Link :href="route('playlists.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Retour
            </Link>
        </template>

        <template #content>
            <TrackList :tracks="tracks" />
        </template>
    </MusicLayout>
</template>

<script>
import TrackList from '@/Components/TrackList.vue';
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: 'Show',
    components: {
        MusicLayout,
        TrackList,
        Link
    },
    props: {
        playlist: Object,
        tracks: Array,
    },
}
</script>
