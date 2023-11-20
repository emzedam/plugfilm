export default async ({$axios , store}) => {
    const get_categories = await $axios.get('/api/category/get')
    store.commit('set_categories' , get_categories.data)
}
