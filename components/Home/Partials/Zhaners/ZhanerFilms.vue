<template>
    <div class="jgpxb pc-row">

        <div class="row-block channelPage hot">

            <div class="gXgHRs">
                <div class="XgHRs">
                    <div class="menu-cat">
                        <ul v-if="zhanerfilms != null">
                            <li>
                                <i class="payesh pmi-menu_100"></i>
                                <a href="javascript:void(0)">ژانر های تخصصی فیلم</a>
                            </li>
                            <li v-for="(zhaner, index) in zhanerfilms" :key="index">
                                <NuxtLink :to="`/category/${persian_slug(zhaner.name)}`">{{ zhaner.name }}</NuxtLink>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ZhanerFilms",
    props: {
        zhanerfilms: {
            type: [Array, Object],
            required: true
        }
    },
    methods: {
        persian_slug(text){
            return this.$PersianSlugGenerator(text)
        }
    }
}
</script>

<style>

</style>