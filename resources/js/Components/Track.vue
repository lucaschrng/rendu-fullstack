<template>
    <div class="grid bg-neutral-100 rounded p-4 gap-2">
        <img
            :src="track.image"
            :alt="`${track.title} by ${track.artist} - album cover`"
            class="rounded"
        />
        <p>
            <span class="font-semibold">{{ track.title }}</span>
            <br/>
            {{ track.artist }}
        </p>
        <button
            @click="handleClick()"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-1 px-4"
        >
            Play
        </button>
        <div
            v-if="$page.props.isAdmin"
            class="flex space-x-2"
        >
            <Link
                :href="route('tracks.edit', { track })"
                class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-1 px-4"
            >
                Edit
            </Link>
            <Link
                :href="route('tracks.destroy', { track })"
                method="delete"
                class="flex items-center bg-red-500 hover:bg-red-700 text-white font-bold rounded py-1 px-4"
            >
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
