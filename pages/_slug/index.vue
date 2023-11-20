<template>
  <div>
    <main class="relative">
      <WatchSessions :playepisode="playepisode" />

      <div
        v-if="detail != null"
        class="absolute z-0 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none"
      >
        <div class="w-[108rem] flex-none flex justify-end">
          <img src="/bg.png" class="w-[90rem] flex-none max-w-none" />
        </div>
      </div>
      <div class="Single w-full max-w-7xl mx-auto relative pt-28">
        <div
          @click="$router.back()"
          class="cursor-pointer back flex w-full items-center border border-secondary/20 rounded-md px-4 py-3 text-gray-500 bg-secondary/50"
        >
          <span class="text-white/50" 
            ><i class="fa fa-chevron-right pl-2"></i></span
          ><span>بازگشت</span>
        </div>
        <div
          class="grid lg:grid-cols-12 gap-6 mt-8 bg-secondary/30 py-6 px-4 rounded-md"
        >
          <aside class="poster relative overflow-hidden lg:col-span-3">
            <div class="relative overflow-hidden">
              <div class="w-full relative">
                <div
                  class="bg-primary cursor-pointer before:block before:pt-[150%] before:relative w-full h-full mb-[15px] relative shadow-md shadow-menu-mobile rounded-[30px] block before:rounded-[30px] before:bg-[url('/logo.png')] before:place-items-center before:justify-center before:bg-no-repeat before:items-center before:bg-opacity-10 before:bg-center before:bg-[length:150px_70px] shine"
                >
                  <figure
                    class="absolute inset-0 overflow-hidden after:absolute after:w-full"
                  >
                    <img
                      :data-src="detail.Image"
                      :title="detail.FaName"
                      v-lazy-load
                      :alt="detail.FaName"
                      class="rounded-[25px] w-full h-full object-cover duration-300 transition-all"
                    />
                  </figure>
                </div>
              </div>
            </div>
          </aside>

          <div class="movie-content lg:col-span-7">
            <h1 class="text-3xl text-white pt-3">{{ detail.FaName }}</h1>
            <small class="text-gray-400">{{ detail.EnName }}</small>
            <div class="cat text-gray-500" v-if="detail.is_spacial == 0">
              <div class="inline-flex items-center text-sm">
                <span
                  class="pl-2"
                  v-for="(category, index) in detail.categories"
                  :key="index"
                  >{{ category.title }}</span
                >
              </div>
            </div>
            <p
              class="text-justify text-gray-400 my-3 text-sm leading-8 max-w-5xl"
            >
              {{ detail.FaStoryline }}
            </p>

          </div>

          <aside
            class="Watching lg:col-span-2 gap-y-4 space-y-4"
            v-if="medias != null"
          >
            <button
              @click="
                $nuxt.$emit(
                  'onlinePlay',
                    medias[0].finalHlsUrl == ''
                    ? { type: 'mp4', url: medias[0].finalMp4Url }
                    : { url: medias[0].finalHlsUrl, type: 'hls' }
                )
              "
              type="button"
              class="bg-white px-6 py-3 rounded-lg w-full text-primary"
            >
              <i class="fa fa-play pl-2"></i><span>تماشای آنلاین</span>
            </button>
            <a 
              v-if="medias[0].mediaUrl2 != null && allowForDownload == true"
              target="_blank"
              :href="medias[0].mediaUrl2"
              class="bg-gray-700 text-center block px-6 py-3 rounded-lg w-full text-white"
            >
              <i class="fa fa-download pl-2"></i> دانلود فیلم
            </a>
          </aside>
        </div>
      </div>

      <Sessions
        v-if="medias != null && detail != null"
        :medias="medias"
        :detail="detail"
      />

      <Suggests v-if="related_contents != null" :contents="related_contents" />
    </main>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Suggests from "@/components/Single/Suggests.vue";
import Sessions from "@/components/Single/Sessions.vue";
import WatchSessions from "@/components/Single/WatchSessions.vue";

