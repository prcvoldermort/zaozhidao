<template>
    <div>
        <div id="baiduMapVueTest">

        </div>
        <div id="r-result">
            <button type="button" @click="showOver">显示</button>
            <button type="button" @click="hideOver">隐藏</button>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">

    export default {
        data () {
            return {
                map: null,
                point: null,
                top_left_control: new BMap.ScaleControl({
                    anchor: BMAP_ANCHOR_TOP_LEFT
                }),
                top_left_navigation: new BMap.NavigationControl(),
                top_right_navigation: new BMap.NavigationControl({
                    anchor: BMAP_ANCHOR_TOP_RIGHT,
                    type: BMAP_NAVIGATION_CONTROL_SMALL
                }),
                mapType1: new BMap.MapTypeControl({
                    mapTypes: [BMAP_NORMAL_MAP,BMAP_HYBRID_MAP]
                }),
                mapType2: new BMap.MapTypeControl({
                    anchor: BMAP_ANCHOR_TOP_LEFT
                }),
                overView: new BMap.OverviewMapControl(),
                overViewOpen: new BMap.OverviewMapControl({
                    isOpen: true,
                    anchor: BMAP_ANCHOR_BOTTOM_RIGHT
                }),
                navigationControl: new BMap.NavigationControl({
                    anchor: BMAP_ANCHOR_TOP_LEFT,
                    type: BMAP_NAVIGATION_CONTROL_LARGE,
                    enableGeolocation: true
                }),
                geolocationControl: new BMap.GeolocationControl(),
                ZoomControl: function () {
                    this.defaultAnchor = BMAP_ANCHOR_TOP_LEFT;
                    this.defaultOffset = new BMap.Size(10,10);
                },
                cityListControl: new BMap.CityListControl({
                    anchor: BMAP_ANCHOR_TOP_LEFT,
                    offset: new BMap.Size(10,20),
                    // 切换城市之前事件
                    onChangeBefore: function () {
                        alert('before');
                    },
                    // 切换城市之后事件
                    onChangeAfter: function () {
                        alert('after');
                    }
                }),
                // 点覆盖物
                theMarker: new BMap.Marker(new BMap.Point(116.404, 39.915)),
                // 折线覆盖物
                thePolyline: new BMap.Polyline([
                    new BMap.Point(116.399, 39.910),
                    new BMap.Point(116.405, 39.920),
                    new BMap.Point(116.425, 39.900)
                ],{
                    strokeColor: "blue",
                    strokeWeight: 2,
                    strokeOpacity: 0.5
                }),
                // 圆覆盖物
                theCircle: new BMap.Circle(new BMap.Point(116.404, 39.915), 500, {
                    strokeColor: "blue",
                    strokeWeight: 2,
                    strokeOpacity: 0.5
                    }
                ),
                // 多边形覆盖物
                thePolygon: new BMap.Polygon([
                    new BMap.Point(116.387112,39.920977),
                    new BMap.Point(116.385243,39.913063),
                    new BMap.Point(116.394226,39.917988),
                    new BMap.Point(116.401772,39.921364),
                    new BMap.Point(116.41248,39.927893)
                ],{
                    strokeColor: "blue",
                    strokeWeight: 2,
                    strokeOpacity: 0.5
                }),
                // 矩形覆盖物
                theRectangle: new BMap.Polygon([
                    new BMap.Point(116.392214, 39.918985),
                    new BMap.Point(116.41478, 39.918985),
                    new BMap.Point(116.41478, 39.911901),
                    new BMap.Point(116.392214, 39.911901)
                ],{
                    strokeColor: "blue",
                    strokeWeight: 2,
                    strokeOpacity: 0.5
                }),
                // 创建小狐狸图标
                myMarker: new BMap.Marker(new BMap.Point(116.417, 39.909),{
                    icon: new BMap.Icon("http://developer.baidu.com/map/jsdemo/img/fox.gif",new BMap.Size(300,157))
                }),
                // 文本标注对象
                theLabel: new BMap.Label("欢迎使用百度地图，这是一个简单的文本标注哦~",{
                    position: new BMap.Point(116.417854,39.921988),
                    offset: new BMap.Size(30,-30)
                }),
                theMarkerLabel: new BMap.Label("我是文字标注噢",{
                    offset: new BMap.Size(20,-10)
                }),
                data: [],
                bigAmountDataPoints: [],
                theCurve: new BMapLib.CurveLine([
                    new BMap.Point(116.432045,39.910683),
                    new BMap.Point(120.129721,30.314429),
                    new BMap.Point(121.491121,25.127053)
                ],{
                    strokeColor: "blue",
                    strokeWeight: 3,
                    strokeOpacity: 0.5
                }),
                theBoundary: new BMap.Boundary(),
                infoWindow: new BMap.InfoWindow("地址：北京市东城区王府井大街88号乐天银泰百货八层",{
                    width: 200,
                    height: 100,
                    title: "海底捞王府井店",
                    enableMessage: true,
                    message: "戳下面的链接看下地址喔~"
                }),
                sContent: "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>天安门</h4>"+
                    "<img style='float:right;margin:4px' id='imgDemo' src='http://img10.3lian.com/c1/newpic/10/30/23.jpg' width='139' height='104' title='天安门'/>"+
                    "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>天安门坐落在中国北京市中心,故宫的南侧,与天安门广场隔长安街相望,是清朝皇城的大门...</p>"+
                    "</div>"
            }
        },
        mounted () {
            this.map = new BMap.Map("baiduMapVueTest");
            this.point = new BMap.Point(116.404,39.915);
            this.openMap();
//            this.mapAddControl();
            this.mapEnableScrollWheelZoom();
//            this.setMapCenterByCityName();
//            this.panTo();
//            this.autoZoom();
//            this.getDistance();
//            this.locateWhereami();
//            this.defineZoomControl();
            this.addCityListControl();
//            this.addFoxMarker();
//            this.addOverlay();
//            this.addTextLabel();
//            this.addMarkerLabel();
//            this.addBigAmountDataPoints();
            this.addCurve();
//            this.addBoundary();
//            this.addClusterMarker();
//            this.openMarkerWindow();
            this.openRichInfoWindow();
        },
        methods: {
            openMap () {
                this.map.centerAndZoom(this.point,15);
            },
            mapAddControl () {
                this.map.addControl(new BMap.MapTypeControl);
            },
            mapEnableScrollWheelZoom () {
                this.map.enableScrollWheelZoom(true);
            },
            setMapCenterByCityName () {
                this.map.centerAndZoom("昆明",15);
            },
            panTo () {
                var that = this;
                // 2秒后地图移动到广州
                setTimeout(function () {
                    that.map.panTo(new BMap.Point(113.262232,23.154345));
                },2000);
            },
            autoZoom () {
                var that = this;
                // 2秒后放大到14级
                setTimeout(function () {
                    that.map.setZoom(14);
                },2000);
            },
            getDistance () {
                this.map.centerAndZoom('重庆',12);
                var pointA = new BMap.Point(106.486654,29.490295);
                var pointB = new BMap.Point(106.581515,29.615467);
                alert('从大渡口区到江北区的距离是：'+ (this.map.getDistance(pointA,pointB)).toFixed(2)+' 米。');
            },
            add_control () {
                this.map.addControl(this.mapType1);
                this.map.addControl(this.mapType2);
                this.map.setCurrentCity("北京");
                this.map.addControl(this.overView);
                this.map.addControl(this.overViewOpen);
            },
            delete_control () {
                this.map.removeControl(this.mapType1);
                this.map.removeControl(this.mapType2);
                this.map.removeControl(this.overView);
                this.map.removeControl(this.overViewOpen);
            },
            locateWhereami () {
                this.map.addControl(this.navigationControl);
                this.geolocationControl.addEventListener("locationSuccess",function (e) {
                    // 定位成功事件
                    var address = '';
                    address += e.addressComponent.province;
                    address += e.addressComponent.city;
                    address += e.addressComponent.district;
                    address += e.addressComponent.street;
                    address += e.addressComponent.streetNumber;
                    alert("当前定位地址为：" + address);
                });

                this.geolocationControl.addEventListener("locationError",function (e) {
                    //定位失败事件
                    alert(e.message);
                });

                this.map.addControl(this.geolocationControl);
            },
            defineZoomControl () {
                var that = this;
                this.ZoomControl.prototype = new BMap.Control();
                this.ZoomControl.prototype.initialize = function (map) {
                    // 创建一个DOM元素
                    var div = document.createElement("div");
                    // 添加文字说明
                    div.appendChild(document.createTextNode("放大2级"));
                    // 设置样式
                    div.style.cursor = "pointer";
                    div.style.border = "1px solid gray";
                    div.style.backgroundColor = "white";
                    // 绑定事件，点击一次放大两级
                    div.onclick = function (e) {
                        that.map.setZoom(that.map.getZoom() + 2);
                    }
                    // 添加DOM元素到地图中
                    that.map.getContainer().appendChild(div);
                    // 将DOM元素返回
                    return div;
                };
                var myZoomControl = new this.ZoomControl();
                that.map.addControl(myZoomControl);
            },
            addCityListControl () {
                this.map.addControl(this.cityListControl);
            },
            // 添加覆盖物
            addOverlay () {
                this.map.addOverlay(this.theMarker);
                this.map.addOverlay(this.thePolyline);
                this.map.addOverlay(this.theCircle);
                this.map.addOverlay(this.thePolygon);
                this.map.addOverlay(this.theRectangle);
            },
            // 清除覆盖物
            removeOverlay () {
                this.map.clearOverlays();
            },
            addFoxMarker () {
                this.map.addOverlay(this.myMarker);
            },
            // 显示覆盖物
            showOver () {
                this.theMarker.show();
                this.thePolyline.show();
                this.theCircle.show();
            },
            // 隐藏覆盖物
            hideOver () {
                this.theMarker.hide();
                this.thePolyline.hide();
                this.theCircle.hide();
            },
            // 添加文本标注
            addTextLabel () {
                this.theLabel.setStyle({
                    color: "red",
                    fontSize: "12px",
                    height: "20px",
                    lineHeight: "20px",
                    fontFamily: "Arial",
                    background: "white"
                });
                this.map.addOverlay(this.theLabel);
            },
            addMarkerLabel() {
                this.theMarker.setLabel(this.theMarkerLabel);
            },
            addBigAmountDataPoints () {
                for(var i = 0; i < data.data.length; i++) {
                    this.bigAmountDataPoints.push(new BMap.Point(data.data[i][0], data.data[i][1]));
                }
                var options = {
                    size: BMAP_POINT_SIZE_SMALL,
                    shape: BMAP_POINT_SHAPE_STAR,
                    color: '#d340c3'
                };
                var pointCollection = new BMap.PointCollection(this.bigAmountDataPoints, options);
                // 为点覆盖物增加点击事件
                pointCollection.addEventListener('click', function (e) {
                    alert('单击点的坐标为： '+e.point.lng+','+ e.point.lat);
                })
                this.map.addOverlay(pointCollection);
            },
            addCurve () {
                this.map.addOverlay(this.theCurve);
                this.theCurve.enableEditing();
            },
            addBoundary () {
                var that = this;
                this.theBoundary.get("北京市海淀区", function (rs) {
                    this.map.clearOverlays();
                    var count = rs.boundaries.length;
                    if (count === 0) {
                        alert("未能获取当前输入行政区域");
                        return;
                    }
                    var pointArray = [];
                    // 建立多边形覆盖物
                    for (var i =0; i<count;i++) {
                        var ply = new BMap.Polygon(rs.boundaries[i],{
                            strokeWeight: 2,
                            strokeColor: "#ff0000"
                        });
                        this.map.addOverlay(ply); //添加覆盖物
                        pointArray = pointArray.concat(ply.getPath());
                    }
                    this.map.setViewport(pointArray);
                });
            },
            addClusterMarker () {
                var MAX = 10;
                var markers = [];
                var pt = null;
                // 循环随机生成MAX个地图点，并追加到markers数组中
                for (var i=0;i<MAX;i++) {
                    pt = new BMap.Point(Math.random()*40+85,Math.random()*30+21);
                    markers.push(new BMap.Marker(pt));
                }

                // 最简单的用法，生成一个marker数组，然后调用markerCluster即可
                var markerCluster = new BMapLib.MarkerClusterer(this.map,{
                    markers: markers
                });
            },
            openMarkerWindow () {
                var that = this;
                this.map.addOverlay(this.theMarker);
                this.theMarker.addEventListener("click",function () {
                    // 开启信息窗口
                    that.map.openInfoWindow(that.infoWindow,new BMap.Point(116.404, 39.915));
                });
            },
            openRichInfoWindow () {
                var richInfoWindow = new BMap.InfoWindow(this.sContent);
                this.map.addOverlay(this.theMarker);
                this.theMarker.addEventListener("click",function () {
                    this.openInfoWindow(richInfoWindow);
                    // 防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
                    document.getElementById('imgDemo').onload = function () {
                        richInfoWindow.redraw();
                    }
                })
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    #baiduMapVueTest {
        width: 100%;
        height: 700px;
    }
</style>