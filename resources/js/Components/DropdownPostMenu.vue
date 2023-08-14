<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import {Link} from "@inertiajs/vue3";

import { BookmarkIcon, BookmarkSlashIcon, XCircleIcon, ArchiveBoxXMarkIcon, UserMinusIcon, UserPlusIcon, ClipboardDocumentCheckIcon } from '@heroicons/vue/20/solid'
import User from "@/Pages/User.vue";

defineProps({
    post: Object,
    user: Object
})

</script>

<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton
                class="bg-[#F1F1F5] px-1 h-fit rounded-md"
            >
                <img src="/img/ic_More.svg" alt="">
            </MenuButton>
        </div>

        <transition
            enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
        >
            <MenuItems
                class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
                <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                        <Link as="button" preserve-scroll v-if="!post.is_saved" method="POST" :href="route('saved-post.store', {post: `${post.id}`})"
                            :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex gap-x-4 w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
                        >
                            <bookmark-icon class="w-6 h-6 text-slate-400"/>
                            Save Post
                        </Link>
                        <Link as="button" preserve-scroll v-else method="DELETE" :href="route('unsave-post.destroy', {post: `${post.id}`})"
                              :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full flex gap-x-4 items-center rounded-md px-2 py-2 text-sm',
                ]"
                        >
                            <bookmark-slash-icon class="w-6 h-6 text-slate-400"/>
                            Unsave Post
                        </Link>
                    </MenuItem>
                    <MenuItem v-if="$page.props.auth.user.id !== post.user.id && !post.is_hidden" v-slot="{ active }">
                        <Link
                            as="button"
                            preserve-scroll
                            method="POST"
                            :href="route('post.hide', {post: `${post.id}`})"
                            :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full gap-x-4 items-center rounded-md px-2 py-2 text-sm',
                ]"
                        >
                            <x-circle-icon class="w-6 h-6 text-slate-400"/>
                            Hide this Post
                        </Link>
                    </MenuItem>
                    <MenuItem v-else v-slot="{ active }">
                        <Link
                            as="button"
                            preserve-scroll
                            method="POST"
                            :href="route('post.hide', {post: `${post.id}`})"
                            :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full gap-x-4 items-center rounded-md px-2 py-2 text-sm',
                ]"
                        >
                            <clipboard-document-check-icon class="w-6 h-6 text-slate-400"/>
                            Show this Post
                        </Link>
                    </MenuItem>
                </div>
                <div class="px-1 py-1">
                    <MenuItem v-if="$page.props.auth.user.id !== post.user.id" v-slot="{ active }">
                        <Link
                            as="button"
                            preserve-scroll
                            method="POST"
                            :href="route('post.hide-all-user-posts', {user: `${user.id}`})"
                            :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full items-center gap-x-4 rounded-md px-2 py-2 text-sm',
                ]"
                        >

                            <archive-box-x-mark-icon class="w-6 h-6 text-slate-400"/>
                            Hide All Posts
                        </Link>
                    </MenuItem>
                    <MenuItem v-if="$page.props.auth.user.id !== post.user.id" v-slot="{ active }">
                        <div>
                            <Link as="button" preserve-scroll :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm gap-x-4',
                ]" v-if="!post.is_following" method="POST" :href="route('users.follow', {user: `${post.user.username}`})">
                                <user-plus-icon   class="w-6 h-6 text-slate-400"/>
                                Follow
                            </Link>
                            <Link as="button" preserve-scroll method="DELETE" :href="route('users.unfollow', {user: `${post.user.username}`})" :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm gap-x-4',
                ]" v-else>
                                <user-minus-icon  class="w-6 h-6 text-slate-400"/>
                                UnFollow
                            </Link>
                        </div>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>


