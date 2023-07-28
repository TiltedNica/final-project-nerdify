<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="w-full bg-white rounded-t-2xl mt-5">
        <div class="flex justify-between border-b-2 pb-3 pt-4 px-5">
            <h3>Photos and Videos</h3>
            <Link class="text-[#0062FF]" href="/">See All</Link>
        </div>
        <div class="grid grid-cols-3 gap-2.5 px-5 py-5">
            <img class="h-[90px] w-[90px] rounded-2xl" src="/img/4363d31f48315ee194af588e55e84d54fed169adr1-1515-981v2_hq.jpg" alt="">
            <img class="h-[90px] w-[90px] rounded-2xl" src="/img/316a30da56abfe568bbbda57e61363b0dc53a2cdr1-313-313v2_00.jpg" alt="">
            <img class="h-[90px] w-[90px] rounded-2xl" src="/img/4363d31f48315ee194af588e55e84d54fed169adr1-1515-981v2_hq.jpg" alt="">
            <img class="h-[90px] w-[90px] rounded-2xl" src="/img/316a30da56abfe568bbbda57e61363b0dc53a2cdr1-313-313v2_00.jpg" alt="">
            <img class="h-[90px] w-[90px] rounded-2xl" src="/img/4363d31f48315ee194af588e55e84d54fed169adr1-1515-981v2_hq.jpg" alt="">
            <img class="h-[90px] w-[90px] rounded-2xl" src="/img/316a30da56abfe568bbbda57e61363b0dc53a2cdr1-313-313v2_00.jpg" alt="">
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
