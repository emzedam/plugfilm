<template>
  <section class="main-slider lg:max-w-7xl my-20 mx-auto w-full">
    <header
      class="flex items-center justify-between py-8 w-full mx-auto lg:max-w-7xl overflow-hidden relative"
    >
      <div class="flex items-center justify-between">
        <h2 class="lg:text-2xl text-white">ژانر فیلم و سریال</h2>
        <span class="text-sm mr-4 text-gray-200 flex items-center"></span>
      </div>
      <div class="slider-btn pr-0 relative overflow-hidden items-center flex">
        <div
          class="arrow-slider flex items-center w-16 justify-between text-white"
        >
          <div class="prev11 w-10 cursor-pointer">
            <i class="fa-solid fa-chevron-right"></i>
          </div>
          <div class="next11 w-10 cursor-pointer">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
        </div>
      </div>
    </header>
    <div
        ref="swiper_cats"
      class="swiper relative overflow-hidden"
    >
      <div class="swiper-wrapper">
        <nuxt-link
        :to="`/category/${persian_slug(cat.name)}`"
        v-for="(cat, index) in categories"
        :key="index"
        class="swiper-slide relative bg-secondary rounded-full text-white text-center py-2 cursor-pointer hover:bg-nr transition-colors duration-500 shadow-md"
        >
            <span>{{ cat.name }}</span>
        </nuxt-link>
      </div>
    </div>
  </section>

  <!-- <section aria-labelledby="Genre-heading">
    <div
      class="w-full px-4 mx-auto sm:px-6 lg:px-8 lg:pt-3 md:mt-8 xs:mt-8 sm:mt-8"
    >
      <div class="pb-2 md:flex md:items-center md:justify-between">
        <h2
          id="favorites-heading"
          class="lg:text-2xl font-bold tracking-tight text-white"
        >
          <i class="fa-duotone fa-masks-theater pl-2 text-red-500"></i>
          ژانر فیلم و سریال
        </h2>
        <a
          href="#"
          class="hidden text-sm font-medium hover:text-slate-500 !text-ptext"
        >
          مشاهده بیشتر
          <span aria-hidden="true"> →</span>
        </a>
      </div>
      <h2 class="text-xs font-medium text-ptext">Genre of movies and series</h2>
      <div class="mt-4">
        <ul class="w-full h-full">
          <div class="swiper Genres" ref="swiper">
            <div class="swiper-wrapper" v-if="categories != null">
              <NuxtLink
                :to="`/category/${persian_slug(cat.name)}`"
                v-for="(cat, index) in categories"
                :key="index"
                class="flex bg-transparent swiper-slide"
              >
                <div
                  class="flex items-center justify-center w-16 h-16 bg-red-800 text-white text-sm font-medium rounded-r-md text-center"
                >
                  {{ cat.type == "film" ? "فیلم" : "سریال" }}
                </div>
                <div
                  class="flex flex-1 items-center justify-between truncate rounded-l-md bg-secondary"
                >
                  <div class="flex-1 truncate px-4 py-2 text-xs w-16 h-full">
                    <NuxtLink
                      :to="`/category/${persian_slug(cat.name)}`"
                      class="font-medium text-white hover:text-ptext"
                      >{{ cat.name }}</NuxtLink
                    >
                    <p class="text-ptext pt-2">
                      دسته از نوع {{ cat.type == "film" ? "فیلم" : "سریال" }}
                    </p>
                  </div>
                </div>
              </NuxtLink>
            </div>
            <div class="swiper-button-next"></div>
          </div>
        </ul>
      </div>
    </div>
  </section> -->
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";

export default {
  name: "CatSlider",
  props: {
    categories: {
      type: [Array, Object],
      required: true,
    },
  },
  async mounted() {
    await this.$nextTick();
    new Swiper(this.$refs.swiper_cats, {
      slidesPerView: 8,
      loop: false,
      dir: "ltr",
      spaceBetween: 10,
      navigation: { nextEl: ".next11", prevEl: ".prev11" },
      pagination: { clickable: false },
      breakpoints: {
        3000: {
          slidesPerView: 8,
          spaceBetween: 15,
        },
        1920: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
        1400: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
        1200: {
          slidesPerView: 6,
          spaceBetween: 15,
        },
        640: {
          slidesPerView: 5,
          spaceBetween: 15,
        },
        320: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
      },
    });
  },
  methods: {
    persian_slug(text) {
      return this.$PersianSlugGenerator(text);
    },
  },
};
</script>
