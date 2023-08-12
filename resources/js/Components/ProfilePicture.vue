`<script setup>

import {Link, usePage} from "@inertiajs/vue3";

const props = defineProps({
    image: String,
    username: String,
    h: String,
    w: String
})


</script>

<template>
    <Link :href="route('user.show', {user: `${username}`})">
        <div :style="{width: w + 'px', height: h + 'px'}">
            <img class="rounded-full" :style="{width: w + 'px', height: h + 'px'}" :src="image" alt="">
        </div>
    </Link>
</template>
