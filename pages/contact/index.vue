<template>
  <!-- component -->
  <div
    class="relative flex items-top justify-center min-h-screen bg-primary sm:items-center sm:pt-0"
  >
    <div
      class="absolute z-0 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none"
    >
      <div class="w-[108rem] flex-none flex justify-end">
        <img src="/bg.png" class="w-[90rem] flex-none max-w-none" />
      </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
      <div
        class="mx-auto w-full sm:text-center bg-secondary/30 p-4 border-gray-700 border rounded-lg"
      >
        <h2 class="text-xl tracking-tight text-nr">تماس با ما</h2>
      </div>
      <div class="mt-8 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">
          <div class="col-span-1 md:col-span-2 p-6 mr-2 bg-secondary darker:bg-gray-800 sm:rounded-lg">
            <h1 class="text-xl text-gray-100 darker:text-white tracking-tight">
              تماس با ما
            </h1>
            <p
              class="text-normal text-lg sm:text-sm font-medium text-gray-200 darker:text-gray-400 mt-2"
            >
              جهت ارتباط با ما لطفا با اطلاعات تماس زیر در ارتباط باشید
            </p>

            <div
              class="flex items-center mt-8 text-gray-200 darker:text-gray-400"
            >
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                viewBox="0 0 24 24"
                class="w-8 h-8 text-nr"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                />
              </svg>
              <div class="mr-4 text-sm tracking-wide">ﺗﻬﺮﺍﻥ، ﻣﺤﻠﻪ ﺳﻌﺎﺩﺕ ﺁﺑﺎﺩ ، ﺧﻴﺎﺑﺎﻥ ﻋﻼﻣﻪ ﻃﺒﺎﻃﺒﺎﺋﻲ ﺷﻤﺎﻟﻲ ، ﺧﻴﺎﺑﺎﻥ ﺷﺎﻧﺰﺩﻫﻢ ﺷﺮﻗﻲ ، پﻼﻙ۳۸ </div>
            </div>

            <div class="flex items-center mt-4 text-gray-200 darker:text-gray-400">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-nr">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <div class="mr-4 text-sm tracking-wide  w-40">
                  02122083548
                </div>
            </div>
            
            <div
              class="flex items-center mt-2 text-gray-200 darker:text-gray-400"
            >
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                viewBox="0 0 24 24"
                class="w-8 h-8 text-nr"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              <div class="mr-4 text-sm tracking-wide w-40">
                info@plugfilm.org
              </div>
            </div>
          </div>

          <form class="p-6 flex flex-col justify-center text-sm hidden">
            <div class="flex flex-col">
              <label for="name" class="hidden">نام</label>
              <input
                type="name"
                name="name"
                id="name"
                placeholder="نام و نام خانوادگی"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-secondary darker:bg-gray-800 border border-gray-700 darker:border-gray-700 text-gray-800 focus:border-nr focus:outline-none"
              />
            </div>

            <div class="flex flex-col mt-2">
              <label for="email" class="hidden">ایمیل</label>
              <input
                type="email"
                name="email"
                id="email"
                placeholder="ایمیل"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-secondary darker:bg-gray-800 border border-gray-700 darker:border-gray-700 text-gray-800 focus:border-nr focus:outline-none"
              />
            </div>

            <div class="flex flex-col mt-2">
              <label for="tel" class="hidden">شماره موبایل</label>
              <input
                type="tel"
                name="tel"
                id="tel"
                placeholder="شماره موبایل"
                class="text-right w-100 mt-2 py-3 px-3 rounded-lg bg-secondary darker:bg-gray-800 border border-gray-700 darker:border-gray-700 text-gray-800 focus:border-nr focus:outline-none"
              />
            </div>

            <button
              type="submit"
              class="md:w-32 bg-nr hover:bg-blue-darker text-white py-3 px-6 rounded-lg mt-3 hover:bg-nr transition ease-in-out duration-300"
            >
              ارسال
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


export default {
  name: "IndexPage",
  layout: "home",
  middleware: "init",
}
</script>
