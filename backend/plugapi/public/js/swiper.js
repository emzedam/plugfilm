let darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)')
updateMode()
darkModeMediaQuery.addEventListener('change', updateModeWithoutTransitions)
window.addEventListener('storage', updateModeWithoutTransitions)

function updateMode() {
  let isSystemDarkMode = darkModeMediaQuery.matches
  let isDarkMode = window.localStorage.isDarkMode === 'true' || (!('isDarkMode' in window.localStorage) && isSystemDarkMode)

  if (isDarkMode) {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }

  if (isDarkMode === isSystemDarkMode) {
    delete window.localStorage.isDarkMode
  }

}



function disableTransitionsTemporarily() {
  document.documentElement.classList.add('[&_*]:!transition-none')
  window.setTimeout(() => {
    document.documentElement.classList.remove('[&_*]:!transition-none')
  }, 0)
}

function updateModeWithoutTransitions() {
  disableTransitionsTemporarily()
  updateMode()
}




var swiper1 = new Swiper(".Binto1", {
  direction: "vertical",
  slidesPerView: 3,
  centeredSlides: true,
  loop:true,
  spaceBetween: 30,
  mousewheel: true,
  autoHeight:true,
});



var swiper2 = new Swiper(".Binto2", {
    autoHeight:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    keyboard: true,
  });

  var swiper3 = new Swiper(".movie-list", {
    autoHeight:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    spaceBetween: 10,

    breakpoints: {
                        3440: {
                slidesPerView: 10,
            },
            1199: {
                slidesPerView: 5,
            },
            991: {
                slidesPerView:4,
            },
            600: {
                slidesPerView: 5,
                grabCursor: true,
            },
            412: {
                slidesPerView: 3,
                grabCursor: true,
            },

            375: {
                slidesPerView: 3,
                grabCursor: true,
            },
            360: {
                slidesPerView: 3,
                grabCursor: true,
            },
            344: {
                slidesPerView: 3,
                grabCursor: true,
            },
        },

    keyboard: true,
  });



  var swiper4 = new Swiper(".episod", {
    autoHeight:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    spaceBetween: 10,

    breakpoints: {
            3440: {
                slidesPerView: 10,
            },
            1199: {
                slidesPerView: 5,
            },
            991: {
                slidesPerView:4,
            },
            600: {
                slidesPerView: 5,
                grabCursor: true,
            },
            412: {
                slidesPerView: 3,
                grabCursor: true,
            },

            375: {
                slidesPerView: 3,
                grabCursor: true,
            },
            360: {
                slidesPerView: 3,
                grabCursor: true,
            },
            344: {
                slidesPerView: 3,
                grabCursor: true,
            },
        },

    keyboard: true,
  });