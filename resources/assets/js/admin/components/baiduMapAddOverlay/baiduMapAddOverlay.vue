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
                poi: new BMap.Point(116.307852,40.057031),
                overlays: [],
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
                myGeo: new BMap.Geocoder(),
                // GPS坐标
                x: 116.32715863448607,
                y: 39.990912172420714
            }
        },
        mounted () {
            this.mapInit();
        },
        methods: {
            mapInit () {
                var that =this;
                this.map = new BMap.Map("bMap");
                this.map.centerAndZoom(new BMap.Point(this.x,this.y),15);
                this.map.addControl(new BMap.NavigationControl());
                this.map.enableScrollWheelZoom();
                this.drawingManager = new BMapLib.DrawingManager(this.map,{
                    isOpen: false, //是否开启绘制模式
                    enableDrawingTool: true, //是否显示工具栏
                    drawingToolOptions: {
                        anchor: BMAP_ANCHOR_TOP_RIGHT,
                        offset: new BMap.Size(5,5)
                    },
                    circleOptions: {
                        strokeColor: "red",
                        fillColor: "red",
                        strokeWeight: 3,
                        strokeOpacity: 0.8,
                        fillOpacity: 0.6,
                        strokeStyle: 'solid'
                    },
                    polylineOptions: {
                        strokeColor: "red",
                        fillColor: "red",
                        strokeWeight: 3,
                        strokeOpacity: 0.8,
                        fillOpacity: 0.6,
                        strokeStyle: 'solid'
                    },
                    polygonOptions: {
                        strokeColor: "red",
                        fillColor: "red",
                        strokeWeight: 3,
                        strokeOpacity: 0.8,
                        fillOpacity: 0.6,
                        strokeStyle: 'solid'
                    },
                    rectangleOptions: {
                        strokeColor: "red",
                        fillColor: "red",
                        strokeWeight: 3,
                        strokeOpacity: 0.8,
                        fillOpacity: 0.6,
                        strokeStyle: 'solid'
                    }
                });
                //添加鼠标绘制工具监听事件，用于获取绘制结果
                this.drawingManager.addEventListener('overlaycomplete',function (e) {
                    that.overlays.push(e.overlay);
                    that.overlays.forEach(function (element) {
                        console.log(element.getPosition());
                    });
                });

                // Geocoder
                this.myGeo.getPoint("北京市海淀区上地10街",function (point) {
                    if(point) {
                        that.map.centerAndZoom(point,16);
                        that.map.addOverlay(new BMap.Marker(point));
                    }else {
                        alert("您选择地址没有解析到结果!");
                    }
                },"北京市");

                // 添加GPS坐标的marker和label
                var markergg = new BMap.Marker(new BMap.Point(this.x,this.y));
                this.map.addOverlay(markergg);
                var labelgg = new BMap.Label("未转换的GPS坐标（错误）",{
                    offset: new BMap.Size(20,-10)
                });
                markergg.setLabel(labelgg); // 添加GPS label

                // 坐标转换
                setTimeout(function () {
                    var convertor = new BMap.Convertor();
                    var pointArr = [];
                    pointArr.push(this.ggPoint);
                    convertor.translate(pointArr,1,5,function (data) {
                        if (data.status === 0) {
                            var marker = new BMap.Marker(data.points[0]);
                            that.map.addOverlay(marker);
                            var label = new BMap.Label("转换后的百度坐标（正确）",{
                                offset: new BMap.Size(20,-10)
                            });
                            marker.setLabel(label);
                        }
                    })
                })
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