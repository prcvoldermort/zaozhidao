<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>身边开发早知道</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
    <script>
        (function (doc, win) {
            console.log("dpr:"+win.devicePixelRatio);
            var docEle = doc.documentElement,
                    isIos = navigator.userAgent.match(/iphone|ipod|ipad/gi),
                    dpr=Math.min(win.devicePixelRatio, 3);
            scale = 1 / dpr,
                    resizeEvent = 'orientationchange' in window ? 'orientationchange' : 'resize';
            docEle.dataset.dpr = dpr;

//            var metaEle = doc.createElement('meta');
//            metaEle.name = 'viewport';
//            metaEle.content = 'initial-scale=' + scale + ',maximum-scale=' + scale;
//            docEle.firstElementChild.appendChild(metaEle);
            var recalCulate = function(){
                var width = docEle.clientWidth;
                if (width / dpr > 640) {
                    width = 640 * dpr;
                }
                docEle.style.fontSize = 20 * (width / 375) + 'px';
            };

            recalCulate();
            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvent, recalCulate, false);
        })(document, window);
    </script>
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
</head>
<body>
<div id="app"></div>
<script src="http://api.map.baidu.com/api?v=2.0&ak=46add4615d639b6ad017b5086b104310" type="text/javascript"></script>
<script src="{{asset('js/common.js')}}"></script>
<script src="{{asset('js/user.js')}}"></script>
</body>
</html>