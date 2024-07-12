<template>
    <div>
        <img :src="'storage/' + track.image" :alt="`${track.title} by ${track.artist} - album cover`" />
        <p>
            {{ track.title }} &bull; {{ track.artist }}
        </p>
        <button @click="handleClick()">
            Play
        </button>
        <div v-if="$page.props.isAdmin">
            <Link :href="route('tracks.edit', { track })">
                Edit
            </Link>
            <Link :href="route('tracks.destroy', { track })" method="delete">
                Delete
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    name: "Track",
    components: {
        Link,
    },
    emits: ["played"],
    props: ["track"],
    methods: {
        handleClick() {
            this.$emit("played", this.track);
        },
    },
};
</script>
