export default async ({app, $axios, store , router}) => {
    if(app.$cookies.get('search') != undefined){
        const result = await $axios.post('/api/contents/search', { search: app.$cookies.get('search') });
        await store.commit('set_search_result', result.data)
    }else{
        return app.router.push('/');
    }
}
