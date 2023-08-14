<script setup>
import { BellIcon } from '@heroicons/vue/20/solid'
import {Link, usePage} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";

defineProps({
    unreadNotificationsCount: Number
})



</script>

<template>
    <Link preserve-scroll  :href="route('notification.index')" v-if="unreadNotificationsCount" class="relative">
        <div class="absolute right-0 top-0 h-[18px] w-[18px] rounded-full bg-red-600 flex justify-center items-center">
            <p class="text-sm text-white">{{unreadNotificationsCount}}</p>
        </div>
        <bell-icon class="w-8 h-8 text-[#92929d]"/>
    </Link>
    <Link preserve-scroll :href="route('notification.index')" v-else>
        <bell-icon class="w-8 h-8 text-[#92929d]"/>
    </Link>
</template>

