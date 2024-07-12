<template>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Songs</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
            <td>{{ i + 1 }}</td>
            <td>{{ playlist.title }}</td>
            <td>{{ playlist.tracks_count }} musiques</td>
            <td>{{ $moment(playlist.created_at).format('DD/MM/YYYY hh:mm:ss') }}</td>
            <td>
                <Link :href="route('playlists.show', { playlist: playlist })"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                    Voir
                </Link>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        Link,
    },
    props: {
        playlists: Array,
    },
}
</script>
