<template>
    <div>
        <header id="header" class="mt-8 mb-8 md:flex md:items-start">
            <div class="flex justify-between w-full">
                <h2
                v-if="searchText != null"
                    class="text-2xl font-bold tracking-tight sm:text-1xl text-light-800 dark:text-light-200 flex justify-items-start items-center">
                    <i class="bi bi-chapter leading-[1px] text-[25px] text-yellow-500  p-1 rounded-full ml-1"></i>
                    نمایش نتایج جستجو : {{ searchText }}
                </h2>
            </div>
        </header>
        <div class="grid grid-flow-row-dense grid-cols-12 grid-rows-1" v-if="contents != null">
            <NuxtLink v-for="(movie , index) in contents" :key="index" :to="`/${slug_generator(movie.EnName)}-${movie.id}`" class="md:col-span-4 xs:col-span-6 sm:col-span-6 xl:col-span-3 lg:col-span-3 lp:col-span-3 2xl:col-span-3 3xl:col-span-2 4xl:col-span-2 ml-3 mr-3 mt-8 mb-8">
                <figure class="cursor-pointer before:block before:pt-[150%] w-full h-full before:content-[''] mb-[15px] relative shadow-md dark:shadow-menu-mobile shadow-light-400/20 rounded-[20px]">
                    <div class="before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:bg-50% before:content-[''] dark:bg-menu-mobile bg-light-200 absolute right-0 left-0 top-0 bottom-0 rounded-[20px] before:bg-gradient-to-t dark:before:from-black/100 dark:before:via-black/50 before:from-white/100 before:via-light-100/20  before:to-black/0 before:rounded-[20px]">
                        <img
                        :data-src="movie.Image" :alt="movie.FaName" v-lazy-load :title="movie.FaName"
                            class="rounded-[20px] w-full"
                        >
                    </div>
                    <figcaption>
                        <div class="caption absolute bottom-[30px] right-4 xl:right-4 xl:bottom-6 2xl:bottom-8">
                            <h1 class="-mt-8 text-lg text-right dark:text-white text-primary   whitespace-nowrap overflow-ellipsis xs:text-[17px] sm:text-[17px] md:text-[16px] xl-text-[21px] 2xl:text-[19px] font-bold">{{ movie.FaName }} </h1>
                            <h1 class="text-lg text-right dark:text-white text-primary   whitespace-nowrap xs:text-[13px] sm:text-[17px] md:text-[16px]  xl-text-[18px]"> {{ movie.EnName }}</h1>
                        </div>
                        <span class="pt-1 pb-1 flex items-center justify-center bg-yellow-400 leading-[10px] w-[80px] rounded-full text-light-800 font-en  shadow-sm shadow-yellow-500/20 absolute lg:left-2 xs:left-2 sm:left-2 top-2 text-xs">
                            <span class="flex items-center justify-center w-4 h-4 ml-1 text-xs text-white rounded-full bg-primary">
                                {{ Math.round(movie.ImdbRate) }}
                            </span>
                            IMDB
                            <i class="bi bi-bookmark-4 leading-[1px] mr-1"></i>
                        </span>
                        <span class="flex items-center justify-center  w-[75px] h-8 xl:h-8 xl:w-[75px] xl:text-[17px] 2xl:h-8 2xl:w-[90px] 2xl:text-[19px] 4xl:w-[150px] 4xl:text-[25px] 3xl:w-[130px] 3xl:text-[25px] md:w-[62px] md:h-[4] md:p-1 rounded-full text-light-800 font-en bg-gradient-to-tl from-yellow-300 to-yellow-500 shadow-md shadow-yellow-500/30 absolute right-2 bottom-[-15px] text-xs p-2">
                            <i class="bi bi-play-1 text-[13px] leading-[1px] ml-1 xl:text-[14px]"></i>
                            <span class="text-[14px] font-fa text-right pt-[3px] font-bold"> تماشا</span>
                        </span>
                        <span class="flex items-center justify-center  w-[75px] h-8 xl:h-8 xl:w-[75px] xl:text-[17px] 2xl:h-8 2xl:w-[90px] 2xl:text-[19px] 4xl:w-[150px] 4xl:text-[25px] 3xl:w-[130px] 3xl:text-[25px] md:w-[62px] md:h-[4] md:p-1 rounded-full text-light-100 font-en  bg-gradient-to-tl from-menu-mobile to-primary/70 shadow-md shadow-light-900/30 absolute left-2 bottom-[-15px] text-xs p-2 border border-dark-b">
                            <i class="bi bi-file text-[13px] font-bold leading-[1px] ml-1 xl:text-[14px]"></i>
                            <span class="text-[14px] font-fa font-bold text-right pt-[3px]"> {{ movie.categories[0].title }}</span>
                        </span>
                        <span class="flex items-center justify-center text-light-100 absolute right-1 top-[0px] sm:text-[32px] xs:text-[32px] text-[32px] p-3">
                            <i class="bi bi-bookmark-19 leading-[1px] xl:text-[25px]"></i>
                            <i class="bi bi-bookmark-20 leading-[1px] text-yellow-400 hidden xl:text-[25px]"></i>
                            <i class="bi bi-bookmark-21 leading-[1px]  hidden xl:text-[25px]"></i>
                        </span>
                        <span class="flex items-center justify-center text-light-100 absolute h-full w-full top-0">
                            <i class="bi bi-play-3 leading-[1px] text-[25px] text-yellow-500 bg-primary p-1 rounded-full"></i>
                        </span>
                    </figcaption>
                </figure>
            </NuxtLink>

            <NuxtLink
                :to="`${slug_generator(movie.EnName)}-${movie.id}`"
                v-for="(movie, index) in contents"
                :key="index"
                class="relative overflow-hidden swiper-slide"
              >
                <div class="opacity-90 hover:opacity-100 w-full relative">
                  <div
                    class="cursor-pointer before:block before:pt-[150%] before:bg-gradient-to-t before:from-black/100 before:via-black/50 before:to-black/0 before:relative w-full h-full before:content-[''] mb-[15px] relative shadow-md shadow-menu-mobile rounded-[20px] block before:rounded-[15px]"
                  >
                    <a href="/movie/kantara-1399">
                      <div
                        class="before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:content-[''] absolute right-0 left-0 top-0 bottom-0 rounded-[20px] before:z-10 before:bg-gradient-to-t before:from-[#1c1820]/100 before:via-[#1c1820]/50 before:to-[#1c1820]/0 before:rounded-[18px]"
                      >
                        <img
                          :data-src="movie.Image"
                          onerror="javascript:this.src='/placeholder.svg'"
                          :alt="movie.FaName"
                          :title="movie.FaName"
                          v-lazy-load
                          class="rounded-[20px] w-full h-full object-cover"
                        />
                      </div>
                    </a>
                    <div
                      class="imdb absolute left-2 top-2 justify-center flex items-center bg-black/70 rounded-md w-20 h-8 cursor-pointer py-2 px-2 leading-[1px] shadow transition ease-in-out delay-150 z-20"
                    >
                      <span
                        class="text-white pl-2 justify-center items-center flex leading-[1px]"
                      >
                        {{ movie.ImdbRate }}
                      </span>
                      <i
                        class="fa-solid fa-star text-md text-yellow-500 justify-center items-center flex leading-[1px]"
                      ></i>
                    </div>

                    <div
                      class="bookmark absolute right-2 top-2 justify-center flex items-center bg-black/80 hover:bg-black/97 rounded-md lg:w-10 lg:h-10 w-8 h-8 cursor-pointer hover:!text-white shadow transition ease-in-out delay-150 text-white z-20"
                    >
                      <i class="fa fa-plus lg:text-2xl"></i>
                    </div>

                    <div class="absolute bottom-16 right-6 z-20">
                      <h1
                        class="-mt-8 text-lg text-right text-white xs:text-[17px] sm:text-[17px] md:text-[16px] xl:text-[21px] 2xl:text-[22px]"
                      >
                        <p class="line-clamp-2">{{ movie.FaName }}</p>
                      </h1>
                      <h1
                        class="text-lg text-right text-white/70 xs:text-[13px] sm:text-[17px] md:text-[16px] xl-text-[18px] mt-2"
                      >
                        <p class="line-clamp-2">{{ movie.EnName }}</p>
                      </h1>

                      <button
                        class="bg-red-500/50 backdrop-blur text-white rounded-md justify-center items-center mt-4 w-32 h-10 hidden lg:flex z-10"
                      >
                        <i class="fa-duotone fa-play pl-4"></i> تماشا
                      </button>
                    </div>
                  </div>
                </div>
              </NuxtLink>
        </div>
    </div>






</template>

<script>
export default {
    name:"Search",
    data(){
        return {
            searchText: null
        }
    },
    props: {
        contents: {
            type: [Array , Object],
            required: true
        }
    },
    mounted(){
        if(this.$cookies.get('search') != undefined){
            this.searchText = this.$cookies.get('search'); 
        }else{
            this.searchText = null; 
        }
    },
    methods: {
        slug_generator(text){
            return this.$slugGenerator(text)
        }
    }
}
</script>

<style>

</style>