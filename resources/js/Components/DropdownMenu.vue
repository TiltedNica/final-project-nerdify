<template>
    <div>
        <Menu as="div" class="relative inline-block text-left">
            <div>
                <MenuButton
                    class="w-full justify-center rounded-md px-4 text-sm font-medium text-white"
                >
                    <img src="/img/ic_Dropdown.svg" alt="">
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
                    class="absolute right-0 mt-2 w-44 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                >
                    <div class="px-1 py-1">
                        <DropdownLink :href="route('logout')" method="post" v-slot="{ active }">
                            <button
                                :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex justify-evenly w-full items-center gap-x-4 rounded-md  text-sm',
                ]"
                            >
                                <arrow-left-on-rectangle-icon class="w-[20px] h-[20px]"></arrow-left-on-rectangle-icon>

                                <h3 class="text-sm font-semibold">Logout</h3>
                            </button>
                        </DropdownLink>
                    </div>
                </MenuItems>
            </transition>
        </Menu>
    </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ArrowLeftOnRectangleIcon } from '@heroicons/vue/20/solid'
import DropdownLink from "@/Components/DropdownLink.vue";
</script>

