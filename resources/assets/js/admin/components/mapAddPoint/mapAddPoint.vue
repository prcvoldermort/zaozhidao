<template>
    <div class="mapAddPoint">
        <div id="bMap">

        </div>
        <div class="operationPanel">
            <button type="button" @click="getFinalOverlayResultArray">提交绘制结果</button>
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
                // 项目点一个项目只有一个Marker的经纬度，markerResult只能有一个Object
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
                drawingManager: null,
                projectPoint: null
            }
        },
        created () {

        },
        mounted () {
            this.mapInit();
        },
        watch: {
            projectPoint: function (newProjectPoint) {
                this.$emit('tellFatherProjectPoint',newProjectPoint);
            }
        },
        methods: {
            mapInit () {
                var that = this;
                this.map = new BMap.Map("bMap");
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
                        drawingTypes: [

                        ]
                    },
                    polygonOptions: this.styleOptions,
                    rectangleOptions: this.styleOptions
                });

                // 添加鼠标绘制工具监听事件，用于获取绘制结果
                this.drawingManager.addEventListener('overlaycomplete',function (e) {
                    if (that.markerResult.length === 0){
                        // markerResult数组没有对象，则把新绘制的marker添加进去
                        that.markerResult.push(e.overlay);
                    }else {
                        // markerResult数组已经有对象了，则清除数组内容，清除地图上已有的overlays，然后再把新绘制的marker添加进去
                        that.markerResult = [];
                        that.map.clearOverlays();
                        that.map.addOverlay(e.overlay);
                        that.markerResult.push(e.overlay);
                    }
                });
            },
            getFinalOverlayResultArray () {
                var that = this;
                this.markerResult.forEach(function (e) {
                    that.projectPoint = new BMap.Point(e.getPosition().lng, e.getPosition().lat);
                });
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    #bMap {
        width: 100%;
        height: 300px;
    }
</style>