<template>
  <section class="banner lg:px-6 overflow-hidden relative">
    <div class="w-full xl:mx-auto xl:max-w-7xl overflow-hidden relative">
      <div class="relative  overflow-hidden xl:w-full">
        <div
          class="lg:bg-[#af1919] sm:bg-gray-800/90 h-[450px] lg:rounded-2xl lg:p-0 px-4 py-6"
        >
          <div
            :style="{'background-image': 'url('+content.Image+')' , 'background-position': 'center left!important'}"
            class="bg-auto bg-left-top bg-to bg-blend-color-burn bg-no-repeat h-full w-full rounded-2xl overflow-hidden after:absolute after:w-full after:top-0 after:z-[1] after:left-0 after:right-0 lg:after:rounded-2xl after:bottom-0 after:h-full" :class="bgSpecial"
          ></div>
          <div
            class="grid lg:grid-cols-12 md:grid-cols-4 grid-cols-4 w-full absolute inset-0 z-[2] p-4"
          >
            <div
              class="lg:col-span-2 md:col-span-1 col-span-4 justify-center hidden md:flex items-center"
            >
              <img
                :data-src="content.Image"
                :title="content.FaName"
                v-lazy-load
                :alt="content.FaName"
                class="rounded-[15px] shadow-lg w-[200px] h-[300px]"
              />
            </div>

            <div class="lg:col-span-10 md:col-span-3 col-span-4 w-full">
              <div class="Imdb pt-4 pr-4 flex items-center justify-start">
                <span>
                  <span
                    class="pt-[1px] px-4 py-1 bg-yellow-400 w-[100px] rounded-md text-black font-en shadow-sm shadow-yellow-500/20 text-lg font-semibold"
                    >IMDB</span
                  >
                </span>
                <span
                  class="flex items-center justify-center w-4 h-4 p-1 ml-1 text-xl text-white mr-3"
                >
                  {{ content.ImdbRate }}
                </span>
              </div>

              <h2 class="pr-4 pt-4 text-white text-[26px] cursor-pointer">
                {{ content.FaName }}
              </h2>
              <h2 class="pr-4 text-white lg:text-[50px] font-en">
                {{ '...'+content.EnName.substr(0,30) }}
              </h2>

              <p
                class="pr-4 pt-4 text-white text-md cursor-text max-w-xl leading-9"
              >
                {{ content.FaStoryline.substr(0,200)+'...' }}
              </p>
              <div class="Button w-full flex items-center mt-6 pr-4">
                <a
                  href="/heartbeat-1689"
                  class="bg-white/20 text-white backdrop-blur text-center px-6 py-2 h-10 rounded-md flex items-center justify-center"
                  ><i
                    class="fa fa-play leading-[1px] ml-3 mr-1 text-[20px]"
                  ></i>
                  <span>تماشا</span></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { mapGetters } from "vuex";
import WatchSessions from "@/components/Single/WatchSessions.vue";

export default {
  name: "Special",
  data() {
    return {
      mediaUrl: null,
      playepisode: false,
      loaderFave: false,
      faveId: "",
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
  props: {
    content: {
      required: true,
      type: [Array, Object],
    },
    bgSpecial: {
      required: true,
      type: [Array , Object],
      default: []
    }
  },
  components: {
    WatchSessions,
  },
  async mounted() {
    await this.get_media_movie();
  },
  methods: {
    slug_generator(text) {
      return this.$slugGenerator(text);
    },
    async addToFave(id) {
      this.faveId = id;
      this.loaderFave = true;

      if (this.$store.state.authUser == null) {
        this.loaderFave = false;
        this.faveId = "";
        this.$swal
          .fire({
            title: "لاگین به حساب",
            text: "برای اضافه کردن به لیست علاقه مندی ابتدا باید وارد حساب کاربری خود شوید",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: "ورود به حساب",
            cancelButtonText: "لازم نیست",
          })
          .then((result) => {
            if (result.value) {
              this.$router.push("/user/login");
            }
          });
      } else {
        const response = await this.$store.dispatch("addToFavorite", id);
        if (response.data.status == "err" && response.data.message == "exist") {
          this.faveId = "";
          this.loaderFave = false;
          this.$swal.fire(
            "علاقه مندی ها",
            "این فیلم قبلا در لیست علاقه مندیهای شما اضافه شده",
            "error"
          );
        }
        if (response.data.status == 200 && response.data.message == "success") {
          this.loaderFave = false;
          this.faveId = "";
          this.$swal.fire(
            "علاقه مندی ها",
            "فیلم مد نظر شما با موفقیت به لیست علاقه مندی ها اضافه شد",
            "success"
          );
        }
      }
    },
    async get_media_movie() {
      // console.log( this.content.id);
      const medias = await this.$store.dispatch("get_media_movie", {
        id: this.content.id,
      });
      this.mediaUrl = medias.data[0].mediaUrl1;
    },
    playEpisod(stream) {
      if (this.is_white != null) {
        if (this.is_white != true) {
          if (this.$store.state.authUser == null) {
            this.$swal
              .fire({
                title: "ورود به حساب",
                text: "برای تماشای ویدیو ابتدا باید وارد حساب کاربری خود شوید",
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
                  text: "خرید اشتراک برای تماشای ویدیو الزامیست",
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
        } else {
          this.playepisode = true;
          this.stream = stream;
          this.$JWEPlayer(stream);
          return true;
        }
      } else {
        this.$swal.fire({
          title: "خطا",
          text: "متاسفانه خطایی در پخش فیلم رخ داده",
          showCancelButton: true,
          showConfirmButton: true,
          confirmButtonText: "حله",
        });
      }
    },
  },
  computed: {
    ...mapGetters({
      is_white: "get_white_status",
    }),
  },
};
</script>

<style scoped></style>
