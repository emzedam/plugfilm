export default (context) => {
    if (context.store.state.authUser != null) {
        context.redirect('/');
    }
}
