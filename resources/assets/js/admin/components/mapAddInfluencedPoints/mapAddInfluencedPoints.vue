<template>
    <div class="mapAddInfluencedPoints">
        <div id="bIMap">

        </div>
        <div class="operationIPanel">
            <div class="influencedPointDetailInputPanel" v-for="(item, index) in markerResult">
                <input id="pointLng" type="text" v-model="item.influencedPointLng">
                <input id="pointLat" type="text" v-model="item.influencedPointLat">
                <input id="pointDesc" type="text" v-model="item.influencedPointDesc">
                <input id="pointPopulation" type="text" v-model="item.influencedPointPopulation">
            </div>
            <button type="button" @click="IgetFinalOverlayResultArray">提交受影响点信息</button>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">

    export default {
        data () {
            return {
                map: null,
                initCoord: new BMap.Point(116.417854,39.921988),
                initZoom: 15,
                markerResult: [],
                styleOptions: {
                    strokeColor: "red",
                    fillColor: "red",
                    strokeWeight: 3,
                    strokeOpacity: 0.8,
                    fillOpacity: 0.6,
                    strokeStyle: 'solid'
                },
                // 实例化鼠标绘制工具
                drawingManager: null
            }
        },
        components: {

        },
        props: ['projectLat','projectLng'],
        watch: {
            projectLat: function () {
                this.map.centerAndZoom(new BMap.Point(this.projectLng,this.projectLat),15);
            }
        },
        created () {

        },
        mounted () {
            this.mapInit();
        },
        methods: {
            mapInit () {
                var that = this;
                this.map = new BMap.Map("bIMap");
                this.map.centerAndZoom(this.initCoord, 15);
//                this.map.enableScrollWheelZoom();
                // 实例化marker标注工具
                this.drawingManager = new BMapLib.DrawingManager(this.map, {
                    isOpen: true,
                    drawingType: BMAP_DRAWING_MARKER,
                    enableDrawingTool: true,
                    enableCalculate: false,
                    drawingToolOptions: {
                        anchor: BMAP_ANCHOR_TOP_LEFT,
                        offset: new BMap.Size(5, 5),
                        drawingTypes: []
                    },
                    polygonOptions: this.styleOptions,
                    rectangleOptions: this.styleOptions
                });

                // 添加鼠标绘制工具监听事件，用于获取绘制结果
                this.drawingManager.addEventListener('overlaycomplete', function (e) {
                    // 新建一个点的同时，增加新增点的输入框，输入受影响点的描述和受影响人口数
                    that.markerResult.push({
                        influencedPointLng: e.overlay.getPosition().lng,
                        influencedPointLat: e.overlay.getPosition().lat,
                        influencedPointDesc: null,
                        influencedPointPopulation: null
                    });
                });
            },
            IgetFinalOverlayResultArray () {
                this.$emit('tellFatherInfluencedPoint',this.markerResult);
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    #bIMap {
        width: 100%;
        height: 300px;
    }
</style>