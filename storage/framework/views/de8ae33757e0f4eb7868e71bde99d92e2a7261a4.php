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





<body ng-controller="myCtrl">
<div class="wrapper">
    <div class="component">
        <section class="component_head">
            <div class="component_title">
                <div>
                    <div> <a href=""><i class="fa fa-save"></i></a> </div>
                    <p>Расписание</p>
                </div>
                <div id="component_date">
                    <P date-num="1">{{date}}</P>
                </div>
                <div id="component_week">
                    <p week-num="0">{{ week }}</p>
                </div>
            </div>
            <form class="component_main">
                <div class="group">
                    <input type="search" ng-bind="search_data" placeholder="Найти предмет" name="search">
                    <input type="hidden" name="fack_id" value="10">
                    <input type="hidden" name="group_id" value="2">
                    <input type="hidden" name="course_id" value="1">
                    <input type="hidden" name="sorted" value="desc">
                    <?php echo e(csrf_field()); ?>

                    <button ng-click="search()"><i class="fa fa-search"></i></button>
                </div>
                <div class="group">
                    <select name="study_course">
                        <option value="0">1 курс</option>
                        <option value="1">2 курс</option>
                        <option value="2">3 курс</option>
                        <option value="3">4 курс</option>
                        <option value="4">5 курс</option>
                        <option value="5">6 курс</option>
                    </select>
                    <select name="study_group">
                        <option ng-repeat="group in groups" value="{{groups.id}}">{{group.Name_group}}</option>
                    </select>
                    <select name="study_day">
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
                    <select id="element_group" name="element_group" ng-click="changeGroup()">
                        <option ng-repeat="group in groups" value="{{ group.id }}">{{group.Name_group}}</option>
                    </select>
                </div>
                <div class="element"> </div>
                <div class="element"> </div>
            </div>
            <div class="component_settings_close"> <a href="#"><i class="fa fa-close"></i></a> </div>
        </section>
        <section class="component_body ">
            <ul>
                <li ng-repeat="r in rasp" auditory="ауд. {{ r.Number_aud}}">
                    <div>
                        <p>{{ r.Day}}</p>
                        <p>02.03.2016</p>
                    </div>
                    <div>
                        <p>{{ r.Number_pr}}я пара</p>
                        <p>(8:00 - 9:30)</p>
                    </div>
                    <div>
                        <p>{{ r.Name_pr}}</p>
                        <p class="small">{{ r.Name_lector}}</p>
                        <p class="small">(мат. фак)</p>
                    </div>
                </li>

            </ul>
        </section>
        <div class="settings_btn" ng-click="openSettings()"> <a href=""><i class="fa fa-cloud"></i></a> </div>
    </div>
</div>
<!-- .wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?php echo e(url("js/cookies.js")); ?>"></script>
<script language="javascript" type="text/javascript">
    $(document).ready(function(){
        $(".settings_btn").click(function(){
            $(".component_settings").removeClass("hidden");
            $(".component_body").addClass("hidden");
        });

        $(".component_settings_close").click(function(){
            $(".component_body").removeClass("hidden");
            $(".component_settings").addClass("hidden");
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