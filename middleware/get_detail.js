export default async ({ route , store })=>{
    const params = route.params.slug;
    const split_params = params.split('-')
    const param_id = split_params[split_params.length-1]
    const is_special = split_params[0] == "special" ? 'special' : 'nospecial'

    const do_fetch = await store.dispatch('get_detail_movie' , { id: param_id , is_special: is_special })
    const do_media = await store.dispatch('get_media_movie' , { id: param_id , is_special: is_special })
}
