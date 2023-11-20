<template>
  <section
    v-if="sliderMovie != null"
    ref="swiper"
    class="swiper main-slider lg:h-[800px] h-screen lg:max-w-full shadow-md bg-primary mb-8 relative overflow-hidden"
  >
    <div class="z-20 swiper-wrapper relative">

      <nuxt-link
        to="/once-upon-a-studio-1758"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/disney_s_once_upon_a_studio__by_lionadventuresart_dfznotv-fullview copy.jpg"
          title="روزی روزگاری در استودیو"
          alt="روزی روزگاری در استودیو"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">روزی روزگاری در استودیو</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              بعد از اینکه همه کارمندان استودیو بعد از یک روز کاری معمولی، محل کارشان را ترک می‌کنند، میکی و مینی ماوس از عکس‌های روی دیوار بیرون آمده و تصمیم می‌گیرند تمام شخصیت‌ها را از سرتاسر استودیو برای یک عکس دسته جمعی به مناسبت صدمین سالگردشان، دور هم جمع کنند و…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <nuxt-link
        to="/in-the-fire-1756"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/In-the-Fire-1 copy.jpg"
          title="در آتش"
          alt="در آتش"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">در آتش</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              یک خانم دکتر برای مراقبت از پسربچه پریشان حالی که توانایی های عجیب دارد به مزرعه دورافتاده ای می رود. کشیش منطقه معتقد است شیطان این پسربچه را تسخیر کرده و با آمدن پزشک نزاعی میان آن ها در می گیرد.
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>
      
      
      <nuxt-link
        to="/expend4bles-1753"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/Expend4bles Horizontal copy.jpg"
          title="بی مصرف ها ۴"
          alt="بی مصرف ها ۴"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">بی مصرف ها ۴</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              گروه بی‌مصرف‌ها ماموریت جدیدی را آغاز می‌کنند تا جلوی یک سازمان تروریستی که کلاهک‌های هسته‌ای را قاچاق می‌کند، بگیرند، اما شکست این ماموریت منجر به آغاز یک جنگ هسته‌ای میان روسیه و ایالات متحده میشود و…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <nuxt-link
        to="/mission-impossible-dead-reckoning-part-one-1746"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/mi7-ff-262rc3 copy.jpg"
          title="ماموریت غیرممکن ۷ (حساب مرده بخش اول)"
          alt="ماموریت غیرممکن ۷ (حساب مرده بخش اول)"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">ماموریت غیرممکن ۷ (حساب مرده بخش اول)</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              ایتن هانت از طرف آی‌‌ام‌‌‌‌اف ماموریت پیدا می‌‌کند تا نگذارد یک فناوری مرموز به نام «انتیتی» که یک هوش مصنوعی قدرتمند است به دست افراد نادرست بیفتد. او در این راه با دشمنانی مواجه می‌‌شود که انتظار آن را نداشته است…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      
      <nuxt-link
        to="/the-hill-1733"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/hill.jpg"
          title="هیل"
          alt="هیل"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">هیل</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان واقعی زندگی ریکی هیل را به تصویر می کشد که بر موانع جسمی خود غلبه کرد تا رویای بازی در لیگ های اصلی بیسبال را به واقعیت بدل کند
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <nuxt-link
        to="/concrete-utopia-1734"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/conceret utopia.jpg"
          title="آرمان شهر بتنی"
          alt="آرمان شهر بتنی"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">آرمان شهر بتنی</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              در دنیایی که شهر سئول پس از وقوع زلزله‌ای نهایی به خاک فرو رفته و تنها ساختمان باقیمانده به نام “هوانگ گونگ” است، بازماندگان در تلاش هستند تا به این ساختمان برسند. یونگ تاک (با بازی لی بیونگ هون) به عنوان رهبر موقت ساکنان “هوانگ گونگ” می‌آید و سعی دارد از ساکنان در برابر تهدیدهایی که از جانب افراد بیگانه برای محافظت از این مکان پیش می‌آید، محافظت کند. اما…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/reptile-1736"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/Untitled-1 (1).jpg"
          title="خزنده"
          alt="خزنده"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">خزنده</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان واقعی زندگی ریکی هیل را به تصویر می کشد که بر موانع جسمی خود غلبه کرد تا رویای بازی در لیگ های اصلی بیسبال را به واقعیت بدل کند
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <nuxt-link
        to="/sound-of-freedom-1737"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/3.jpg"
          title="صدای آزادی"
          alt="صدای آزادی"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">صدای آزادی</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              در مورد یک مامور سابق دولت است که ماموریت خطرناکی را برای نجات صدها کودک از دست قاچاقچیان آغاز می‌کند و…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <nuxt-link
        to="/flora-and-son-1738"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/4.jpg"
          title="فلورا و پسرش"
          alt="فلورا و پسرش"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">فلورا و پسرش</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان مادری مجرد به‌نام فلورا که رابطه‌اش با پسرش مکس شکرآب است و دنبال سرگرمی‌ای برای او است. روزی یک گیتار را از یک آشغال‌دونی پیدا می‌کند و متوجه می‌شود که ممکن است راه حل مشکل‌شان این گیتار باشد.
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>
      
      
      <nuxt-link
        to="/the-swan-1727"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/swan.jpg"
          title="قو"
          alt="قو"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">قو</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              در مورد پسری کوچک و باهوش است که بی‌رحمانه توسط دو قلدر بزرگ و احمق مورد آزار و اذیت قرار می‌گیرد…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/war-of-the-worlds-the-attack-1725"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/Untitled-1.jpg"
          title="جنگ دنیاها: حمله"
          alt="جنگ دنیاها: حمله"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">جنگ دنیاها: حمله</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان ماجراجویی های سه ستاره شناس و تلاش آن ها برای جان به در بردن از حمله مرگبار مریخی ها است.
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/gran-turismo-1721"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/Gran Turismo.jpg"
          title="گرن توریسمو "
          alt=" گرن توریسمو"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">گرن توریسمو</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              مهارت‌های بالای یک گیمر در مجموعه بازی‌های ویدیویی گرن توریسمو، شانس تبدیل شدن او به یک راننده واقعی اتومبیل‌های مسابقه‌ای حرفه‌ای را برایش به ارمغان می‌آورد و…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <nuxt-link
        to="/no-one-will-save-you-1722"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/No One Will Save You.jpg"
          title=" هیچ‌ کس تو را نجات نخواهد داد "
          alt="  هیچ‌ کس تو را نجات نخواهد داد"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">هیچ‌ کس تو را نجات نخواهد داد </h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              برین، یک زن که در خانه‌ای دورافتاده از دوران کودکی‌اش زندگی می‌کند، به طور ناگهانی با حمله‌ی اشخاصی غیرمعمول به خانه‌اش روبرو می‌شود. این حمله اتفاقاتی ناخواسته و نامعمول را برای او به همراه دارد و به نظر می‌آید که هیچ کس او را از این وضعیت نجات نخواهد داد. از اینجا به بعد، داستان به یک تازه‌وارد در دنیای مخوف و ناشناخته پیچیده می‌شود و ما شاهد ماجراها و تلاش‌های برین برای بقا و پی‌گیری حقیقت پنهانی در پس پردهٔ این حمله می‌شویم.
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/nowhere-1720"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/nowhere.jpg"
          title=" هیچ کجا"
          alt=" هیچ کجا"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">  هیچ کجا </h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان فیلم درباره یک زن باردار جوان به نام میا است که با پنهان شدن در یک کانتینر دریایی در یک کشتی باری از کشوری در حال جنگ فرار می‌کند. در این میان پس از یک طوفان شدید، میا در حالی که در دریا گم شده کودک خود را به دنیا می‌آورد. حال او باید برای زنده ماندن خود و فرزندش مبارزه کند
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>
      
      
      <nuxt-link
        to="/the-retirement-plan-1719"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/The Retirement Plan.jpg"
          title="طرح بازنشستگی"
          alt="طرح بازنشستگی"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">طرح بازنشستگی</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              هنگامی که اشلی و دختر جوانش سارا گرفتار گروهی از افراد شرور شده و زندگی‌شان به خطر می‌افتد، اشلی از پدرش مت که در حال حاضر دوران بازنشستگی خود را در جزایر کیمن می‌گذراند، درخواست کمک می‌کند اما…
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>


      <!-- <nuxt-link
        to="/blue-beetle-1713"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/bluebeatles.jpg"
          title="سوسک آبی "
          alt="سوسک آبی "
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">سوسک آبی</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              جیمی یک پسر جوان است که پس از برخورد با موجودی بیگانه و آبی رنگ، قدرت های
              خارق العاده ای به دست می آورد و سرنوشتش برای همیشه تغییر می کند، اما...
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/talk-to-me-1708"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/talk to me.jpg"
          title=" با من حرف بزن "
          alt=" با من حرف بزن "
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">
              با من حرف بزن
            </h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان درباره چند دوست است با استفاده از دست یک مومیایی کهن با دنیای ارواح
              ارتباط برقرار میکنند و زمانی که زیاده روی کردند نیروهای فراطبیعی وحشتناک به
              دنیا احضار شدند....
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/retribution-1714"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/retribution.jpg"
          title=" قصاص"
          alt=" قصاص"
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">قصاص</h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              داستان در مورد یک مدیر موفق بانک به نام مت ترنر است که وقتی فرزندانش را به
              سمت مدرسه می‌برد، متوجه می‌شود بمبی توسط یک مهاجم ناشناس در ماشینش کار
              گذاشته شده است که اگر از ماشین پیاده شوند، منفجر خواهد شد. حال مت مجبور است
              در طول روز دستورات خطرناک این غریبه را اجرا کند تا خانواده‌اش را نجات دهد
              اما..
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link>

      <nuxt-link
        to="/mob-land-1690"
        class="swiper-slide relative w-full object-cover lg:h-[800px] h-screen after:absolute after:w-full after:top-0 after:z-[5] after:left-0 after:right-0 after:bottom-0 after:content-[''] after:bg-gradient-to-t after:from-secondary/90 after:via-secondary/70 after:to-secondary/40 after:h-full"
      >
        <img
          class="w-full object-cover lg:h-[800px] h-screen"
          data-src="/Images/sliderImages/Mob-Land-1.jpg"
          title="سرزمین اوباش "
          alt="سرزمین اوباش "
          v-lazy-load
        />

        <div
          class="absolute bottom-0 left-0 right-0 top-0 items-center flex text-right z-20 text-white lg:px-28 px-8 my-16"
        >
          <div class="content flex flex-col lg:space-y-6 space-y-4">
            <div
              class="age+ bg-yellow-500 text-secondary w-12 h-7 rounded-full font-en font-light text-[17px] flex items-center justify-center ltr shadow-sm"
            >
              18
            </div>
            <h1 class="lg:text-3xl text-md font-medium lg:font-extrabold">
              سرزمین اوباش
            </h1>
            <p class="w-full max-w-xl leading-7 text-sm lg:text-xl">
              در شهر کوچکی که با ویرانی های اعتیاد دست و پنجه نرم می کند، یک کلانتر محلی
              سعی می کند آرامش را حفظ کند، زمانی که یک مرد خانواده ناامید به همراه برادر
              شوهر بی پروا خود یک کارخانه قرص را دزدی می کند.
            </p>
            <button
              class="watch w-32 flex items-center text-right justify-evenly px-4 py-2 text-gray-900 bg-gradient-to-r from-nr via-nr/90 to-nr hover:via-nr/100 hover:to-nr rounded-lg transition-colors duration-300 mt-8 font-normal"
              type="button"
            >
              <IconPlay class="fill-secondary w-5" />
              <span>تماشا</span>
            </button>
          </div>
        </div>
      </nuxt-link> -->

    </div>
  </section>
</template>

<script>
import Swiper from "swiper/swiper-bundle.min";
import IconPlay from "@/components/Icons/IconPlay.vue";
export default {
  name: "HeaderSlider",
  props: {
    sliderMovie: {
      type: [Array, Object],
      required: true,
    },
  },
  data() {
    return {
      loaderFave: false,
      faveId: "",
    };
  },
  async mounted() {
    await this.$nextTick();
    new Swiper(this.$refs.swiper, {
      spaceBetween: 10,
      slidesPerView: 1,
      dir: "rtl",
      loop: false,
      navigation: { nextEl: ".next", prevEl: ".prev" },
      watchSlidesVisibility: true,
      pagination: { clickable: true },
      autoplay: {
        delay: 5000,
      },
    });
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
            text:
              "برای اضافه کردن به لیست علاقه مندی ابتدا باید وارد حساب کاربری خود شوید",
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
  },
  components: {
    IconPlay,
  },
};
</script>

<style></style>