export default {
  name: "IndexPage",
  layout: "home",
  middleware: ["get_detail", "init"],
  components: {
    Suggests,
    Sessions,
    WatchSessions,
  },
  data() {
    return {
      loading: true,
      cdnUrl: null,
      setMediaState: false,
      detail: null,
      medias: null,
      playepisode: false,
      stream: null,
      SideBar: null,
      allowForDownload: false
    };
  },
  head: {
    script: [
      {
        type: "text/javascript",
        src: "/js/jwplayer.js",
        body: true,
        defer: true,
      },
    ],
  },
  created() {
    this.$nuxt.$on("unsetEpisodeModalData", ($event) => {
      this.playepisode = false;
      this.stream = null;
    });
  },
  async mounted() {
    setTimeout(() => {
      this.loading = false;
    }, 400);

    if(this.$store.state.activePurchase != null) {
      this.allowForDownload = true
    }

    this.$nuxt.$on("onlinePlay", ($event) => this.playEpisod($event));
  },
  async fetch() {
    await this.setDetail();

    // set Cats
    if (this.categories != null) {
      this.zhaners = this.categories;
    }

    // get media
    await this.getMedias();
  },
  methods: {
    async set_random_cdn() {
      const urls = ["cdn12.shadfilm.ir", "cdn12.shadfilm.ir"];
      const random = Math.floor(Math.random() * urls.length);
      this.cdnUrl = urls[random];

      if (this.medias != null) {
        await this.$store.commit("set_random_url_for_medias", this.cdnUrl);
        this.medias = this.get_media;
        this.setMediaState = true;
      }
    },
    async setDetail() {
      if (this.get_detail != null) this.detail = this.get_detail;
    },
    getMedias() {
      if (this.get_media != null) {
        this.medias = this.get_media;
      }
    },
    playEpisod(stream) {
      // if (this.is_white != null) {
        // if (this.is_white != true) {
          if (this.$store.state.authUser == null) {
            this.$swal
              .fire({
                title: "ورود به حساب",
                text: "وارد حساب کاربری خود شوید",
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: "وارد میشوم",
                cancelButtonText: "لازم نیست",
              })
              .then((result) => {
                if (result.value) {
                  this.$router.push("/user/login");
                }
              });
            return false;
          } else {
            if (this.$store.state.activePurchase == null) {
              this.$swal
                .fire({
                  title: "خرید اشتراک",
                  text: "جهت تماشای ویدیو اشتراک خریداری کنید",
                  showCancelButton: true,
                  showConfirmButton: true,
                  confirmButtonText: "میخرم",
                  cancelButtonText: "لازم نیست",
                })
                .then((result) => {
                  if (result.value) {
                    this.$router.push("/purchase");
                  }
                });
              return false;
            } else {
              this.playepisode = true;
              this.$JWEPlayer(stream);
              return true;
            }
          }
        // } else {
        //   this.playepisode = true;
        //   this.$JWEPlayer(stream);
        //   return true;
        // }
      // } else {
      //   this.$swal.fire({
      //     title: "خطا",
      //     text: "متاسفانه خطایی در پخش فیلم رخ داده",
      //     showCancelButton: true,
      //     showConfirmButton: true,
      //     confirmButtonText: "حله",
      //   });
      // }
    },
  },
  computed: {
    ...mapGetters({
      related_contents: "get_related_result",
      get_detail: "get_detail_content",
      get_media: "get_media_content",
      is_white: "get_white_status",
    }),
  },
};
</script>

<style scoped>
.swal2-popup .swal2-actions {
  margin: 0.5em auto 0 !important;
}
.swal2-popup .swal2-title {
  font-size: 18px !important;
}
.swal2-popup .swal2-content {
  font-size: 14px !important;
}
.swal2-popup .swal2-styled.swal2-confirm {
  font-size: 14px !important;
}
.swal2-popup .swal2-styled.swal2-cancel {
  font-size: 14px !important;
}
.swal2-popup {
  font-size: 1rem !important;
}
</style>
