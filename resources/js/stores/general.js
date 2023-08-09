import {defineStore} from "pinia";
import {ref} from "vue";

export const useGeneralStore = defineStore('general', ()=> {

    // state: ()=>({
    //     isPostOverlay: false,
    //     isCropperModal: false,
    //     isImageDisplay: null,
    // }),
    // persist: true
    const isPostOverlay = ref(false)
    const isEditOverlay = ref(false)
    const isImageDisplay = ref(null)

    return {isPostOverlay, isImageDisplay, isEditOverlay}
})
