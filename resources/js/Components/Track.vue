<template>
    <div>
        <img :src="image" :alt="`${title} by ${artist} - album cover}`" />
        <p>
            {{ title }} &bull; {{ artist }}
        </p>
    </div>
</template>

<script>
export default {
    name: "Track",
    props: ["title", "artist", "image"],
};
</script>
