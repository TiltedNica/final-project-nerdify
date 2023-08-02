<script setup>

import {Link, usePage} from "@inertiajs/vue3";

defineProps({
    image: String
})

</script>

<template>
    <Link href="/" class="flex gap-x-3.5">
        <img class="h-[156px] w-[156px] rounded-full" :src="image" alt="">
    </Link>
</template>


