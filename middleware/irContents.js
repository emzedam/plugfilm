export default async ({ $axios , store }) => {
    const randomInt = Math.floor(1 + Math.random() * 179)
    
    // get irani
    const get_contents = await $axios.post('/api/contents/get_irani' , { 
        type: 'movies',
        skip: randomInt,
        limit: 12
    })
    store.commit('set_iran_movies' , get_contents.data.irMovie)

    // get animations 
    store.commit('set_animation_movies' , get_contents.data.animations)

    

    const get_seri_contents = await $axios.post('/api/contents/get_irani' , { 
        type: 'series'
    })
    store.commit('set_iran_series' , get_seri_contents.data)

}
