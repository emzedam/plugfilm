<template>
  <div class="grid grid-flow-row-dense grid-cols-12 grid-rows-1">
    <div
      class="col-span-3 lg:col-span-5 2xl:col-span-4 3xl:col-span-4 pt-[60px] m-[20px] hidden lg:block"
    >
      <figure
        class="cursor-pointer before:block before:pt-[150%] w-full h-full before:content-[''] relative shadow shadow-secondary shadow-secondary/2 rounded-[20px]"
      >
        <div
          class="bg-secondary absolute right-0 left-0 top-0 bottom-0 rounded-[20px]"
        >
          <img
            :data-src="detail.Image"
            :title="detail.FaName"
            v-lazy-load
            :alt="detail.FaName"
            onerror="javascript:this.src='/placeholder.svg'"
            class="rounded-[20px] w-full h-full"
          />
        </div>
        <figcaption
          class="absolute left-[50%] top-[50%] -translate-x-2/4 -translate-y-2/4"
        >
          <span
            class="flex items-center justify-center w-[75px] h-[75px] rounded-full text-light-800 font-en text-xs p-3 backdrop-blur supports-backdrop-blur:bg-white/60 bg-white/10 border border-gray-400/20"
          >
            <i
              class="fa fa-play text-[40px] leading-[1px] text-light-500/50"
            ></i>
          </span>
        </figcaption>
      </figure>
    </div>
    <div
      class="relative col-span-9 lg:col-span-7 2xl:col-span-8 3xl:col-span-8 md:col-span-12 sm:col-span-12 xs:col-span-12 Des p-3 mt-10 xs:mt-0 sm:mt-0 md:mt-0"
    >
      <div
        class="before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:bg-50% before:content-[''] bg-primary absolute right-0 left-0 top-0 before:bg-gradient-to-t before:from-primary/100 before:via-primary/50 z-0 lg:-z-10 xl:-z-10 2xl:-z-10 3xl:-z-10 4xl:-z-10"
      >
        <img
        :data-src="detail.Image"
        :title="detail.FaName"
        v-lazy-load
        :alt="detail.FaName"
        onerror="javascript:this.src='/placeholder.svg'"
        class="w-full h-[500px] object-cover lg:blur-[50px] lg:grayscale lg:opacity-30"
        />
        <figcaption
          class="absolute left-[50%] top-[50%] -translate-x-2/4 -translate-y-2/4 block md:hidden z-20"
        >
          <span
            class="flex items-center justify-center w-[50px] h-[50px] rounded-full text-light-800 font-en text-xs p-3 backdrop-blur supports-backdrop-blur:bg-white/40 bg-white/10 dark:bg-white/2 border border-light-400/20"
          >
            <i class="bi bi-play-1 text-[30px] leading-[1px] text-play/30"></i>
          </span>
        </figcaption>
      </div>
      <div
        class="pt-[100px] lg:pt-[40px] md:pt-[350px] sm:pt-[350px] xs:pt-[350px] relative z-10"
      >
        <h1 class="pr-4 pt-4 text-white text-[30px] cursor-pointer">
            {{ detail.FaName }}
        </h1>
        <h2 class="pr-4 pt-2 text-red-500">{{ detail.EnName }}</h2>
        <div class="Imdb mt-3 mb-3 pr-4">
          <span
            class="pt-1 pb-1 flex items-center justify-center bg-yellow-400 leading-[20px] 3xl:h-[30px] w-[100px] rounded-2xl text-primary font-en shadow-sm shadow-yellow-500/20"
          >
            <span
              class="flex items-center justify-center w-4 h-4 p-1 ml-1 text-xs text-white rounded-full bg-primary"
            >
            {{ detail.ImdbRate }}
            </span>
            <span class="text-xs text-blask pt-[1px]">IMDB</span>
            <i class="fa-solid fa-star leading-[1px] mr-1"></i>
          </span>
        </div>
        <div
          class="binto-info-tag mt-[10px] text-light-50 text-[13px] leading-[22px] mb-[20px] inline-flex pr-4"
        >
          <span
            class="text-[16px] text-white shadow-dark-b leading-[19px] rounded-md mr-0 text-light-600 dark:text-light-400 pr-2 pl-2 flex items-center justify-start h-[19px]"
          >
            <i
              class="fa-duotone fa-people-group leading-[1px] ml-2 text-[16px] text-red-400"
            ></i>

            <a class="leading-[1px]" v-if="detail.AgeLimit != 0"
            >{{ detail.AgeLimit }}+ مناسب برای سنین بالای
                {{ detail.AgeLimit }} سال</a
            >
          <a class="leading-[1px]" v-else>محدودیت سنی ندارد</a>

          </span>
          <span
            class="text-[16px] text-white shadow-dark-b leading-[19px] rounded-md mr-0 text-light-600 dark:text-light-400 pr-2 pl-2 flex items-center justify-start h-[19px]"
          >
            <i
              class="fa-duotone fa-calendar-days leading-[1px] ml-2 text-[16px] text-red-400"
            ></i>
            <a class="leading-[1px]">{{ detail.ReleaseYear }}</a>
          </span>
          <span
            class="text-[16px] text-white shadow-dark-b leading-[19px] rounded-md mr-0 text-light-600 dark:text-light-400 pr-2 pl-2 flex items-center justify-start h-[19px]"
          >
            <i
              class="fa-duotone fa-closed-captioning leading-[1px] ml-2 text-[16px] text-red-400"
            ></i>
            <a class="leading-[1px]"> {{ detail.TranslateType }}</a>
          </span>
        </div>
        <!-- <div class="flex pr-4 text-white/70 text-sm pt-4">
          <div
          v-for="(category, index) in detail.categories"
          :key="index"
            class="bg-secondary/80 p-2 rounded-md ml-2 cursor-pointer relative shadow flex items-center"
          >
            <span class="block">
              <i class="fa-thin fa-hashtag text-sm text-red-500 shadow"></i>
            </span>
            <span class="pr-2">{{ category.title }}</span>
          </div>
        </div> -->
        <p class="pr-4 pt-4 text-ptext text-sm cursor-text">
            {{ detail.FaStoryline }}
        </p>
        <div class="Button w-full flex items-center mt-6 pr-4">
          <button
            @click="$nuxt.$emit('onlinePlay', Stream)"
            class="bg-red-800 text-white p-2 h-10 rounded-md flex items-center justify-center"
          >
            <i class="fa fa-play leading-[1px] ml-1 mr-1 text-[20px]"></i>
            <span>تماشای آنلاین</span>
          </button>
          <!-- <button
            @click.stop.prevent="addToFave(detail.id)"
            v-if="!loaderFave || detail.id != faveId"
            class="bg-red-800 text-white p-2 h-10 rounded-md mr-2 flex items-center justify-center"
          >
            <i class="fa fa-bookmark leading-[1px] ml-1 mr-1 text-[20px]"></i>
            <span class="hidden sm:block">افزودن به لیست</span>
          </button> -->
          <!-- <button
            v-if="loaderFave && detail.id == faveId"
            class="bg-red-800 text-white p-2 h-10 rounded-md mr-2 flex items-center justify-center"
          >
            <i class="fa fa-bookmark leading-[1px] ml-1 mr-1 text-[20px]"></i>
            <span class="hidden sm:block">در حال ذخیره ...</span>
          </button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Detail",
  props: {
    detail: {
      type: [Array, Object],
      required: true,
    },
    medias: {
      type: [Array, Object],
      required: true,
    },
  },
  data() {
    return {
      Stream: { url: '' , type: '' },
      loaderFave: false,
      faveId: "",
    };
  },
  mounted() {
    if(this.medias != null){
      if(this.medias[0].finalHlsUrl != null){
        this.Stream.url  = this.medias[0].finalHlsUrl
        this.Stream.type = 'hls'
      }else{
        this.Stream.url  = this.medias[0].finalMp4Url
        this.Stream.type = 'mp4'
      }
    }
  },
  methods: {
    // async addToFave(id) {
    //   this.faveId = id;
    //   this.loaderFave = true;

    //   if (this.$store.state.authUser == null) {
    //     this.loaderFave = false;
    //     this.faveId = "";
    //     this.$swal
    //       .fire({
    //         title: "لاگین به حساب",
    //         text: "برای اضافه کردن به لیست علاقه مندی ابتدا باید وارد حساب کاربری خود شوید",
    //         showCancelButton: true,
    //         showConfirmButton: true,
    //         confirmButtonText: "ورود به حساب",
    //         cancelButtonText: "لازم نیست",
    //       })
    //       .then((result) => {
    //         if (result.value) {
    //           this.$router.push("/user/login");
    //         }
    //       });
    //   } else {
    //     const response = await this.$store.dispatch("addToFavorite", id);
    //     if (response.data.status == "err" && response.data.message == "exist") {
    //       this.faveId = "";
    //       this.loaderFave = false;
    //       this.$swal.fire(
    //         "علاقه مندی ها",
    //         "این فیلم قبلا در لیست علاقه مندیهای شما اضافه شده",
    //         "error"
    //       );
    //     }
    //     if (response.data.status == 200 && response.data.message == "success") {
    //       this.loaderFave = false;
    //       this.faveId = "";
    //       this.$swal.fire(
    //         "علاقه مندی ها",
    //         "فیلم مد نظر شما با موفقیت به لیست علاقه مندی ها اضافه شد",
    //         "success"
    //       );
    //     }
    //   }
    // },
  },
};
</script>
