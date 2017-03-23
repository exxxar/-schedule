<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <title>Расписание</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link href="reset.css" rel="stylesheet">

    <link href="<?php echo e(url("style.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(url("css/font-awesome.min.css")); ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">



    <style>

        ::-webkit-scrollbar-thumb {
            border-radius: 0px;
            background: #9ccc65;
        }


        .wrapper {
            width: 472px;
            height: 514px;
            padding: 5px;
        }

        .wrapper,
        body {
            background: #F0F0F0;
            font-family: 'Roboto', sans-serif
        }
        .component .component_head {
            width: 450px;
            height: 135px;
            background: #ffffff;
            margin: auto;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }



        .component .component_head .component_title {
            width: 100%;
            background: #9ccc65;
        }

        .component .component_head .component_title > div p {
            font-family: 'Roboto', sans-serif;
            text-align: left;
            font-size: 14pt;
            margin-top:0px;

        }

        .component .component_head .component_title > div sub {
            text-align: left;
            width: 100%;
            display: inline-block;
            font-size: 10pt;
            color: white;

        }

        .component .component_head .component_title > div {
            padding: 10px 0px 0px 15px;
        }

        .component .component_head .component_title > div:nth-child(1) {
            width: 100%;
        }

        .component .component_head .component_main .group select[name="study_course"] {
            width: 100%;
            border: 1px solid #f2f2f2;
            font-size:10pt;
        }

        .component .component_head .component_main .group select[name="study_group"] {
            width: 100%;
            border: 1px solid #f2f2f2;
            font-size:10pt;
        }

        .component .component_head .component_main .group select[name="study_day"] {
            width: 100%;
            border: 1px solid #f2f2f2;
            font-size:10pt;

        }

        .component .component_settings {
            margin-top: 0px;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }

        .component .component_body {
            margin-top: 0px;
            padding: 10px 5px 10px 9px;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }

        .component .component_body ul li {
            background: #9ccc65 url(bg.png) fixed center;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }

        .component .component_body ul li > div:hover {
            background: #9ccc65 url(bg.png) fixed center;
        }

        .component-select {
            width: 133px;
            margin-left: 9px;
        }
        .component-select label {
            display: inline-block;
            width: 100%;
            margin-bottom: 3px;
            color: #9e9e9e;
            text-align: left;
            font-size: 8pt;
        }

        .component_footer {
            width: 450px;
            height: 60px;
            background: white;
            margin: auto;
            margin-top: 0px;
            box-sizing: border-box;
            padding: 5px 20px 5px 0px;
            position: relative;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }

        .component_footer ul {
            position: relative;
            width: 100%;
            height: auto;
        }

        .component_footer ul li {
            width:50px;
            height:50px;
            float:right;
            font-size: 20pt;
            padding: 14px;
            box-sizing: border-box;
            color: gray;
        }

        .component_footer ul li a{
            color:#dfdede;
            transition: .5s;
            padding: 5px;

        }


        .service_btn.active_btn a{
            border-bottom: 1px #9ccc65  solid;

        }
        .component_footer ul li:hover a{
            color:#9e9e9e;
            transition: .5s;
        }


        .toLeft {
            float: left !important;
        }

        .toLeft a {
            color:#9ccc65 !important;
        }

        .toLeft:hover a {
            color:#729d41 !important;
        }

        *[disabled] a{
            color:#dfdede !important;
            cursor: not-allowed;
        }

        *[disabled]:hover a{
            color:#dfdede !important;
        }

        /*  Settings */
        .component .component_settings .title {
            border:none;
        }
        .component .component_settings .title h1 {
            text-align: left;
            font-size: 18pt;
            font-family: 'Roboto';
            color: #9ccc65;
        }
        .component .component_settings .settings .element {
             padding: 0px 5px 0 0;
        }

        .component .component_settings .settings .element label {
            display: inline-block;
            width: 100%;
            margin-bottom: 3px;
            color: #9e9e9e;
            text-align: left;
            font-size: 8pt;
            font-style: normal;
        }

        .component .component_settings .settings .element select {
            padding: 10px;
            height: 50px;
            box-sizing: border-box;
            padding: 12px 10px 12px 10px;
            margin-right: 0;
            border: 1px solid #f2f2f2;
            font-size: 10pt;
            border-radius: 0px;
        }

        .component .component_settings .component_settings_close {
            top: 24px;
            right: 30px;
        }

        .component .component_settings .component_settings_close a {
            font-size: 16pt;
            color: #dfdede;
            transition: .5s;
        }

        .component .component_settings .component_settings_close:hover a {
            color: #9ccc65;
            transition: .5s;
        }

        .component .component_body ul li:after {
            content:attr(time);

        }

        .theme-select {
            width:  100%;
            height:50px;
        }

        .theme-select li {
            float: left;
            width: 50px;
            height: 50px;
            margin-left: 5px;
            box-sizing: border-box;
            border-radius: 5px;
            transition: .5s;
        }

        .theme-select .active:after {
            content: "";
            float: left;
            width: 45px;
            height: 45px;
            background: url(check.png) center no-repeat;
            background-size: contain;
        }

        .theme-select li:hover {
            transition: .5s;
            cursor: pointer;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }

        .theme-select li[data-color="1"] {
            background: #ff5722;
        }
        .theme-select li[data-color="2"] {
            background: #ff9800;
        }
        .theme-select li[data-color="3"] {
            background: #ffc107;
        }
        .theme-select li[data-color="4"] {
            background: #9ccc65;
        }
        .theme-select li[data-color="5"] {
            background: #00bcd4;
        }
        .theme-select li[data-color="6"] {
            background: #2196f3;
        }
        .theme-select li[data-color="7"] {
            background: #673ab7;
        }


        .component .component_bells {
            margin: auto;
            padding: 10px 5px 10px 9px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            width: 450px;
            height: 300px;
            background: white;
            margin-top: 0px;
            box-sizing: border-box;
        }

        .component_bells ul{
            width:100%;
            height:100%;
            overflow-y: scroll;
        }

        .component_bells ul li{
            width:100%;
            height:70px;
            border-bottom:1px #9ccc65 solid;
            margin-bottom:10px;
            background:#fff ;
            position: relative;
        }

        .current_bell:after{
            content: "";
            width: 85px;
            height: 85px;
            background: url(current_bell.png) center no-repeat;
            background-size: contain;
            position: absolute;
            top: -7px;
            left: -4px;
        }

        .component_bells ul li div:nth-child(1){
            width:70px;
            height:100%;
            overflow: hidden;
            float: left;
        }

        .component_bells ul li div:nth-child(1) p {
            font-size: 54pt;
            float: left;
            color: #9ccc65;
            margin-left: 20px;
        }

        .component_bells ul li div:nth-child(2),
        .component_bells ul li div:nth-child(3){
            float: left;
            width:150px;
        }

        .component_bells ul li div:nth-child(2) p,
        .component_bells ul li div:nth-child(3) p{
            font-size: 18pt;
            float: left;
            color: #9ccc65;
            margin-left: 20px;
            width: 100%;
            text-align: center;
            padding-top: 18px;
        }
    </style>



</head>

<body ng-controller="myCtrl">
<div class="wrapper">
    <div class="component">
        <section class="component_head">
            <div class="component_title">
                <div>
                   <p>Расписание занятий</p>
                   <sub>СР {{date}} - {{ week }}</sub>
                </div>
            </div>
            <form class="component_main">
                <div class="group">
                    <input type="hidden" name="fack_id" value="10">
                    <input type="hidden" name="group_id" value="2">
                    <input type="hidden" name="course_id" value="1">
                    <input type="hidden" name="sorted" value="desc">
                    <?php echo e(csrf_field()); ?>

                    <div class="component-select">
                        <label for="study_course">Курс обучения</label>
                        <select id="study_course" name="study_course">
                            <option value="1">1 курс</option>
                            <option value="2">2 курс</option>
                            <option value="3">3 курс</option>
                            <option value="4">4 курс</option>
                            <option value="5">5 курс</option>
                            <option value="6">6 курс</option>
                        </select>
                    </div>
                    <div class="component-select">
                        <label for="study_group">Группа</label>
                        <select id="study_group" name="study_group">
                            <option ng-repeat="group in groups" value="{{groups.id}}">{{group.Name_group}}</option>
                        </select>
                    </div>
                    <div class="component-select">
                        <label for="study_day">День недели</label>
                        <select id="study_day" name="study_day">
                            <option value="1">Понедельник</option>
                            <option value="2">Вторник</option>
                            <option value="3">Среда</option>
                            <option value="4">Четверг</option>
                            <option value="5">Пятница</option>
                            <option value="6">Суббота</option>
                            <option value="7">Воскресенье</option>
                            <option value="0">Вся неделя</option>
                        </select>
                    </div>
                </div>
            </form>
        </section>
        <section class="component_settings hidden">
            <div class="title">
                <h1>Настройка приложения</h1> </div>
            <div class="settings">
                <div class="element">
                    <label for="element_fclt" name="element_fclt">Факультет</label>
                    <select id="element_fclt" name="element_flct" ng-click="changeFack()">
                        <option  ng-repeat="fack in fackList" value="{{fack.Number}}" >{{fack.Name}}</option>
                    </select>
                </div>
                <div class="element">
                    <label for="element_course">Курс</label>
                    <select id="element_course" name="element_course" ng-click="changeCourse()">
                        <option value="1">1 курс</option>
                        <option value="2">2 курс</option>
                        <option value="3">3 курс</option>
                        <option value="4">4 курс</option>
                        <option value="5">5 курс</option>
                        <option value="6">6 курс</option>
                    </select>
                </div>
                <div class="element">
                    <label for="element_group">Группа</label>
                    <select id="element_group" name="element_group" ng-click="changeGroup(this)">
                        <option ng-repeat="group in groups" value="{{ group.id }}">{{group.Name_group}}</option>
                    </select>
                </div>
                <div class="element">
                    <label for="element_group">Цвет оформления</label>
                    <ul class="theme-select">
                        <li data-color="1"></li>
                        <li data-color="2"></li>
                        <li data-color="3"></li>
                        <li class="active" data-color="4"></li>
                        <li data-color="5"></li>
                        <li data-color="6"></li>
                        <li data-color="7"></li>
                    </ul>
                </div>
                <div class="element"> </div>
            </div>
            <div class="component_settings_close"> <a href="#"><i class="fa fa-share" aria-hidden="true"></i></a> </div>
        </section>
        <section class="component_body ">
            <ul>
                <li ng-repeat="r in rasp" time="{{ r.Number_pr}}я пара" ng-if="r.Week==week||r.Week==0">
                    <div>
                        <p>{{ r.Name_pr}}</p>
                    </div>
                    <div>
                        <p>ауд. {{ r.Number_aud}}</p>
                        <p class="small">(мат.фак)</p>
                    </div>
                    <div>
                        <p>{{ r.Name_lector}}</p>
                    </div>
                </li>

            </ul>
        </section>
        <section class="component_bells hidden">
            <ul>
                <li ng-repeat="b in bells">
                    <div>
                        <p ng-if="b.Number_pr!=2">{{ b.Number_pr}}</p>
                        <p class="current_bell" ng-if="b.Number_pr==2">{{ b.Number_pr}}</p>
                    </div>
                    <div>
                        <p>{{ b.Time_start}}</p>
                    </div>
                    <div>
                        <p>{{ b.Time_end}}</p>
                    </div>
                </li>

            </ul>
        </section>

        <section class="component_footer">
            <ul>

                <li title="Панель настройки" class="open_settings service_btn" ng-click="openSettings()"><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
                <li title="Обратная связь" class="service_btn"><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
                <li title="Расписание звоноков" class="toLeft open_bells service_btn"><a href=""><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
                <li disabled="true" title="Скачать расписание" class="toLeft service_btn"><a href=""><i class="fa fa-save"></i></a></li>
            </ul>
        </section>

    </div>
</div>
<!-- .wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?php echo e(url("js/cookies.js")); ?>"></script>
<script language="javascript" type="text/javascript">
    $(document).ready(function(){
        $(".open_settings").click(function(){
            if (!$(this).hasClass("active_btn")) {
                $(".component_settings").removeClass("hidden");
                $(".component_body").addClass("hidden");
                $(".component_bells").addClass("hidden");

                $(".service_btn").each(function (a, b, c) {
                    $(b).removeClass("active_btn");
                });

                $(this).addClass("active_btn");
            }
            else
            {
                $(".component_settings").addClass("hidden");
                $(".component_body").removeClass("hidden");
                $(".component_bells").addClass("hidden");
                $(this).removeClass("active_btn");
            }
        });



        $(".open_bells").click(function(){
            if (!$(this).hasClass("active_btn")) {
                $(".component_settings").addClass("hidden");
                $(".component_body").addClass("hidden");
                $(".component_bells").removeClass("hidden");

                $(".service_btn").each(function (a, b, c) {
                    $(b).removeClass("active_btn");
                });

                $(this).addClass("active_btn");
            }
            else {
                $(".component_settings").addClass("hidden");
                $(".component_body").removeClass("hidden");
                $(".component_bells").addClass("hidden");
                $(this).removeClass("active_btn");
            }

        });

        $(".component_settings_close").click(function(){
            $(".component_body").removeClass("hidden");
            $(".component_settings").addClass("hidden");

            $(".service_btn").each(function(a,b,c){
                $(b).removeClass("active_btn");
            });


        });


    });

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {

        $scope.search_data = "";
        $scope.search = function() {
            var token= $("[name='_token']").val();


            var req = {
                method: 'POST',
                url: '<?php echo e(url("/search")); ?>',

                data: {
                    _token:token,
                    day:$("p[date-num]").attr("date-num"),
                    week:$("p[week-num]").attr("week-num"),
                    fack_id:$("input[name='fack_id']").val(),
                    course_num:$("input[name='course_id']").val(),
                    group_id:$("input[name='group_id']").val(),
                    sorted:$("input[name='sorted']").val()
                }
            }

            $http(req).then(function(response){
                $scope.rasp = response.data;

            }, function(){


            });
        };

        $http.get("<?php echo e(url("/getSystemDate")); ?>")
                .then(function(response) {
                    $scope.date = response.data;
                });

        $http.get("<?php echo e(url("/getWeek")); ?>")
                .then(function(response) {
                    $scope.week = response.data;
                });

        $http.get("<?php echo e(url("/getRasp")); ?>")
                .then(function(response) {
                    $scope.rasp = response.data;
                });

        $http.get("<?php echo e(url("/getBellList")); ?>")
                .then(function(response) {
                    $scope.bells = response.data;
                });




        $scope.getGroups = function(_fackId,_courseId){
            var token= $("[name='_token']").val();

            $http.post("<?php echo e(url("/getGroups")); ?>",
                    {
                        _token:token,
                        fackId:_fackId,
                        courseId:_courseId
                    }

            )
                    .then(function(response) {
                        $scope.groups = response.data;
                    });
        }
        $scope.fackList = function(){
            $http.get("<?php echo e(url("/getFackList")); ?>")
                    .then(function(response) {
                        $scope.fackList = response.data;
                    });
        }

        $scope.openSettings = function(){

            var _fack = getCookie("element_fack");
            var _course = getCookie("element_course");

            if (_fack===""||_fack==null||_fack==undefined)
                _fack = 1;
            if (_course===""||_course==null||_course==undefined)
                _course = 1;

            $scope.getGroups(_fack,_course);

            $("#element_fclt").val(_fack);
            $("#element_course").val(_course);
            $("#element_group").val(getCookie("element_group"));
        }

        $scope.changeFack = function(){

            console.log($("#element_fclt").val());

            setCookie("element_fack",$("#element_fclt").val(),365);

            var _fack = getCookie("element_fack");
            var _course = getCookie("element_course");

            if (_fack===""||_fack==null||_fack==undefined)
                _fack = 1;
            if (_course===""||_course==null||_course==undefined)
                _course = 1;

            $scope.getGroups(_fack,_course);

        }

        $scope.changeCourse = function() {
            console.log($("#element_course").val());
            setCookie("element_course",$("#element_course").val(),365);

            var _fack = getCookie("element_fack");
            var _course = getCookie("element_course");

            if (_fack===""||_fack==null||_fack==undefined)
                _fack = 1;
            if (_course===""||_course==null||_course==undefined)
                _course = 1;

            $scope.getGroups(_fack,_course);

        }

        $scope.changeGroup = function() {
            console.log($("#element_group").val());
            setCookie("element_group",$("#element_group").val(),365);


        }
        $scope.fackList();
        $scope.getGroups(getCookie("element_fack"),getCookie("element_course"));
    });
</script>
</body>

</html>