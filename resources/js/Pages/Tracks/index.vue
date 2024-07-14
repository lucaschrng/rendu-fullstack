<template>
    <MusicLayout>
        <template #title>Tracks</template>
        <template #action>
            <Link v-if="$page.props.isAdmin" :href="route('tracks.create')"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Créer une musique
            </Link>
        </template>
        <template #content>
            <input
                v-model="filter"
                type="search"
                placeholder="Search for a track"
                class="rounded bg-neutral-100 border-neutral-300"
            />
            <div
                class="grid mt-6 gap-2"
                :style="{gridTemplateColumns: 'repeat(auto-fill, minmax(250px, 1fr))'}"
            >
            <Track
                v-for="track in filteredTracks"
                :key="track.uuid"
                :track="track"
                @played="play"
            />
        </div>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Track from "@/Components/Track.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {
        MusicLayout,
        Track,
        Link,
    },
    props: {tracks: Array},
    data() {
        return {
            audio: null,
            currentTrack: null,
            filter: "",
        };
    },
    computed: {
        filteredTracks() {
            return this.tracks.filter(
                (track) =>
                    track.title.toLowerCase().includes(this.filter.toLowerCase()) ||
                    track.artist.toLowerCase().includes(this.filter.toLowerCase())
            );
        },
    },
    methods: {
        play(track) {
            const url = track.music;

            if (!this.currentTrack) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.currentTrack !== track.uuid) {
                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else {
                this.audio.paused ? this.audio.play() : this.audio.pause();
            }

            this.currentTrack = track.uuid;
            this.audio.addEventListener("ended", () => (this.currentTrack = null));
        },
    },
};
</script>
