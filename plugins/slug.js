export default ({ app }, inject) => {
    const slugGenerator = function(text) {
        return text
            .toString()
            .normalize('NFKD')
            .toLowerCase()
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-');
    }
    inject('slugGenerator', slugGenerator)
}