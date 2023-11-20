
export const state = () => ({
    persianNumbers: [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
    arabicNumbers: [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
    authUser: null,
    activePurchase: null,
    content: null,
    categories: null,
    irMovies: null,
    irSeries: null,
    animationMovies: null,
    detail_content: null,
    init_loader: true,
    media_content: null,
    purchaseList: null,
    search_results: null,
    serials: null,
    related: null,

    newer_content: null,
    movies: null ,
    doubleha: null ,
    series: null ,
    imdbs: null ,
    fears: null ,
    fantezi: null ,
    animations: null ,

    is_white: null,
})


export const mutations = {
    reset_loader(state, data) {
        state.init_loader = true
    },
    set_content(state, data) {
        if (data.length != 0) {
            state.content = data
            state.init_loader = false
        } else {
            state.content = null
        }
    },
    set_categories(state, data) {
        if (data.length != 0)
            state.categories = data
        else
            state.categories = null
    },
    set_iran_movies(state, data) {
        if (data.length != 0)
            state.irMovies = data
        else
            state.irMovies = null
    },
    set_animation_movies(state, data) {
        if (data.length != 0)
            state.animationMovies = data
        else
            state.animationMovies = null
    },
    set_iran_series(state, data) {
        if (data.length != 0)
            state.irSeries = data
        else
            state.irSeries = null
    },
    set_serials(state, data) {
        if (data.length != 0)
            state.serials = data
        else
            state.serials = null
    },
    set_detail_content(state, data) {
        if (data.length != 0)
            state.detail_content = data
        else
            state.detail_content = null
    },
    set_related_content(state, data) {
        if (data != null)
            state.related = data
        else
            state.related = null
    },
    set_media_content(state, data) {
        if (data.length != 0)
            state.media_content = data
        else
            state.media_content = null
    },
    set_random_url_for_medias(state , cdnUrl){
        if(state.media_content != null){
            state.media_content.forEach((val , index) => {
                if(val.finalHlsUrl != ''){
                  if(cdnUrl != ''){
                    let urlSplit = val.finalHlsUrl.split('/')
                    urlSplit[2] = cdnUrl;
        
                    val.finalHlsUrl = urlSplit.join('/')
                  }
                }
        
                if(val.finalMp4Url != ''){
                  if(cdnUrl != ''){
                    let urlSplit = val.finalMp4Url.split('/')
                    urlSplit[2] = cdnUrl;
        
                    val.finalMp4Url = urlSplit.join('/')
                  }
                }
            })

            state.media_content = state.media_content
        }
    },
    set_token(state, user) {
        state.authUser = user;
    },
    clear_errors(state){
        state.errors = {}
    },
    set_auth_user(state, data) {
        state.authUser = data
    },
    set_user_purchase(state, data) {
        state.activePurchase = data
    },
    do_logout(state){
        state.authUser = null;
    },
    set_purchase(state, data) {
        if(data.data != 0)
            state.purchaseList = data
        else
            state.purchaseList = null
        
    },
    set_search_result(state , data){
        if(data != null){
            state.search_results = data;
        }else{
            state.search_results = null
        }
    },
    set_movies_content(state , data){
        if(data != null){
            state.movies = data
        }else{
            state.movies = null
        }
    },
    set_newers_content(state , data){
        if(data != null){
            state.newer_content = data
        }else{
            state.newer_content = null
        }
    },
    set_doubleha_content(state , data){
        if(data != null){
            state.doubleha = data
        }else{
            state.doubleha = null
        }
    },
    set_serials_content(state , data){
        if(data != null){
            state.series = data
        }else{
            state.series = null
        }
    },
    set_imdbs_content(state , data){
        if(data != null){
            state.imdbs = data
        }else{
            state.imdbs = null
        }
    },
    set_fears_content(state , data){
        if(data != null){
            state.fears = data
        }else{
            state.fears = null
        }
    },
    set_fantezi_content(state , data){
        if(data != null){
            state.fantezi = data
        }else{
            state.fantezi = null
        }
    },
    set_animations_content(state , data){
        if(data != null){
            state.animations = data
        }else{
            state.animations = null
        }
    },
    set_user_white(state , data){
        if(data != null){
            state.is_white = data
        }else{
            state.is_white = null
        }
    },
}





export const actions = {
    async nuxtServerInit(context , {req}) {

        // ---- start of set white list user hamrah aval --------

        // get user ip
        
        const headers = (req && req.headers) ? Object.assign({}, req.headers) : {}
        // console.log();
        // send user ip for white
        const send_for_white = await this.$axios.post('/api/users/set_white' , {userip: headers['x-forwarded-for'].split(',')[0]})
        // console.log(send_for_white.data);
        if (send_for_white.data.status == 'success') {
            context.commit('set_user_white', true)
        }else{
            context.commit('set_user_white', false)
        }
    
    

        // ---- end of set white list user hamrah aval ------------

        // set Current Auth User
        if (this.$cookies.get('__t') != undefined) {
            const authUser = await this.$axios.post('/api/users/me', {}, {
                headers: { Authorization: "Bearer " + this.$cookies.get('__t') }
            })
            if (authUser.data) {
                if (Object.keys(authUser.data).length != 0) {
                    await context.commit('set_token', authUser.data)
                    if (authUser.data.purchases.length != 0) {
                        await context.commit('set_user_purchase', authUser.data.purchases[0])
                    } else {
                        await context.commit('set_user_purchase', null)
                    }
                } else {
                    await context.commit('set_token', null)
                }
            }
        }else{
            await context.commit('set_token', null)
        }
        // set Current Auth User
    },

    async get_detail_movie(context, data) {
        const randomInt = Math.floor(1 + Math.random() * 1700)
        const sendData = await this.$axios.post('/api/contents/vcasvcd', { id: data.id , skip: randomInt , is_special: data.is_special  })
        context.commit('set_detail_content', sendData.data.detail)
        context.commit('set_related_content', sendData.data.related)
    },

    async get_media_movie(context, data) {
        const sendData = await this.$axios.post('/api/contents/get/media/' , { id: data.id , is_special: data.is_special  })
        context.commit('set_media_content', sendData.data)
        return sendData
    },

    async sendOTP(context, data) {
        if (data.status == true) {
            const sendcode = await this.$axios.post('/api/users/sendCode', { phone: data.phone })
            this.$cookies.set('_d', sendcode.data.d_)
        }


        const sendcode = await this.$axios.post('/api/users/sendCode', { phone: data.phone });

        if (sendcode.data.err) {
            return { satus: 'error' }
        }

        if (sendcode.data.status && sendcode.data.status == 200) {
            await this.$cookies.set('register_data', { action: data.action, phone: sendcode.data.phone, name: data.name });
            await this.$cookies.set('timerState', 'true');
            await this.$cookies.set('_d', sendcode.data.d_)
            return { satus: 'success' }
        }
    },

    async setToken({ commit }, token) {
        const authUser = await this.$axios.post('/api/users/me' , {} , {
            headers: { Authorization: "Bearer " + token }
        })
        if (authUser.data) {
            if (Object.keys(authUser.data).length != 0) {
                commit('set_token', authUser.data)
                if (authUser.data.purchases.length != 0) {
                    commit('set_user_purchase', authUser.data.purchases[0])
                } else {
                    commit('set_user_purchase', null)
                }
                return
            } else {
                commit('set_token', null)
            }
        }
    },

    async sendWellcomeMessage(context, data) {
        const sendMessage = await this.$axios.post('/api/users/wellcomeMessage', {}, {
            headers: { Authorization: "Bearer " + data.payload }
        })
    },

    async userRegister(context, data) {
        let registerApi;
        context.commit('clear_errors');

        const codeValidApi = await this.$axios.post('/api/users/codeValid', { code: data.code, _d: data._d })

        if (codeValidApi.data.notValid) {
            return { notValid: codeValidApi.data.notValid };
        }

        if (data.action == 'login') {
            registerApi = await this.$axios.post('/api/users/login', { phone: data.phone, code: data.code })
                // return registerApi
        } else {
            registerApi = await this.$axios.post('/api/users/register', data)
        }

        if (registerApi.data.status == 0 && registerApi.data.message == 'notFound') {
            return registerApi
        }

        if (registerApi.data.response == 'success') {
            return registerApi
        }
    },

    async doLogout({ commit }) {
        await this.$axios.post('/api/users/logout', {}, { headers: { Authorization: "Bearer " + this.$cookies.get('__t') } });
        await this.$cookies.remove('__t',{
            // this will allow you to remove a cookie
            // from a different path
            path: '/'
        })
        await commit('do_logout');
        await commit('unset_active_purchase');
        return this.$router.push('/');
    },

    async connectToBank(context, data) {
        const parameters = { id: data.purchaseid , amount: data.amount }
        const responseData = await this.$axios.post('/api/payments/connect', parameters , {
            headers: { Authorization: "Bearer " + this.$cookies.get('__t') }
        })
        return responseData;
    },

    async addToFavorite(context, id) {
        let response = await this.$axios.post('/api/users/add_fav', { id: id } , {
            headers: { Authorization: "Bearer " + this.$cookies.get('__t') }
        })
        return response
    },
    async get_special_content_details(context , id){
        let response = await this.$axios.post('/api/contents/get-detail-special-content', { id: id })
        return response.data
    },

    async get_special_media_details(context , id){
        let response = await this.$axios.post('/api/contents/get-media-special-content', { id: id })
        return response.data
    }
}





export const getters = {
    get_white_status: (state) => {
        if (state.is_white != null)
            return state.is_white
        else
            return state.is_white
    },
    get_contents: (state) => {
        if (state.content != null)
            return state.content
        else
            return state.content
    },
    get_categories: (state) => {
        if (state.categories != null)
            return state.categories
        else
            return state.categories
    },
    get_ir_movies: (state) => {
        if (state.irMovies != null)
            return state.irMovies
        else
            return state.irMovies
    },
    get_ir_series: (state) => {
        if (state.irSeries != null)
            return state.irSeries
        else
            return state.irSeries
    },
    get_detail_content: (state) => {
        if (state.detail_content != null)
            return state.detail_content
        else
            return state.detail_content
    },
    get_series: (state) => {
        if (state.series != null)
            return state.series
        else
            return state.series
    },
    get_media_content: (state) => {
        if (state.media_content != null)
            return state.media_content
        else
            return state.media_content
    },
    getAuthUser(state) {
        return state.authUser
    },
    get_purchases: (state) => {
        if (state.purchaseList != null)
            return state.purchaseList
        else
            return state.purchaseList
    },
    get_search_result: (state) => {
        if (state.search_results != null)
            return state.search_results
        else
            return state.search_results
    },
    get_related_result: (state) => {
        if (state.related != null)
            return state.related
        else
            return state.related
    },
    get_newers: (state) => {
        if (state.newer_content != null)
            return state.newer_content
        else
            return state.newer_content
    },
    get_movies: (state) => {
        if (state.movies != null)
            return state.movies
        else
            return state.movies
    },
    get_doubleha: (state) => {
        if (state.doubleha != null)
            return state.doubleha
        else
            return state.doubleha
    },
    get_fears: (state) => {
        if (state.fears != null)
            return state.fears
        else
            return state.fears
    },
    get_imdbs: (state) => {
        if (state.imdbs != null)
            return state.imdbs
        else
            return state.imdbs
    },
    get_fantezi: (state) => {
        if (state.fantezi != null)
            return state.fantezi
        else
            return state.fantezi
    },
    get_animations: (state) => {
        if (state.animations != null)
            return state.animations
        else
            return state.animations
    }

}
