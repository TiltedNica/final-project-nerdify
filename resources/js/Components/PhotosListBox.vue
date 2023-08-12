<template>
    <div class="z-40">
        <Listbox v-model="selectedOption">
            <div class="relative mt-1">
                <ListboxButton
                    class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm"
                >
                    <span class="block truncate">{{ selectedOption }}</span>
                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <ChevronDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
          </span>
                </ListboxButton>

                <transition
                    leave-active-class="transition duration-100 ease-in"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <ListboxOptions
                        class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                    >
                        <ListboxOption
                            v-slot="{ active, selected }"
                            v-for="option in options"
                            :key="option"
                            :value="option"
                            as="template"
                        >
                            <li
                                @click="selectOption(option)"
                                :class="[
                  active ? 'bg-amber-100' : '',
                  selected ? 'text-amber-600 font-medium' : 'text-gray-900 font-normal',
                  'relative cursor-pointer select-none py-2 pl-10 pr-4',
                ]"
                            >
                                <span class="block truncate">{{ option }}</span>
                                <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600">
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox>
    </div>
</template>

<script setup>
import { Listbox, ListboxButton, ListboxOptions, ListboxOption } from '@headlessui/vue';
import { CheckIcon, ChevronDownIcon } from '@heroicons/vue/20/solid';
import { ref } from 'vue';
import { useGeneralStore } from '@/stores/general.js';

const generalStore = useGeneralStore();
const selectedOption = ref(generalStore.isSelectedOptionPhotos);

const options = ['Oldest First', 'Newest First'];

function selectOption(option) {
    selectedOption.value = option;
    generalStore.isSelectedOptionPhotos = option;
}
</script>
