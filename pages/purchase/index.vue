<template>
    <div>
        <Purchase v-if="purchases_list != null" :purchases="purchases" />
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import Purchase from '@/components/Purchase/Purchase.vue';

export default {
    name: "IndexPage",
    middleware: ['purchase' , 'init'],
    layout: "home",
    data(){
        return {
            purchases: null
        }
    },
    components: {
        Purchase
    },
    async fetch(){
        await this.getPurchase()
    },
    methods: {
        async getPurchase(){
            if(this.purchases_list != null){
                this.purchases = this.purchases_list
            }else{
                this.purchases = null
            }
        }
    },
    computed: {
        ...mapGetters({
            purchases_list: 'get_purchases'
        })
    }
    
}
</script>