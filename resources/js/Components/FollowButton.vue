<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    username: String,
    followed: Boolean
})



</script>

<template>
    <Link as="button" preserve-scroll v-if="!followed" method="POST" :href="route('users.follow', {user: `${username}`})" class="py-2 px-3 rounded-2xl bg-blue-600 border-none border-2 text-white text-center h-fit">
        Follow
    </Link>
    <Link as="button" preserve-scroll v-else method="DELETE" :href="route('users.unfollow', {user: `${username}`})" class="py-2 px-3 rounded-2xl bg-red-600 border-none border-2 text-white text-center h-fit">
        UnFollow
    </Link>
</template>


<style lang="scss" scoped>

</style>
