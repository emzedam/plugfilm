<template>
    <main
      class="flex-1 h-full scrollbar scrollbar-thumb-custom scrollbar-track-custom-light overflow-y-scroll pb-20"
    >
      <WatchSessions :playepisode="playepisode" />
  
      <Detail
        v-if="medias != null && detail != null"
        :detail="detail"
        :medias="medias"
      />
      
      <Sessions
        v-if="medias != null && detail != null"
        :medias="medias"
        :detail="detail"
      />

      <Suggests v-if="related_contents != null" :contents="related_contents" />
    </main>
</template>
  
<script>
  import { mapGetters } from "vuex";
  import Detail from "@/components/Special/Detail.vue";
  import Suggests from "@/components/Special/Suggests.vue";
  import Sessions from "@/components/Special/Sessions.vue";
  import WatchSessions from "@/components/Special/WatchSessions.vue";
  
  export default {
    name: "IndexPage",
    layout: "single",
    components: {
      Detail,
      Suggests,
      Sessions,
      WatchSessions,
    },
    data() {
      return {
        detail: null,
        medias: null,
        playepisode: false,
        SideBar: null,
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
      });
    },
    mounted() {
      this.$nuxt.$on("onlinePlay", ($event) => this.playEpisod($event));
    },
    async fetch() {
      await this.getDetail();
  
      // get media
      await this.getMedias();

      console.log(this.detail , this.medias);
    },
    methods: {
      async getDetail() {
        const id = this.$route.params.id;
        const get_data = await this.$store.dispatch('get_special_content_details' , id)
        if(get_data.specialDetail.length != 0){
            this.detail = get_data.specialDetail
        }
      },
      async getMedias() {
        const id = this.$route.params.id;
        const get_data = await this.$store.dispatch('get_special_media_details' , id)
        if(get_data.specialMediaDetail.length != 0){
            this.medias = get_data.specialMediaDetail
        }
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
            this.$JWEPlayer(stream);
            return true;
          }
        } else {
          this.$swal.fire({
            title: "خطا",
            text: "متاسفانه خطایی در پخش فیلم رخ داده",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: "حله"
          });
        }
      },
    },
    computed: {
      ...mapGetters({
        related_contents: "get_related_result",
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