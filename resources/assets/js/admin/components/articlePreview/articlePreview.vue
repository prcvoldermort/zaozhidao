<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="title-header">
                    <h3 v-html="detail.project_title"></h3>
                    <div class="title-bar">
                        <span>发布于 {{detail.created_at}}</span>
                        <span>1906 次阅读</span>
                        <span>3 条公众意见</span>
                    </div>
                </div>
                <div class="project-section">
                    <h4 class="section-title">先导词</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_foreword">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">项目概况</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_overview">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">大气影响</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_airInfluence">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">水环境影响</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_waterInfluence">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">固态废物影响</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_solidWaste">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">环境风险</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_environmentRisk">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">其他</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_others">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">环评师总评</h4>
                    <p style="white-space: pre-line"></p>
                    <p v-html="detail.project_thoroughView">
                    </p>
                </div>
                <div class="project-section">
                    <h4 class="section-title">地理位置</h4>
                    <p style="white-space: pre-line"></p>
                    <div id="projectMap"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                mapGo: null,
                initCoord: new BMap.Point(116.417854,39.921988),
                initZoom: 5,
                detail:null
            }
        },
        created () {
            // 组件创建完成后获取数据，
            // 此时data已经被observed

        },
        watch: {
            // 如果路由有变化，会再次fetchData
            '$route': 'fetchData'
        },
        mounted () {
            this.mapGo = new BMap.Map("projectMap");
            this.fetchData();
        },
        methods: {
            fetchData () {
                // vue-resource获取数据的逻辑
                var that = this;
                this.$http.get('/project/getOneDetail',{
                    params: {
                        id: this.$route.params.id
                    }
                }).then((response) => {
                    // success response
                    if (response.body.status === true) {
                        this.detail = response.body.data;
                        that.mapGo.centerAndZoom(new BMap.Point(116.417854,39.921988),12);
                        that.mapGo.enableScrollWheelZoom();
                        // 创建项目标注点
                        var marker = new BMap.Marker(new BMap.Point(116.417854,39.921988));
                        // 将标注添加到地图中
                        that.mapGo.addOverlay(marker);
                    }else {
                        alert("status === false");
                    }
                },(response) => {
                    // failed response
                    alert("没有获取到php端的response");
                });
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    #projectMap {
        width: 100%;
        height: 300px;
    }

    .title-header {
        margin: 10px;
        text-align: center;
        .title-bar {
            color: #7e7e7e;
            font-size: 12px;
            span {
                margin-right: 10px;
            }
        }
    }

    .project-section {
        padding-bottom: 10px;
        position: relative;
        .section-title {
            color: #10b041;
            font-weight: 600;
            text-align: justify;
            padding-bottom: 3px;
            border-bottom: 2px solid #10b041;
        }
        p {
            text-indent: 2em;
            font-size: 16px;
            margin: 0 0 10px;
        }
    }
</style>