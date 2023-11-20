export default async ({$axios , store})=>{
    const getList = await $axios.post('/api/purchase/get')
    store.commit('set_purchase', getList.data)
}
