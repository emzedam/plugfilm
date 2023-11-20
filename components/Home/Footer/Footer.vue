<template>
  <div>
    <Modal :showModal="modalState" />

    <footer
      class="bg-secondary w-full text-right dark:!border-t-0 border-t border-gray-700 font-fa mt-28"
    >
      <div class="w-full max-w-7xl mx-auto">
        <nav class="nav-desktop hidden lg:flex items-center justify-between">
          <ul class="inline-flex gap-6 text-gray-200 font-semibold py-8">
            <li><nuxt-link to="/">صفحه اصلی</nuxt-link></li>
            <li><nuxt-link to="/contact">تماس با ما</nuxt-link></li>
            <li><nuxt-link to="/aboutus">درباره ما</nuxt-link></li>
            <li><nuxt-link to="/purchase">خرید اشتراک</nuxt-link></li>
          </ul>

          <div class="logo w-32">
            <img src="/logo.png" />
          </div>
        </nav>

        <nav class="nav-mobile lg:hidden block mx-4 my-4 py-8">
          <div
            class="md:block lg:hidden shadow-sm bg-white/10 hidden xs:flex fixed z-10 backdrop-blur flex-none duration-500 lg:z-50 supports-backdrop-blur:bg-white/60 h-[70px] w-[100%] inset-x-0 translate-x-0 bottom-[0] rounded-t-xl transition-[top 0.3s]"
          >
            <div
              class="absolute flex justify-between items-center w-full px-6 pb-2 h-[70px] menu-mobile"
            >
              <nuxt-link
                to="/"
                aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active"
              >
                <div
                  class="h-[40px] w-[40px] p-[8px] cursor-pointer relative text-center before:!text-nr after:!text-red-200"
                >
                  <i
                    class="fa-duotone fa-home hover:text-nr text-[30px] text-white"
                  ></i>
                </div>
              </nuxt-link>
              <a href="javascript:void(0)" @click="showModalStart()">
                <div
                  class="h-[40px] w-[40px] p-[8px] cursor-pointer relative text-center"
                >
                  <i
                    class="fa-duotone fa-search hover:text-nr text-[30px] text-white"
                  ></i>
                </div>
              </a>
              <nuxt-link to="/" class="group">
                <div
                  class="h-[60px] w-[60px] cursor-pointer relative text-center -mt-12 bg-nr hover:bg-yellow-500 p-3 rounded-full flex items-center justify-center group-hover:text-white"
                >
                  <i class="fa-light fa-home text-[30px] text-gray-800"></i>
                </div>
              </nuxt-link>
              <nuxt-link to="/user/login" class="">
                <div
                  class="h-[40px] w-[40px] p-[8px] cursor-pointer relative text-center"
                >
                  <i
                    class="fa-duotone fa-user text-[30px] hover:text-nr text-white"
                  ></i>
                </div>
              </nuxt-link>
              <nuxt-link to="/purchase">
                <div
                  class="h-[40px] w-[40px] p-[8px] hover:text-nr cursor-pointer relative text-center"
                >
                  <i class="fa-duotone fa-crown text-[30px] text-white"></i>
                </div>
              </nuxt-link>
            </div>
          </div>
        </nav>
      </div>
    </footer>
  </div>
</template>

<script>
import Modal from "@/components/Home/Search/Modal.vue";

export default {
  name: "Footer",
  data() {
    return {
      modalState: false,
    };
  },
  mounted() {
    this.$nuxt.$on("unsetSearchModal", ($event) => {
      this.modalState = false;
    });
  },
  methods: {
    showModalStart() {
      this.modalState = true;
    },
  },
  components: {
    Modal,
  },
};
</script>
