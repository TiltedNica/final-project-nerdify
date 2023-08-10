`<script setup>

import {Link, usePage} from "@inertiajs/vue3";

const props = defineProps({
    image: String,
    username: String
})


</script>

<template>
    <Link :href="route('user.show', {user: `${username}`})" class="flex gap-x-3.5">
        <img class="object-cover h-[32px] w-[32px] rounded-full" :src="image" alt="">

    </Link>
</template>
