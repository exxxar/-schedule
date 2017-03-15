<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <title>Расписание</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="reset.css" rel="stylesheet">
    <link href="{{ url("style.css") }}" rel="stylesheet">
    <link href="{{ url("css/font-awesome.min.css") }}" rel="stylesheet">
    <script src="https://vk.com/js/api/xd_connection.js?2" type="text/javascript"></script>
    <script type="text/javascript">
        VK.callMethod("showSettingsBox", 8214);
        VK.init(function () {
            // API initialization succeeded
            // Your code here
        }, function () {
            // API initialization failed
            // Can reload page here
        }, '5.60');
    </script>
</head>

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
                    <P>@{{date}}</P>
                </div>
                <div id="component_week">
                    <p>@{{ week }}</p>
                </div>
            </div>
            <form class="component_main">
                <div class="group">
                    <input type="search" placeholder="Найти предмет" name="search">
                    <button><i class="fa fa-search"></i></button>
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
                        <option ng-repeat="group in groups" value="@{{groups.id}}">@{{group.Name_group}}</option>
                    </select>
                    <select name="study_day">
                        <option value="0">Понедельник</option>
                        <option value="0">Вторник</option>
                        <option value="0">Среда</option>
                        <option value="0">Четверг</option>
                        <option value="0">Пятница</option>
                        <option value="0">Суббота</option>
                        <option value="0">Воскресенье</option>
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
                    <label for="element_fclt">Факультет</label>
                    <select id="element_flct">
                        <option>Физик-технический</option>
                    </select>
                </div>
                <div class="element">
                    <label for="element_course">Курс</label>
                    <select id="element_course">
                        <option>1 курс</option>
                    </select>
                </div>
                <div class="element">
                    <label for="element_group">Группа</label>
                    <select id="element_group">
                        <option>БЛА-БЛА-10</option>
                    </select>
                </div>
                <div class="element"> </div>
                <div class="element"> </div>
            </div>
            <div class="component_settings_close"> <a href=""><i class="fa fa-close"></i></a> </div>
        </section>
        <section class="component_body ">
            <ul>
                <li ng-repeat="r in rasp" auditory="ауд. @{{ r.Number_aud}}">
                    <div>
                        <p>@{{ r.Day}}</p>
                        <p>02.03.2016</p>
                    </div>
                    <div>
                        <p>@{{ r.Number_pr}}я пара</p>
                        <p>(8:00 - 9:30)</p>
                    </div>
                    <div>
                        <p>Мат. анализ</p>
                        <p class="small">@{{ r.Name_lector}}</p>
                        <p class="small">(мат. фак)</p>
                    </div>
                </li>

            </ul>
        </section>
        <div class="settings_btn"> <a href=""><i class="fa fa-cloud"></i></a> </div>
    </div>
</div>
<!-- .wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<script language="javascript" type="text/javascript">

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        $http.get("{{ url("/getSystemDate") }}")
            .then(function(response) {
                $scope.date = response.data;
            });

        $http.get("{{ url("/getWeek") }}")
            .then(function(response) {
                $scope.week = response.data;
            });

        $http.get("{{ url("/getRasp") }}")
            .then(function(response) {
                $scope.rasp = response.data;
            });

        $http.get("{{ url("/getGroups/4/3") }}")
            .then(function(response) {
                $scope.groups = response.data;
            });
    });
</script>
</body>

</html>