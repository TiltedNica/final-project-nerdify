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
    const isEditProfileOverlay = ref(false)
    const isImageDisplay = ref(null)

    const isSelectedOption = ref('Followers')
    const isSelectedOptionPhotos = ref('Oldest First')

    return {isPostOverlay, isImageDisplay, isEditProfileOverlay, isSelectedOption, isSelectedOptionPhotos}
})
