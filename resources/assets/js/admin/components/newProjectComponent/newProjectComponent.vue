<template>
    <div class="newProjectComponent">
        <div class="form-group">
            <label for="projectName">项目名称</label>
            <input v-model="projectName" type="text" class="form-control" placeholder="请输入项目名称">
        </div>
        <div class="form-group">
            <label for="projectTitle">文章标题</label>
            <input v-model="projectTitle" type="text" class="form-control" placeholder="请输入文章标题">
        </div>
        <!--项目经纬度地图选点mapAddPoint component-->
        <div class="form-group">
            <label>地图点选项目点</label>
            <map-add-point v-on:tellFatherProjectPoint="setProjectPoint"></map-add-point>
        </div>
        <!--项目受影响点地图选点绘制mapAddInfluencedPoints component-->
        <div class="form-group">
            <label>地图点选项目受影响点</label>
            <map-add-influenced-points v-on:tellFatherInfluencedPoint="setInfluencedPoint" v-bind:projectLng="projectLong" v-bind:projectLat="projectLat"></map-add-influenced-points>
        </div>
        <div class="form-group">
            <label for="projectForeword">引导词</label>
            <vue-html5-editor @change="updateProjectForeword" :content="projectForeword" :height="150" :z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label for="projectOverview">项目概况</label>
            <vue-html5-editor @change="updateProjectOverview" :content="projectOverview" :height="150" :z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label>大气影响</label>
            <vue-html5-editor @change="updateProjectAirInfluence" :content="projectAirInfluence" :height="150" :z-index="1000" :auto-height="true" :show-module-name="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label>水环境影响</label>
            <vue-html5-editor @change="updateProjectWaterInfluence" :content="projectWaterInfluence" :height="150" :z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label>固体废物</label>
            <vue-html5-editor @change="updateProjectSolidWaste" :content="projectSolidWaste" :height="150" :z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label>环境风险</label>
            <vue-html5-editor @change="updateProjectEnvironmentRisk" :content="projectEnvironmentRisk" :height="150" :z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label>其他</label>
            <vue-html5-editor @change="updateProjectOthers" :content="projectOthers" :height="150" z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <div class="form-group">
            <label>环评师总体观点</label>
            <vue-html5-editor @change="updateProjectThoroughView" :content="projectThoroughView" :height="150" z-index="1000" :auto-height="true"></vue-html5-editor>
        </div>
        <button v-on:click="submitData" type="button" class="btn btn-success">新建</button>
        <button type="button" class="btn btn-default">取消</button>
    </div>
</template>

<script type="text/ecmascript-6">
    import mapAddPoint from '../mapAddPoint/mapAddPoint.vue'
    import mapAddInfluencedPoints from '../mapAddInfluencedPoints/mapAddInfluencedPoints.vue'

    export default {
        components: {
            mapAddPoint,
            mapAddInfluencedPoints
        },
        data () {
            return {
                projectName: null,
                projectTitle: null,
                projectForeword: "foreword",
                projectOverview: "overview",
                projectAirInfluence: "air influence",
                projectWaterInfluence: "water influence",
                projectSolidWaste: "solid waste",
                projectEnvironmentRisk: "environment risk",
                projectOthers: "others",
                projectThoroughView: "thorough view",
                projectLat: 25.1186930000,
                projectLong: 102.7183370000,
                projectInfluencedPointArray: null
            }
        },
        methods: {
            submitData () {
                this.$http.post('/project/createNewProject',{
                    params: {
                        projectName: this.projectName,
                        projectTitle: this.projectTitle,
                        projectForeword: this.projectForeword,
                        projectOverview: this.projectOverview,
                        projectAirInfluence: this.projectAirInfluence,
                        projectWaterInfluence: this.projectWaterInfluence,
                        projectSolidWaste: this.projectSolidWaste,
                        projectEnvironmentRisk: this.projectEnvironmentRisk,
                        projectOthers: this.projectOthers,
                        projectThoroughView: this.projectThoroughView,
                        projectLat: this.projectLat,
                        projectLong: this.projectLong,
                        projectInfluencedPointArray: this.projectInfluencedPointArray
                    }
                }).then((response) => {
                    //success response
                    if (response.body.status === true) {
                        //新项目添加成功，跳转到成功的页面
                        this.$router.push({name: 'newprojectsuccess', params: {projectId: response.body.newProjectId}});
                    }else {
                        alert("新项目添加失败，请联系管理员。");
                    }
                },(response) => {
                    // failed response
                    alert("没有获取到php端的response");
                });
            },
            setProjectPoint (data) {
                this.projectLong = data.lng;
                this.projectLat = data.lat;
            },
            setInfluencedPoint (data) {
                this.projectInfluencedPointArray = data;
                console.log(this.projectInfluencedPointArray);
            },
            updateProjectForeword: function (data) {
                this.projectForeword = data;
            },
            updateProjectOverview: function (data) {
                this.projectOverview = data;
            },
            updateProjectAirInfluence: function (data) {
                this.projectAirInfluence = data;
            },
            updateProjectWaterInfluence: function (data) {
                this.projectWaterInfluence = data;
            },
            updateProjectSolidWaste: function (data) {
                this.projectSolidWaste = data;
            },
            updateProjectEnvironmentRisk: function (data) {
                this.projectEnvironmentRisk = data;
            },
            updateProjectOthers: function (data) {
                this.projectOthers = data;
            },
            updateProjectThoroughView: function (data) {
                this.projectThoroughView = data;
            },
            updateProjectLat: function (data) {
                this.projectLat = data;
            },
            updateProjectLong: function (data) {
                this.projectLong = data;
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">

</style>