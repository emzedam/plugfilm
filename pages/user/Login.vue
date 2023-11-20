
<template>
  <div
    class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-primary"
  >
    <div
      class="absolute z-0 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none"
    >
      <div class="w-[108rem] flex-none flex justify-end">
        <img src="/bg.png" class="w-[90rem] flex-none max-w-none" />
      </div>
    </div>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="/logo.png" alt="Your Company" />
      <h2
        class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white"
      >
        ورود یا ایجاد حساب کاربری
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" @submit.prevent="sendCode()">
        <div>
          <label
            for="mobile"
            class="block text-sm font-medium leading-6 text-gray-100"
            >شماره موبایل</label
          >
          <div class="mt-2">
            <input
              v-model="phone"
              name="mobile"
              type="mobile"
              autocomplete="mobile"
              required
              class="block w-full rounded-md border-0 py-2 shadow-sm border-transparent focus:border-transparent focus:ring-0 outline-none placeholder:text-gray-100 px-2 text-gray-50 focus:ring-orange-600 sm:text-sm sm:leading-6 bg-gray-700"
            />
          </div>
          <span class="errorphone" role="alert" v-if="errors.phone">
            <strong style="color: red">{{ errors.phone[0] }}</strong>
          </span>
        </div>

        <div>
          <button
            v-if="registerLoading == false"
            type="submit"
            class="flex w-full justify-center rounded-md bg-nr px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            ورود به حساب کاربری
          </button>
          <button
            v-if="registerLoading == true"
            type="button"
            class="flex w-full justify-center rounded-md bg-nr px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            <div class="lds-ellipsis">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </button>
        </div>
      </form>

      <p class="mt-4 text-center text-sm text-gray-500">
        حساب کاربری ندارید ؟
        <nuxt-link
          to="/user/register"
          class="font-semibold leading-6 text-nr hover:text-orange-500"
          >عضو شوید</nuxt-link
        >
      </p>
    </div>
  </div>
</template>


<script>
export default {
  name: "Login",
  layout: "login",
  middleware: "guest",
  data() {
    return {
      registerLoading: false,
      errors: {},
      phone: "",
    };
  },
  methods: {
    async sendCode() {
      this.registerLoading = true;
      if (this.phoneValidate(this.phone)) {
        let checkExist = await this.$axios.post("/api/users/checkExist", {
          phone: this.phone,
        });
        if (checkExist.data.allow == true) {
          let sendCode = await this.$store.dispatch("sendOTP", {
            action: "login",
            phone: this.phone,
            status: false,
          });
          if (sendCode.satus == "success") {
            this.registerLoading = false;
            return this.$router.push("/user/receive");
          }
          if (sendCode.satus == "error") {
            this.registerLoading = false;
            this.clearForm();
            this.$swal.fire("Server Err", "خطای سمت سرور ، بعدا امتحان کنید");
          }
        } else {
          this.registerLoading = false;
          this.$swal.fire(
            "NotFound",
            "متاسفانه کاربری با این شماره همراه در سیستم یافت نشد"
          );
          this.clearForm();
        }
      }
    },
    getErrs() {
      if (this.$store.getters.getErrors) {
        this.errors = this.$store.getters.getErrors;
      }
    },
    clearForm() {
      this.phone = "";
    },
    fixNumbers(phoneNumber) {
      if (typeof phoneNumber === "string") {
        for (var i = 0; i < 10; i++) {
          phoneNumber = phoneNumber
            .replace(this.$store.state.persianNumbers[i], i)
            .replace(this.$store.state.arabicNumbers[i], i);
        }
      }
      return phoneNumber;
    },
    phoneValidate(phoneNumber) {
      phoneNumber = this.fixNumbers(phoneNumber);
      if (phoneNumber != "") {
        var phoneNumber = parseInt(phoneNumber, 10);
        let numberWithZero = "0" + phoneNumber;
        if (numberWithZero.length == 11) {
          this.errors = {};
          return true;
        } else {
          this.registerLoading = false;
          this.errors = { phone: ["!شماره همراه نامعتبر میباشد"] };
          return false;
        }
      } else {
        this.registerLoading = false;
        this.errors = { phone: ["!فیلد شماره همراه خالی میباشد"] };
        return false;
      }
    },
  },
};
</script>

<style scoped>
.register_text {
  color: #333 !important;
  border-bottom: 1px solid #333;
}

.errorphone {
  display: block;
  text-align: center;
  background: rgb(255 0 0 / 10%);
  border-radius: 20px;
  margin-top: 10px;
}

.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 22px;
}
.lds-ellipsis div {
  position: absolute;
  top: 8px;
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: rgb(31, 29, 29);
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 5px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 5px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 29px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 53px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}
</style>
