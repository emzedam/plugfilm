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
      <form class="space-y-6" @submit.prevent="sendCodeValidate()">
        <div>
          <label
            for="mobile"
            class="block text-sm font-medium leading-6 text-gray-100"
            >کد تایید</label
          >
          <div class="mt-2">
            <input
              v-model="data.code"
              name="mobile"
              type="number"
              required
              class="block w-full rounded-md border-0 py-2 shadow-sm border-transparent focus:border-transparent focus:ring-0 outline-none placeholder:text-gray-100 px-2 text-gray-50 focus:ring-orange-600 sm:text-sm sm:leading-6 bg-gray-700"
            />
          </div>
          <span class="errorphone" role="alert" v-if="errors.phone">
            <strong style="color: red">{{ errors.phone[0] }}</strong>
          </span>
        </div>

        <div style="padding: 7px 22px 0px 22px" class="time_container">
                <span v-if="timerEnded">ارسال مجدد کد تا </span>
                <a
                  href="javascript:void(0)"
                  v-if="timerEnded"
                  class="register_text"
                  style="color: rgb(255 168 0); margin-right: 5px"
                >
                  {{ seconds }} : {{ minutes }} دیگر
                </a>
                <p
                  class="resend_code text-center"
                  @click="resendCode(60 * 2)"
                  v-if="!timerEnded && !loadingResend"
                  style="
                    color: rgb(255 168 0);
                    border-bottom: 1px dashed rgb(255 65 65);
                    display: inline-block;
                    cursor: pointer;
                    margin-right: 5px;
                  "
                >
                  ارسال مجدد کد تایید
                </p>
                <p
                  v-if="loadingResend"
                  style="color: rgb(255 168 0); font-size: 14px"
                >
                  در حال ارسال کد تایید...
                </p>
              </div>
              <div class="flex p-2 mr-3 mt-2 h-30px justify-start items-center">
                <span class="text-xs text-white"
                  >درصورتی که شماره نادرست است</span
                >
                <a @click="changePhone()" style="color:rgb(255 168 0)" class="mr-2 text-xs" href="javascript:void(0)"
                  >تغییر دهید</a
                >
              </div>

        <div>
          <button
            v-if="loader == false"
            type="submit"
            class="flex w-full justify-center rounded-md bg-nr px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
          >
            ورود به حساب کاربری
          </button>
          <button
            v-if="loader == true"
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
        حساب کاربری دارید ؟
        <nuxt-link
          to="/user/login"
          class="font-semibold leading-6 text-nr hover:text-orange-500"
          >وارد شوید</nuxt-link
        >
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Receive",
  layout: "receive",
  middleware: "guest",
  async mounted() {
    this.timerEnded = await this.$cookies.get("timerState");

    if (!this.$cookies.get("register_data") || !this.$cookies.get("_d")) {
      this.$cookies.remove("seconds");
      this.$cookies.remove("_d");
      this.$cookies.remove("minutes");
      this.$router.push("/user/login");
    }

    let registerData = this.$cookies.get("register_data");
    this.data.phone = registerData.phone;
    this.data.name = registerData.name;
    this.data.action = registerData.action;
    this.data._d = this.$cookies.get("_d");

    if (this.timerEnded == true) {
      this.sec = this.$cookies.get("seconds");
      this.min = this.$cookies.get("minutes");

      if (parseInt(parseInt(this.min) * parseInt(this.sec))) {
        this.oneMinutes =
          parseInt(parseInt(this.min) * 60) + parseInt(this.sec);
      } else if (
        parseInt(parseInt(this.min) * parseInt(this.sec)) == 0 &&
        (this.sec != 0 || this.min != 0)
      ) {
        this.oneMinutes =
          parseInt(parseInt(this.min) * 60) + parseInt(this.sec);
      } else if (this.sec == null && this.min == null) {
        this.oneMinutes = 60 * 2;
      }
      this.startTimer(this.oneMinutes);
    }
  },
  data() {
    return {
      errors: {},
      loader: false,
      data: {
        name: "",
        code: "",
        phone: "",
        _d: "",
        action: "",
      },
      sec: null,
      min: null,
      oneMinutes: null,
      minutes: "",
      seconds: "",
      timerEnded: false,
      loadingResend: false,
    };
  },
  methods: {
    async sendCodeValidate() {
      if (this.codeValidate(this.data.code)) {
        this.loader = true;
        this.register();
      }
    },
    async register() {
      if (!this.$cookies.get("_d")) {
        this.loader = false;
        this.$swal.fire("Expired", "متاسفانه کد ارسال شده منقضی شده است");
        return false;
      }
      const registerAction = await this.$store.dispatch(
        "userRegister",
        this.data
      );
      // console.log(registerAction);
      if (registerAction) {
        if (registerAction.notValid) {
          this.loader = false;
          this.$swal.fire("notValid", registerAction.notValid);
        }

        if (registerAction.data) {
          if (
            registerAction.data.status == 0 &&
            registerAction.data.message == "notFound"
          ) {
            this.loader = false;
            this.$swal.fire(
              "NotFound",
              "متاسفانه کاربری با این شماره همراه در سیستم یافت نشد"
            );
            this.clearForm();
          }

          if (registerAction.data.response == "success") {
            this.loader = false;
            const token = registerAction.data.access_token;
            this.$cookies.set("__t", token, {
              maxAge: 60 * 60,
            });

            await this.$store.dispatch("setToken", token);
            this.timerEnded = false;
            // this.$store.dispatch('sendWellcomeMessage' , this.data.phone)
            this.$store.dispatch("sendWellcomeMessage", { payload: token });
            return this.$router.history.replace("/");
          }
        }
      }
    },
    clearForm() {
      this.data.code = "";
    },
    fixNumbers(code) {
      if (typeof code === "string") {
        for (var i = 0; i < 10; i++) {
          code = code
            .replace(this.$store.state.persianNumbers[i], i)
            .replace(this.$store.state.arabicNumbers[i], i);
        }
      }
      return code;
    },
    codeValidate(code) {
      code = this.fixNumbers(code);
      if (code != "") {
        if (code.length == 4) {
          this.errors = {};
          return true;
        } else {
          this.errors = { code: ["!کد وارد شده معتبر نمیباشد"] };
          return false;
        }
      } else {
        this.errors = { code: ["!این فیلد الزامی میباشد"] };
        return false;
      }
    },
    startTimer(duration) {
      let timer = duration;
      let setTimer = setInterval(() => {
        this.minutes = parseInt(timer / 60, 10);
        this.seconds = parseInt(timer % 60, 10);
        this.minutes = this.minutes < 10 ? "0" + this.minutes : this.minutes;
        this.seconds = this.seconds < 10 ? "0" + this.seconds : this.seconds;
        if (--timer < 0 || !this.timerEnded) {
          this.$cookies.remove("seconds");
          this.$cookies.remove("minutes");
          this.data._d = "";
          this.$cookies.remove("_d");
          clearInterval(setTimer);
          this.$cookies.set("timerState", "false");
          this.timerEnded = false;
        } else {
          this.$cookies.set("seconds", this.seconds);
          this.$cookies.set("minutes", this.minutes);
        }
      }, 1000);
    },
    async resendCode(duration) {
      this.loadingResend = true;
      await this.$store.dispatch("sendOTP", {
        phone: this.data.phone,
        status: true,
      });
      this.loadingResend = false;
      this.$cookies.set("timerState", "true");
      this.timerEnded = "true";
      this.startTimer(duration);
    },
    async changePhone() {
      this.$cookies.remove("seconds");
      this.$cookies.remove("minutes");
      this.$cookies.remove("_d");
      this.$cookies.set("timerState", "false");
      this.timerEnded = false;
      if (this.data.action == "login") {
        this.$router.push("/user/login");
        return;
      }
      this.$router.push("/user/register");
    },
  },
};
</script>

<style scoped>
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

.time_container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.time_container span{
  color: rgb(255 168 0);
}
</style>

