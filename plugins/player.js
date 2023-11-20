export default ({ app }, inject) => {
    const JWEPlayer = function(stream = '') {
        jwplayer.key = "uoW6qHjBL3KNudxKVnwa3rt5LlTakbko9e6aQ6VUyKQ=";
        var playerInstance = jwplayer("episodePlayer");
        playerInstance.setAllowFullscreen(true)
        return playerInstance.setup({
            stretching: "uniform",
            mute: "false",
            menu: "true",
            allowscriptaccess: "always",
            wmode: "opaque",
            sources: [{
                file: stream.url ? 'https://'+stream.url.split("://")[1] : "",
                type: stream.type,
                label: "360p",
                default: true,
            }],
            image: '',
            width: "100vw",
            height: "100vh",
            autostart: true,
            primary: "html5",
            aspectratio: "16:9",
            file: stream,
            abouttext: "",
            aboutlink: "http://shadfilm.ir/",
            tracks: [{
                file: "",
                label: "فارسی",
                kind: "captions",
                default: "true",
            }, ],
            captions: {
                color: "#ffb800",
                fontSize: 30,
                backgroundOpacity: 0,
            }
        });
    }
    inject('JWEPlayer', JWEPlayer)
}
