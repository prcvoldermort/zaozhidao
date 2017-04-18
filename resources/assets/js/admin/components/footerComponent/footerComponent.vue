<template>
    <div class="footerComponent">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-about col-md-5 col-sm-12">
                        <h4>关于 BootCDN</h4>
                        <p>BootCDN 是 Bootstrap 中文网和又拍云共同支持并维护的前端开源项目免费 CDN 服务，由又拍云提供全部 CDN 支持，致力于为 Bootstrap、jQuery、Angular 一样优秀的前端开源项目提供稳定、快速的免费 CDN 加速服务。BootCDN 所收录的开源项目主要同步于 cdnjs 仓库。

                            自2013年10月31日上线以来已经为上万家网站提供了稳定、可靠的免费 CDN 加速服务。

                            反馈或建议请发送邮件至：cdn@bootcss.com</p>
                    </div>
                    <div class="footer-links col-md-2 col-sm-12">
                        <h4>友情链接</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="http://www.bootcss.com" target="_blank">Bootstrap 中文网</a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank">Bootstrap 中文网</a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank">Bootstrap 中文网</a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank">Bootstrap 中文网</a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank">Bootstrap 中文网</a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank">Bootstrap 中文网</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-techs col-md-2 col-sm-12">
                        <h4>我们用到的技术</h4>
                        <ul class="list-unstyled list-inline">
                            <li>
                                <a href="http://www.bootcss.com" target="_blank"></a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank"></a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank"></a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank"></a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank"></a>
                            </li>
                            <li>
                                <a href="http://www.bootcss.com" target="_blank"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-sponsors col-md-3 col-sm-12">
                        <h4>战略合作 & CDN 提供</h4>
                        <p>
                            <a href="https://www.upyun.com" target="_blank">
                                <img src="http://www.bootcdn.cn/assets/img/upyun.svg" style="width: 120px" alt="又拍云存储">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <span>© 2013-2017</span>
                <a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a>
                <span>京公网安备11010802014853</span>
            </div>
        </footer>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {

            }
        }
    }
</script>

<style lang="sass" rel="stylesheet/scss">
    .footerComponent {
        .footer{
            background-color: #27ae60;
            border-top: 1px solid #26aa5e;
            color: #FFFFFF;
            padding-top: 40px;
            margin-top: 80px;
            p {
              margin-bottom: 1.2em;
            }
            ul {
                margin-bottom: 1.2em;
                li {
                    margin-bottom: 4px;
                }
            }
            .list-unstyled {
                padding-left: 0;
                list-style: none;
            }
            a {
                color: #FFFFFF;
                border-bottom: dotted 1px #a9dfbf;
            }
            div {
                padding-left: 25px;
                padding-right: 25px;
                margin-bottom: 30px;
            }
            .list-inline {
                padding-left: 0;
                margin-left: -5px;
                list-style: none;
                li {
                    display: inline-block;
                    padding-right: 5px;
                    padding-left: 5px;
                    margin-bottom: 4px;
                }
            }
            .footer-sponsors img {
                vertical-align: middle;
                background-color: transparent;
            }
            .copy-right {
                height: 50px;
                line-height: 50px;
                margin-top: 10px;
                text-align: center;
                background-color: rgba(51,51,51,0.08);
            }
        }
    }
</style>