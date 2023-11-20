export default ({ app }, inject) => {
    const PersianSlugGenerator = function(titleStr) {
        titleStr = titleStr.replace(/^\s+|\s+$/g, '');
        titleStr = titleStr.toLowerCase();
        titleStr = titleStr.replace(/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        return titleStr;
    }
    inject('PersianSlugGenerator', PersianSlugGenerator)
}
