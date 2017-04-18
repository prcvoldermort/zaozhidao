<template>
    <div class="projectManagement">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#theNavbar" aria-expanded="false">
                        <span class="sr-only">折叠导航条</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <router-link to="/index" class="navbar-brand">Brand</router-link>
                </div>

                <div class="collapse navbar-collapse" id="theNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <router-link to="/#">Link</router-link>
                        </li>
                        <li>
                            <router-link to="/#">Link</router-link>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <router-link to="/#">Link</router-link>
                        </li>
                        <li class="dropdown">
                            <router-link to="/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                <span class="caret"></span>
                            </router-link>
                            <ul class="dropdown-menu">
                                <li>
                                    <router-link to="/#">Action</router-link>
                                </li>
                                <li>
                                    <router-link to="/#">Another action</router-link>
                                </li>
                                <li>
                                    <router-link to="/#">Something else here</router-link>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <router-link to="/#">Separated link</router-link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                        <router-link to="/#" class="list-group-item active">
                            项目管理
                        </router-link>
                        <router-link to="/#" class="list-group-item">
                            危险物质管理
                        </router-link>
                        <router-link to="/#" class="list-group-item">
                            邮件管理
                        </router-link>
                    </div>
                </div>
                <div class="col-md-9 col-md-offset-1">
                    <div class="newProject">
                        <button type="button" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span>新建项目
                        </button>
                    </div>
                    <div class="existingProjects">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>名称</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>云南玉溪峨山县金属拉丝项目</td>
                                    <td>
                                        <button type="button" class="btn btn-default">预览</button>
                                        <button type="button" class="btn btn-warning">修改</button>
                                        <button type="button" class="btn btn-danger">删除</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>云南玉溪峨山县金属拉丝项目</td>
                                    <td>
                                        <button type="button" class="btn btn-default">预览</button>
                                        <button type="button" class="btn btn-warning">修改</button>
                                        <button type="button" class="btn btn-danger">删除</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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


</style>