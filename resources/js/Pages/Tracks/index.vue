<template>
    <div>
        <h1>Tracks</h1>
        <Track
            v-for="track in tracks"
            :key="track.uuid"
            :title="track.title"
            :artist="track.artist"
            :image="track.image"
        />
    </div>
</template>

<script>
import Track from "@/Components/Track.vue";

export default {
    name: "Index",
    components: {
        Track,
    },
    props: {tracks: Array},
};
</script>
