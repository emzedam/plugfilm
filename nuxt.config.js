const axios = require('axios')
export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'پلاگ فیلم : تماشای آنلاین فیلم ها',
    htmlAttrs: {
      lang: "fa",
      dir: "rtl"
    },
    bodyAttrs: {
      class: ["font-fa" , "bg-primary"]
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' },
      { name: 'theme-color', content: '#1d1c22' },
      { name: 'description', content: '' },
      { name: 'msapplication-navbutton-color', content: '#1d1c22' },
      { name: 'apple-mobile-web-app-status-bar-style', content: '#1d1c22' },
      { name: 'keywords', content: '' },
      { property: 'og:title', content: '' },
      { property: 'og:description', content: '' },
      { property: 'og:type', content: 'website' },
      { property: 'og:site_name', content: 'plugfilm' },
      { property: 'og:url', content: 'https://www.plugfilm.ir/' },
      { property: 'og:locale', content: 'fa_IR' },
      { property: 'og:image', content: '' },
      { property: 'og:image:width', content: '1200' },
      { property: 'og:image:height', content: '630' },
      { property: 'fb:app_id', content: '2511830625759784' },
      { name: 'twitter:card', content: 'summary_large_image' },
      { name: 'twitter:site', content: 'plugfilm' },
      { property: 'twitter:title', content: '' },
      { property: 'twitter:description', content: '' },
      { property: 'twitter:image', content: '' },
      { property: 'twitter:image:width', content: '1200' },
      { property: 'twitter:image:height', content: '630' },
      { name: 'msapplication-TileColor', content: '#da532c' },
      { property: 'msapplication-TileColor', content: '/ms-icon-144x144.png' }
    ],
    link: [
      { rel: 'apple-touch-icon', sizes: '180x180', href: '/Images/Logo/logo-big-plugfilm-2.png' },
      { rel: 'icon', sizes: '32x32', type: 'image/svg-xml', href: '/Images/Logo/logo-big-plugfilm-2.png' },
      { rel: 'icon', sizes: '16x16', type: 'image/svg-xml', href: '/Images/Logo/logo-big-plugfilm-2.png' },
      { rel: 'icon', sizes: '192x192', href: '/Images/Logo/logo-big-plugfilm-2.png' },
      // { rel: 'manifest', href: '/Images/favicons/site.webmanifest' },
      { rel: 'mask-icon', href: '/Images/Logo/logo-big-plugfilm-2.png' , color: "#5bbad5" }
    ]
  },

  server: {
    port: 4200
  },

  router: { middleware: ['clearRoutes'] },

  loading: {
    color: '#ee9f07',
    height: '2px',
    duration: 2000
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    '@/assets/css/main.css',
    '@/assets/fonts/icons/icons.css',
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '~/plugins/slug.js',
    '~/plugins/persianSlug.js',
    '~/plugins/player.js',
    '~/plugins/mp4player.js'
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    '@nuxt/postcss8',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    'cookie-universal-nuxt',
    // sweet alert
    'nuxt-sweetalert2',
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    // https://go.nuxtjs.dev/content
    '@nuxt/content',
    ,
    ['nuxt-lazy-load', {
        // These are the default values
        images: true,
        videos: true,
        audios: true,
        // Default image must be in the static folder
        defaultImage: '',
        // To remove class set value to false
        loadingClass: 'isLoading',
        loadedClass: 'isLoaded',
        appendClass: 'lazyLoad',
    }],
    '@nuxtjs/sitemap'
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: 'https://api.plugfilm.ir',
    timeout: 120000
  },

  sitemap: {
    exclude: [
      '/user/**',
      '/category',
      '/contact',
      '/favorite',
      '/purchase/**',
      '/purchase',
      '/support',
      '/update',
      '/content'
    ],
    routes: async () => {
      const slugGenerat = (text) => {
        return text
            .toString()
            .normalize('NFKD')
            .toLowerCase()
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-');
      }
      const { data } = await axios.get('https://api.plugfilm.ir/api/contents/get')
      return data.content.map((movie) => ({
        title: movie.FaName,
        url: `/${slugGenerat(movie.EnName)}-${movie.id}`,
        changefreq: 'daily',
        priority: 1,
        lastmod: new Date()
      }))
    }
  },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      name: 'پلاگ فیلم : تماشای آنلاین فیلم ها',
      lang: 'fa',
      useWebmanifestExtension: false
    },
    icon: {
      source: '/Images/Logo/logo-big-plugfilm-2.png'
    },
    fileName: 'logo-big-plugfilm-2.png',
    sizes: 64,
    targetDir: 'Logo'
  },

  // Content module configuration: https://go.nuxtjs.dev/config-content
  content: {},

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    extend(config) {
      config.performance.hints = false
    },
    postcss: {
      plugins: {
        tailwindcss: {},
        autoprefixer: {},
      },
    }
  },
}
