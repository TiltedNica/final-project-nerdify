`<script setup>

import {Link, usePage} from "@inertiajs/vue3";

const props = defineProps({
    image: String
})



</script>

<template>
    <Link href="/" class="flex gap-x-3.5">
        <img class="h-[32px] w-[32px] rounded-full" :src="image" alt="">
    </Link>
</template>


`
