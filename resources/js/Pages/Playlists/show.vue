<template>
    <TrackList :tracks="tracks"/>
</template>

<script>
import TrackList from '@/Components/TrackList.vue';

export default {
    name: 'Show',
    components: {
        TrackList,
    },
    props: {
        playlist: Object,
        tracks: Array,
    },
}
</script>
