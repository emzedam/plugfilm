<template>
<div>

    <div class="loading-indicator bg-primary" :class="!loading ? 'hidee' : ''">
      <img alt="plugfilm logo" class="logo w-44 left-0" src="/logo.png" data-not-lazy>
    </div>
    
    <Header />

      <Nuxt />

    <!-- <Footer /> -->

</div>
    
</template>

<script>

import Footer from '@/components/Home/Footer/Footer.vue'
import Header from '@/components/Home/Header/Header.vue'

import { mapGetters } from 'vuex';

export default {
    name: 'home',
    data() {
        return {
            loading: true,
            leftSideData: {
              favorites: null,
              specials: null
            }
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 400)

        
        this.leftSideData.favorites = this.newers.slice(this.newers.length-3 , this.newers.length+3)
        this.leftSideData.specials  = this.imdbs.slice(this.imdbs.length-3 , this.imdbs.length+3)
    },
    components: {
      Footer,
      Header
    },
    computed: {
      ...mapGetters({
        newers: 'get_newers',
        imdbs: 'get_imdbs',
      })
    }
}
</script>

<style scoped>

.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid #dc2626;
  border-color: #dc2626 transparent #dc2626 transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}



  .loading-indicator{
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    z-index: 10000;
    text-align: center;
    font-size: 3rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 1;
    visibility: visible;
  }

.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 54px;
  height: 54px;
  margin: 8px;
  border: 3px  solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #1fae30 transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.loading-indicator.hidee{
  animation-name: hidePre;
  animation-duration: .3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease-in-out;
}

@keyframes hidePre {
  0%{
    opacity: 1;
    visibility: visible;
  }
  100%{
    opacity: 0;
    visibility: hidden;
  }
}

  </style>
