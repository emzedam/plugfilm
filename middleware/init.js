export default async ({ $axios , store }) => {
    store.commit('reset_loader' , true)
    const randomInt  =  Math.floor(1 + Math.random() * 50)
    const randomSeri = Math.floor(1 + Math.random() * 40)
    
    const get_contents = await $axios.post('/api/contents/get_limit' , { 
        skip: randomInt,
        skipSeries: randomSeri,
        limit: 200
    })


// console.log(get_contents.data);
    if(get_contents.data){

        // store.commit('set_content' , get_contents.data.content)
        store.commit('set_movies_content' , get_contents.data.content.movies)
        store.commit('set_serials_content' , get_contents.data.content.series)
        store.commit('set_newers_content' , get_contents.data.content.newers)
        store.commit('set_animations_content' , get_contents.data.content.animations)
        store.commit('set_doubleha_content' , get_contents.data.content.doubleha)
        store.commit('set_fears_content' , get_contents.data.content.fears)
        store.commit('set_imdbs_content' , get_contents.data.content.imdbs)
        store.commit('set_fantezi_content' , get_contents.data.content.fantezi)

        // set Categories
        store.commit('set_categories' , get_contents.data.categories)

        // set serials
        store.commit('set_serials' , get_contents.data.serials)

    }
}
