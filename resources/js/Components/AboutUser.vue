<script setup>

defineProps({
    user: Object,
    date: String
})

</script>

<template>
    <div class="flex flex-col bg-white rounded-2xl mt-5">
        <div class="border-b-2 flex w-full justify-between px-5 py-3.5">
            <div class="font-semibold text-[#171725]">About Me</div>
            <img src="/img/ic_More.svg" alt="">
        </div>
        <div class="px-5">
            <p v-if="user.description" class="text-[#44444F] leading-6 text-sm font-normal py-3.5 ">“{{user.description}}”</p>
            <hr>
            <div v-if="user.location" class="flex gap-x-3.5 items-center py-4">
                <img src="/img/ic_Place.svg" alt="">
                <p class="text-[#171725] text-sm">{{user.location}}</p>
            </div>
            <div v-if="user.website" class="flex gap-x-3.5 items-center py-4">
                <img src="/img/ic_website.svg" alt="">
                <p class="text-[#171725] text-sm">{{ user.website }}</p>
            </div>
            <div class="flex gap-x-3.5 items-center py-4">
                <img src="/img/ic_date.svg" alt="">
                <p class="text-[#171725] text-sm">Joined {{date}}</p>
            </div>
            <div v-if="user.job" class="flex gap-x-3.5 items-center py-4">
                <img src="/img/ic_Working.svg" alt="">
                <p class="text-[#171725] text-sm">Working at {{ user.job }}</p>
            </div>
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
