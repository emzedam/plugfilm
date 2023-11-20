export default (context) => {
    if (context.route.path != '/user/receive') {
        context.$cookies.remove('seconds')
        context.$cookies.remove('minutes')
        context.$cookies.remove('_d')

        context.$cookies.remove('timerState')
        context.$cookies.remove('register_data')
    }
}
