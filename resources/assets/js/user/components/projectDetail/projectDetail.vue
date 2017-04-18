<template>
    <div class="projectDetail">
        <div class="loading" v-if="loading">
            加载中, 请稍后...
        </div>
        <div class="error" v-if="error">
            woo, 出错了, 请重试
        </div>
        <article class="weui-article" v-if="detail">
            <h1>{{detail.project_title}}</h1>
            <section>
                <h2 class="title">导语</h2>
                <section>
                    <p>{{detail.project_foreword}}</p>
                </section>
            </section>
            <section>
                <h2 class="title">项目概况</h2>
                <section>
                    <p>{{detail.project_overview}}</p>
                    <img v-bind:src="pic1" alt="picture 1">
                    <img v-bind:src="pic2" alt="picture 2">
                </section>
            </section>
            <section>
                <h2 class="title">大气环境影响</h2>
                <section>
                    <p>{{detail.project_airInfluence}}</p>
                </section>
            </section>
            <section>
                <h2 class="title">固体废物</h2>
                <section>
                    <p>{{detail.project_solidWaste}}</p>
                </section>
            </section>
            <section>
                <h2 class="title">环境风险</h2>
                <section>
                    <p>{{detail.project_environmentRisk}}</p>
                </section>
            </section>
            <section>
                <h2 class="title">其他</h2>
                <section>
                    <p>{{detail.project_others}}</p>
                </section>
            </section>
            <section>
                <h2 class="title">环评师总体观点</h2>
                <section>
                    <p>{{detail.project_thoroughView}}</p>
                </section>
            </section>
            <section>
                <h2 class="title">公众意见</h2>
                <section>
                    <h3>1.1 节标题</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                </section>
            </section>
        </article>
    </div>
</template>

<script type="text/ecmascript-6">
    import pic1 from '../../../../images/source/swiper1.png';
    import pic2 from '../../../../images/source/swiper2.png';

    export default {
        data () {
            return {
                loading: false,
                detail: null,
                error: null,
                pic1: pic1,
                pic2: pic2
            }
        },
        created () {
            // 组件创建完后获取数据,
            // 此时data已经被observed了
            this.fetchData();
        },
        watch: {
            // 如果路由有变化, 会再次fetchData
            '$route': 'fetchData'
        },
        mounted () {

        },
        methods: {
            fetchData() {
                this.error = this.detail = null;
                this.loading = true;
                // vue-resource获取数据的逻辑
                this.$http.get('/project/getOneDetail',{
                    params: {
                        id: this.$route.params.id
                    }
                }).then((response) => {
                    this.loading = false;
                    //success response
                    if (response.body.status === true) {
                        this.detail = response.body.data;
                    }else {
                        this.error = "status === false";
                        alert("status === false");
                    }
                },(response) => {
                    //failed response
                    this.error = "没有获取到php端的response";
                    alert("没有获取到php端的response");
                });
            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
</style>