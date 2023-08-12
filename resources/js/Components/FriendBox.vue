<script setup>

import FollowButton from "@/Components/FollowButton.vue";
import ProfilePicture from "@/Components/ProfilePicture.vue";

defineProps({
    profile: Object,
    follower: Array,
})

</script>

<template>
    <div class="grid grid-cols-2 gap-8 mt-8 -z-10">
        <div class="w-[480px] h-auto relative" v-for="follow in follower">
            <div class="w-full h-[100px]">
                <img class="rounded-t-lg h-[100px] w-full" :src="follow.banner_picture" alt="">
            </div>
            <div class="bg-white w-full pt-2 pr-6 pb-12 rounded-b-2xl shadow-xl">
                <div class="border-4 border-white absolute top-[75px] left-5 rounded-full">
                    <profile-picture h="86" w="86" :image="follow.image" ></profile-picture>
                </div>
                <div class="ms-[122px] flex">
                    <div class="flex flex-col gap-y-2 w-full">
                        <div class="flex justify-between w-full">
                            <div class="flex flex-col">
                                <h3 class="text-[#171725] text-xl font-bold">{{ follow.name }}</h3>
                                <p class="text-[#92929D] text-sm">@{{follow.username}}</p>
                            </div>
                        </div>
                        <p>{{follow.description}}</p>
                    </div>
                    <follow-button :followed="follow.is_followed_by" :username="follow.username" class="self-start"></follow-button>
                </div>
            </div>
        </div>
    </div>
</template>

