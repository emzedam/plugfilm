<template>
    <div>
        <div class="streamModal" ref="streamModal">
            <span class="closeStream" @click="closeStream()">&times;</span>
            <!-- <div class="hamrahlAd" ref="inranselAd" v-if="is_white == true">
                هزینه مصرف اینترنت به اضافه هزینه اشتراک معادل با هزینه اینترنت تمام بها
                می باشد
            </div> -->
            <div id="episodePlayer"></div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'WatchSessions',
    props: {
        playepisode: {
            type: Boolean,
            required: true
        }
    },
    watch: {
        playepisode: function (value) {
            let timouteShow
            let timouteHide
            if (value == true) {
                // this.$JWEPlayer(this.episodeStream);
                this.$refs.streamModal.classList.remove("hide");
                this.$refs.streamModal.classList.add("show");

                // if(this.is_white == true){
                //     timouteShow = setTimeout(() => {
                //         this.$refs.inranselAd.classList.remove("hide");
                //         this.$refs.inranselAd.classList.add("show");
                //     }, 4000);

                //     timouteHide = setTimeout(() => {
                //         this.$refs.inranselAd.classList.remove("show");
                //         this.$refs.inranselAd.classList.add("hide");
                //     }, 10000);
                // }

            } else {
                this.$refs.streamModal.classList.remove("show")
                this.$refs.streamModal.classList.add("hide")

                // if(this.is_white == true){
                //     this.$refs.inranselAd.classList.remove("show")
                //     this.$refs.inranselAd.classList.add("hide")
                // }
            }
        }
    },
    methods: {
        closeStream() {
            this.$refs.streamModal.classList.remove('show')
            this.$refs.streamModal.classList.add('hide')
            this.$nuxt.$emit('unsetEpisodeModalData')
            this.$JWEPlayer().remove()
        },
    },
    computed: {
        ...mapGetters({
            is_white: 'get_white_status'
        })
    }
}
</script>

<style scoped>
.streamModal {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 100px;
    right: 0;
    left: 0;
    bottom: 0;
    background-color: rgb(34, 35, 45);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: .2s all ease-in-out;
}

.streamModal.show {
    animation-name: showStream;
    animation-duration: .3s;
    animation-fill-mode: forwards;
    animation-timing-function: ease-in-out;
}

.streamModal.hide {
    animation-name: hideStream;
    animation-duration: .3s;
    animation-fill-mode: forwards;
    animation-timing-function: ease-in-out;
}

@keyframes showStream {
    0% {
        opacity: 0;
        visibility: hidden;
        top: 100px;
    }

    100% {
        opacity: 1;
        visibility: visible;
        top: 0;
    }
}

@keyframes hideStream {
    0% {
        opacity: 1;
        visibility: visible;
        top: 0;
    }

    100% {
        opacity: 0;
        visibility: hidden;
        top: 100px;
    }
}

.closeStream {
    position: absolute;
    color: #ee9f07;
    top: 15px;
    left: 25px;
    width: 30px;
    height: 35px;
    z-index: 100000;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    font-size: 54px;
    cursor: pointer;
}

.hamrahlAd {
    position: absolute;
    top: -28px;
    width: 92%;
    left: 50%;
    text-align: center;
    transform: translate(-50%, -50%);
    background-color: #ee9f07;
    color: #333;
    font-weight: bold;
    padding: 10px;
    padding-bottom: 14px;
    border-radius: 10px;
    z-index: 100000;
    opacity: 0;
    visibility: hidden;
}

@media (max-width: 600px) {
    .hamrahlAd {
        width: 59% !important;
        font-size: 11px !important;
        margin-top: 12px !important;
    }
}

.hamrahlAd.show {
    animation-name: iranAdShow;
    animation-duration: .3s;
    animation-fill-mode: forwards;
    animation-timing-function: ease-in-out;
}

.hamrahlAd.hide {
    animation-name: iranAdHide;
    animation-duration: .3s;
    animation-fill-mode: forwards;
    animation-timing-function: ease-in-out;
}

@keyframes iranAdShow {
    0% {
        opacity: 0;
        visibility: hidden;
        top: -28px;
    }

    100% {
        opacity: 1;
        visibility: visible;
        top: 28px;
    }
}

@keyframes iranAdHide {
    0% {
        opacity: 1;
        visibility: visible;
        top: 28px;
    }

    100% {
        opacity: 0;
        visibility: hidden;
        top: -28px;
    }
}
</style>
