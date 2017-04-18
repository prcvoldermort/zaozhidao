<template>
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