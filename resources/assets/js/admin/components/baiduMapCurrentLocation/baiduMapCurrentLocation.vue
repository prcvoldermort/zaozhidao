<template>
    <div>
        <div id="bMap">

        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                map: null,
                point: new BMap.Point(102,40),
                geolocation: new BMap.Geolocation()
            }
        },
        mounted () {
            this.mapInit();
        },
        methods: {
            mapInit () {
                var that = this;
                this.map = new BMap.Map("bMap");
                this.map.centerAndZoom(new BMap.Point(102,40),12);
                var location= new BMap.Geolocation().getCurrentPosition(function (r) {
                    if (this.getStatus() === BMAP_STATUS_SUCCESS) {
                        var mk = new BMap.Marker(r.point);
                        that.map.addOverlay(mk);
                        that.map.panTo(r.point);
                        alert('您的位置：'+r.point.lng+','+r.point.lat);
                    }else {
                        alert('failed'+this.getStatus());
                    }
                },{
                    enableHighAccuracy: true
                });
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    #bMap {
        width: 100%;
        height: 700px;
    }
</style>