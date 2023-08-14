<script setup>

import {Link} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import {usePage} from "@inertiajs/vue3";

const useGeneral = useGeneralStore()
const isVideo = (filename) =>{
    return /\.mp4$/i.test(filename)
}

const user = usePage().props.auth.user

defineProps({
    posts: Object
})
</script>

<template>
    <div class="w-full bg-white rounded-t-2xl mt-5">
        <div class="flex justify-between border-b-2 pb-3 pt-4 px-5">
            <h3>Photos and Videos</h3>
            <Link class="text-[#0062FF]" :href="route('user.photos', {user: `${user.username}`})">See All</Link>
        </div>
        <div class="grid grid-cols-3 gap-2.5 px-5 py-5">
            <template v-for="post in posts.data" :key="post.id">
                <template v-for="photo in post.images" :key="photo.id">
                    <img :class="[isVideo(photo.name) ? 'hidden' : 'h-[90px] w-[90px] rounded-2xl']" :src="'/storage/images/' + photo.path">
                </template>
            </template>
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
