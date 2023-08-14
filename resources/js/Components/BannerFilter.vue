<script setup>

import {string} from "postcss-selector-parser";

const props = defineProps({
    title: String,
    amount: Number,
})

</script>

<template>
    <div class="flex flex-col p-2.5 items-center">
        <h3 class="text-[#92929D] font-bold text-sm">{{ title }}</h3>
        <p class="text-[#44444F] text-base font-bold">{{ amount }}</p>
    </div>
</template>


