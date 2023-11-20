<template>
  <header
    class="w-full lg:max-w-7xl  font-fa absolute top-2 lg:inset-x-0 flex items-center justify-between bg-transparent z-30 text-white mx-auto lg:px-0 px-6">
    <Modal :showModal="modalState" />



    <i class="fa-thin  text-3xl cursor-pointer fa-grid-2 before:![content: '\e196']" v-on:click="mobilemenu = !mobilemenu"></i>
    <i @click="showModalStart()" class="fa-thin  fa-search text-2xl lg:block cursor-pointer mx-4"></i>
    <i v-if="getUser == null" class="fa-thin  fa-user text-2xl lg:block cursor-pointer ml-auto" @click="$router.push('/user/login')"></i>
    <i v-if="getUser != null" class="fa-duotone fa-right-to-bracket text-2xl lg:block cursor-pointer ml-auto" @click="logout()"></i>
    <nav class="nav-desktop absolute top-0 right-10 " >
      <ul class="inline-flex gap-6 text-gray-50 dark:text-gray-50 font-semibold py-8 "  v-if="ismenu == true" >
        <li class="cursor-pointer">
          <nuxt-link to="/">صفحه اصلی</nuxt-link>
        </li>
        <li class="cursor-pointer">
          <nuxt-link to="/content/movies">فیلم</nuxt-link>
        </li>
        <li class="cursor-pointer">
          <nuxt-link to="/content/series">سریال</nuxt-link>
        </li>
        <li class="cursor-pointer">
          <nuxt-link to="/category">ژانر ها</nuxt-link>
        </li>
        <li class="cursor-pointer">
          <nuxt-link to="/purchase">خرید اشتراک</nuxt-link>
        </li>
      </ul>

    </nav>



    <div :class="mobilemenu == true ? 'translate-x-0' : 'translate-x-80'"
      class="block fixed top-0 right-0 m-4 z-50 w-64 inset-4 h-[95%] overflow-y-auto transition-transform bg-secondary/50 backdrop-blur-sm rounded-2xl shadow-lg">

      <div class="relative overflow-hidden w-full flex flex-1 items-center justify-center p-3">
        <nuxt-link to="/" class="">
          <img class="w-36 mx-auto" src="/logo.png" alt="logo"></nuxt-link>

      </div>


      <div class="py-4 overflow-y-auto p-4 border-b border-dashed border-t border-gray-700">
        <ul class="space-y-2 font-medium">
          <li @click="mobilemenu = false">
            <nuxt-link to="/" class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone fa-home"></i>
              <span class="mr-3">خانه</span>
            </nuxt-link>
          </li>
          <li @click="mobilemenu = false">
            <nuxt-link to="/amoozeshi/"  class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone fa-grid"></i>
              <span class="flex-1 mr-3 whitespace-nowrap">آموزشی</span>
            </nuxt-link>
          </li>
          <li @click="mobilemenu = false">
            <nuxt-link to="/content/movies" class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone  fa-film"></i>
              <span class="flex-1 mr-3 whitespace-nowrap">فیلم ها</span>

            </nuxt-link>
          </li>
          <li @click="mobilemenu = false">
            <nuxt-link to="/content/series" class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone fa-films"></i>
              <span class="flex-1 mr-3 whitespace-nowrap">سریالها</span>
            </nuxt-link>
          </li>

          <li @click="mobilemenu = false">
            <nuxt-link to="/category/" class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone fa-grid"></i>
              <span class="flex-1 mr-3 whitespace-nowrap">ژانرها</span>
            </nuxt-link>
          </li>
          
          <li @click="mobilemenu = false">
            <nuxt-link to="/purchase" class="flex items-center p-2 text-nr rounded-lg hover:bg-primary/70 group">
              <i class="fa-solid fa-crown text-nr"></i>
              <span class="flex-1 mr-3 whitespace-nowrap"> خرید اشتراک</span>
            </nuxt-link>
          </li>

          <li @click="mobilemenu = false">
            <nuxt-link to="/aboutus" class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone fa-info"></i>
              <span class="flex-1 mr-3 whitespace-nowrap">درباره ما</span>
            </nuxt-link>
          </li>

          <li @click="mobilemenu = false">
            <nuxt-link to="/contact" class="flex items-center p-2 text-white rounded-lg hover:bg-primary/70 group">
              <i class="fa-duotone fa-phone"></i>
              <span class="flex-1 mr-3 whitespace-nowrap">تماس با ما</span>
            </nuxt-link>
          </li>

        </ul>
      </div>

      <span class="absolute inset-x-0 bottom-2 w-full flex text-center p-4 text-gray-500 font-en">
        v 1.0.0
      </span>
    </div>



    <div
      :class="mobilemenu == true ? 'translate-x-0' : 'translate-x-full duration-300 transition-opacity opacity-0  overflow-hidden'"
      v-show="mobilemenu" v-on:click="mobilemenu = !mobilemenu"
      class="bg-gray-900/10 bg-opacity-50 transition-opacity fixed inset-0 z-30  backdrop-blur-[3px] border-r-2 border-r-nr overflow-hidden">


    </div>


    <!-- <div class="menu block lg:hidden" v-on:click="mobilemenu = !mobilemenu" >
      <IconMenu class="cursor-pointer"/>
    </div> -->

    <img @click="$router.push('/')" alt="plugfilm logo" class="logo w-44 left-0" src="/logo.png" />



  </header>
</template>

<script>
import Modal from "@/components/Home/Search/Modal.vue";
import IconMenu from '@/components/Icons/IconMenu.vue';
export default {
  name: "Header",
  data() {
    return {
      isHidden: false,
      ismenu:false,
      actionmenu: false,
      mobilemenu: false,
      search: "",
      modalState: false,
      isFull: false,
    }
  },
  mounted() {
    this.$nuxt.$on("unsetSearchModal", ($event) => {
      this.modalState = false;
    });
  },
  computed: {
    getUser() {
      return this.$store.getters.getAuthUser;
    },
    activePurchase() {
      return this.$store.getters.getActivePurchase;
    },
  },
  methods: {
    showModalStart() {
      this.modalState = true;
    },
    logout() {
      this.$swal
        .fire({
          title: "هشدار خروج",
          text: "آیا از خروج حساب کاربری خود مطمعنید؟",
          showCancelButton: true,
          showConfirmButton: true,
          confirmButtonText: "بله",
          cancelButtonText: "خیر",
        })
        .then((result) => {
          if (result.value) {
            this.$store.dispatch("doLogout");
          }
        });
    },
    async search_action() {
      if (this.search != "") {
        this.$cookies.set("search", this.search);
        const result = await this.$axios.post("/api/contents/search", {
          search: this.search,
        });
        await this.$store.commit("set_search_result", result.data);

        if (result.data != null) {
          return this.$router.push("/content/searchs");
        }
      } else {
        alert("لطفا متن جستجو را پر کنید");
      }
    },
    doFullScreen() {
      if (this.isFull == false) {
        this.isFull = true;
        this.requestFullscreen(document.documentElement);
      } else {
        this.isFull = false;
        this.exitFullscreen();
      }
    },
    requestFullscreen(element) {
      if (element.requestFullscreen) {
        element.requestFullscreen();
      } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
      } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
      } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
      } else {
        console.log("Fullscreen API is not supported.");
      }
    },
    exitFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      } else {
        console.log("Fullscreen API is not supported.");
      }
    },
  },
  components: {
    Modal,
    IconMenu
  },
};
</script>

<style></style>
