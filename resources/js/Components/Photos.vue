<script setup>

import {Link} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";

const useGeneral = useGeneralStore()

defineProps({
    posts: Object
})
</script>

<template>
    <div class="w-full bg-white rounded-t-2xl mt-5">
        <div class="flex justify-between border-b-2 pb-3 pt-4 px-5">
            <h3>Photos and Videos</h3>
            <Link class="text-[#0062FF]" href="/">See All</Link>
        </div>
        <div v-for="photo in posts.data" :key="photo" class="grid grid-cols-3 gap-2.5 px-5 py-5">
            <img v-if="photo.image" class="h-[90px] w-[90px] rounded-2xl" :src="photo.image">
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
