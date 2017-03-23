<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Konva Drag and Drop a Group Demo</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>>
    <script src="https://cdn.rawgit.com/konvajs/konva/1.4.0/konva.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #F0F0F0;
        }

        .schedule-component {
            width: 805px;
            height: auto;
            position: relative;
            margin: auto;
        }

        .overflow {
            overflow: hidden;
            height: 450px;
        }
    </style>
</head>

<body>
<div class="schedule-component">
    <div class="row">
        <div class="col s12 m12">
            <div class="card ">
                <div class="card-image overflow">
                    <div id="container"></div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="row">
                        <div class="col s4 m4">
                            <label>Факультет</label>
                            <select class="browser-default" id="facks">
                                <option value="" disabled selected>Выбери свой факультет</option>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <label>Курс</label>
                            <select class="browser-default" id="course">
                                <option value="" disabled selected>Выбери свой курс</option>
                                <option value="1">Курс 1</option>
                                <option value="2">Курс 2</option>
                                <option value="3">Курс 3</option>
                                <option value="4">Курс 4</option>
                                <option value="5">Курс 5</option>
                                <option value="6">Курс 6</option>

                            </select>
                        </div>
                        <div class="col s4 m4">
                            <label>Группа</label>
                            <select class="browser-default" id="groups">
                                <option value="" disabled selected>Выбери свою группу</option>

                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo e(csrf_field()); ?>

<script>

    String.prototype.breakAt = function (a) {
        var _buf = "";
        for (var i=0;i<this.length;i++){
            if (i%a==0)
                _buf += this.substr(i, a)+'\n';
        }
        return _buf;
    };

    String.prototype.cutAt = function (a) {
        return this.length>a?this.substr(0, a)+'.':this;

    };

    window.onload = function () {

    }

    'use strict';

    class User {

        constructor(params) {
            this.dayArray = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'];
            this.time = [];
            this.params = params;
            this.scheduleTable = undefined;
            this.group = undefined;
            this.scheduleLayer = undefined;
            this.shdData = undefined;

            this.scheduleTable = new Konva.Stage(params);
            this.scheduleLayer = new Konva.Layer();
            this.group = new Konva.Group({
                draggable: true
                ,x: 70
                ,y: 40
            });


            this.scheduleLayer.add(this.group);
            this.scheduleTable.add(this.scheduleLayer);

            this.group.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
            this.group.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });
        }

        sayHi() {
            var redLine = new Konva.Line({
                points: [5, 70, 140, 23, 250, 60, 300, 20],
                stroke: 'red',
                strokeWidth: 15,
                lineCap: 'round',
                lineJoin: 'round'
            });

            this.group.add(redLine);
            this.group.draw();
        }

    }

    let user = new User({
        container: 'container'
        , width: 500
        , height: 500
    });
    user.sayHi(); // Вася

/*    function Shd(params) {
        var self = this;

        this.dayArray = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'];
        this.time = [];
        this.params = params;
        this.scheduleTable = undefined;
        this.group = undefined;
        this.scheduleLayer = undefined;
        this.shdData = undefined;



        var el = {
            "group":{"param":{  x: 0 , y: 0 , width: 90 , height: 90 },"type":0},
            "label":{"param":{  x: 0 , y: 0 , text:"", align: 'center', fontSize: 10, fontFamily: 'Calibri', fill: '#26A69A'},"type":1},
            "line":{"param":{   points: [],  stroke: 'gray', strokeWidth: 0.1},"type":3},
            "rect":{"param":{   x: 0, y: 0  , width: 90, height: 90, name: "", fill: 'white', stroke: 'black', strokeWidth: 0.1},"type":5}
        }

        this.doElement = function (name) {
                switch(el[name].type){
                    case 0: return new Konva.Group(el[name].param);
                    case 1: return new Konva.Text(el[name].param);
                    case 3: return new Konva.Line(el[name].param);
                    case 5: return new Konva.Rect(el[name].param);
                }
        }

    }

    Shd.prototype = {
        constructor: function(){
            console.log("text");
            this.scheduleTable = new Konva.Stage(params);
            this.scheduleLayer = new Konva.Layer();
            this.group = new Konva.Group({
                draggable: true
                ,x: 70
                ,y: 40
            });
            this.scheduleLayer.add(this.group);
            this.scheduleTable.add(this,scheduleLayer);

            this.group.on('mouseover', function () {
                document.body.style.cursor = 'pointer';
            });
            this.group.on('mouseout', function () {
                document.body.style.cursor = 'default';
            });

        },

        setData:function(data) {
            this.shdData = data;
        },

        rasp: function(fn){
            if (this.shdData==undefined)
                    return;

            var _y = 0;
            var _x = 0;
            var pr = 1, day = 1;

            for (var i = 1; i <= 49; i++) {

                var week = this.elem(pr,day).Week;
                var subject = this.elem(pr,day).Name_pr.breakAt(15);
                var auditory = this.elem(pr,day).Number_aud;

                var subjectData =  "Предмет:"+this.elem(pr,day).Name_pr+"<br>Преподаватель:"+this.elem(pr,day).Name_lector+"<br>Аудитория:"+this.elem(pr,day).Number_aud;

                var boxGroup = this.doElement("group");
                boxGroup.setX(_x);
                boxGroup.setY(_y);

                var boxLabel = this.doElement("label");
                boxLabel.setText(this.elem(pr,day).Name_pr.cutAt(10));
                boxLabel.setX(5);
                boxLabel.setY(5);

                var auditoryLabel = this.doElement("label");
                auditoryLabel.setX(5);
                auditoryLabel.setY(32);
                auditoryLabel.setText(this.elem(pr,day).Number_aud);

                var weekLabel = this.doElement("label");
                weekLabel.setX(50);
                weekLabel.setY(70);
                weekLabel.setText(week);

                var weekDevisor = this.doElement("line");
                weekDevisor.setPoints([0, 45, 90, 45]);

                var box = this.doElement("rect");
                box.setName(subjectData);

                box.on('mousemove',function(){
                    fn(this.getName());
                });
                boxGroup.add(box);
                boxGroup.add(boxLabel);

                boxGroup.add(auditoryLabel);
                boxGroup.add(weekLabel);
                if (week!=0)
                    boxGroup.add(weekDevisor);

                this.group.add(boxGroup);
                this.scheduleLayer.add(this.group);

                _y = i % 7 == 0 ? 0 : _y + 90 + 10;
                _x = i % 7 == 0 ? _x + 90 + 10 : _x;
                pr = i% 7 == 0? 1: pr+1;
                day = i%7==0?day+1:day;
            }
            //this.scheduleLayer.draw();
        },
        draw:function(){
            this.scheduleTable.draw();
        },
        elem:function(pr,day) {
            for(var i=0;i<this.shdData.length;i++){
                if (this.shdData[i].Day==day&&this.shdData[i].Number_pr==pr)
                    return this.shdData[i];
            }

            var _d = {"Number_pr":"","Name_pr":"","Name_lector":"","Number_aud":"","Week":0};
            return _d;
        },
        bells:function(data){
            for (var i = 0; i < data.length; i++) {
                var timeLabel = this.doElement("label");
                timeLabel.setX(-50);
                timeLabel.setY(25 + i * 90 + i * 10);
                timeLabel.setFontSize(14);
                timeLabel.setText(data[i].Time_start+"\n"+data[i].Time_end);
                this.group.add(timeLabel);
            }
            this.group.draw();
        },
        days: function(){
            for (var i = 0; i < 7; i++) {
                var dateLabel = this.doElement("label");
                dateLabel.setX(i * 90 + i * 10);
                dateLabel.setY(-15);
                dateLabel.setFontSize(14);
                dateLabel.setText(this.dayArray[i]);
                this.group.add(dateLabel);
            }
            this.group.draw();
        }

    };


    var _shd = new Shd({
        container: 'container'
        , width: 500
        , height: 500
    })
   // _shd.days();
    console.log(_shd);

    $.get("<?php echo e(url('/getBellList')); ?>",function (data) {
        _shd.bells(data);
    });

    _shd.days();*/

    function getRasp(a,b,c){
        $.post("<?php echo e(url('/getRasp2')); ?>",{
            _token:$("[name='_token']").val(),
            id_Fack:a,
            id_Group:b,
            Course:c
        },function (data) {
            _shd.setData(data);
            _shd.rasp(function(a){
                $(".card-content p").html(a);
            });
        });
    }

    console.log(_shd);



    var elements = {
            "group":{"param":{  x: 0 , y: 0 , width: 90 , height: 90 },"type":0},
            "label":{"param":{  x: 0 , y: 0 , text:"", align: 'center', fontSize: 10, fontFamily: 'Calibri', fill: '#26A69A'},"type":1},
            "line":{"param":{   points: [],  stroke: 'gray', strokeWidth: 0.1},"type":3},
            "rect":{"param":{   x: 0, y: 0  , width: 90, height: 90, name: "", fill: 'white', stroke: 'black', strokeWidth: 0.1},"type":5},

    }

    function doElement(name){
        switch(elements[name].type){
            case 0: return new Konva.Group(elements[name].param);
            case 1: return new Konva.Text(elements[name].param);
            case 3: return new Konva.Line(elements[name].param);
            case 5: return new Konva.Rect(elements[name].param);
        }
    }






    function elem(d,pr,day) {
        for(var i=0;i<d.length;i++){
            if (d[i].Day==day&&d[i].Number_pr==pr)
                    return d[i];
        }

        var _d = {"Number_pr":"","Name_pr":"","Name_lector":"","Number_aud":"","Week":0};
        return _d;
    }

    function elem2(d,pr,day,week) {
        for(var i=0;i<d.length;i++){
            if (d[i].Day==day&&d[i].Number_pr==pr&&d[i].Week==week)
                return d[i];
        }

        var _d = {"Number_pr":"","Name_pr":"","Name_lector":"","Number_aud":"","Week":0};
        return _d;
    }

    function drawRasp(data){
        var _y = 0;
        var _x = 0;
        var pr = 1, day = 1;

        for (var i = 1; i <= 49; i++) {

            var week = elem(data,pr,day).Week;
            var subject = elem(data,pr,day).Name_pr.breakAt(15);
            var auditory = elem(data,pr,day).Number_aud;


            var subjectData =  "Предмет:"+elem(data,pr,day).Name_pr+"<br>Преподаватель:"+elem(data,pr,day).Name_lector+"<br>Аудитория:"+elem(data,pr,day).Number_aud;

            var boxGroup = doElement("group");
            boxGroup.setX(_x);
            boxGroup.setY(_y);

            var boxLabel = doElement("label");
            boxLabel.setText(elem(data,pr,day).Name_pr.cutAt(10));
            boxLabel.setX(5);
            boxLabel.setY(5);

            var auditoryLabel = doElement("label");
            auditoryLabel.setX(5);
            auditoryLabel.setY(32);
            auditoryLabel.setText(elem(data,pr,day).Number_aud);

            var weekLabel = doElement("label");
            weekLabel.setX(50);
            weekLabel.setY(70);
            weekLabel.setText(week);

            var weekDevisor = doElement("line");
            weekDevisor.setPoints([0, 45, 90, 45]);

            var box = doElement("rect");
            box.setName(subjectData);

            box.on('mousemove', function () {
                $(".card-content p").html(this.getName());

            });
            boxGroup.add(box);
            boxGroup.add(boxLabel);

            boxGroup.add(auditoryLabel);
            boxGroup.add(weekLabel);
            if (week!=0)
                boxGroup.add(weekDevisor);

            group.add(boxGroup);
            scheduleLayer.add(group);
            _y = i % 7 == 0 ? 0 : _y + 90 + 10;
            _x = i % 7 == 0 ? _x + 90 + 10 : _x;
            pr = i% 7 == 0? 1: pr+1;
            day = i%7==0?day+1:day;
        }
        scheduleLayer.draw();
    }




    function getBells(){
        $.get("<?php echo e(url('/getBellList')); ?>",function (data) {
            for (var i = 0; i < data.length; i++) {
                var timeLabel = doElement("label");
                timeLabel.setX(-50);
                timeLabel.setY(25 + i * 90 + i * 10);
                timeLabel.setFontSize(14);
                timeLabel.setText(data[i].Time_start+"\n"+data[i].Time_end);
                group.add(timeLabel);
            }
            group.draw();
        });
    }

    function getDayLabels(){
        for (var i = 0; i < 7; i++) {
            var dateLabel = doElement("label");
            dateLabel.setX(i * 90 + i * 10);
            dateLabel.setY(-15);
            dateLabel.setFontSize(14);
            dateLabel.setText(days[i]);
            group.add(dateLabel);
        }
    }

    var width = window.innerWidth;
    var height = window.innerHeight;
    var scheduleTable = new Konva.Stage({
        container: 'container'
        , width: width
        , height: height
    });


    var scheduleLayer = new Konva.Layer();
    var group = new Konva.Group({
        draggable: true
        ,x: 70
        ,y: 40
    });



    getDayLabels();
    getBells();

    group.on('mouseover', function () {
        document.body.style.cursor = 'pointer';
    });
    group.on('mouseout', function () {
        document.body.style.cursor = 'default';
    });

    scheduleLayer.add(group);
    scheduleTable.add(scheduleLayer);
</script>
<script>

    $(document).ready(function () {
        $('.modal').modal();

        $.get("<?php echo e(url('/getFackList')); ?>",function(data){
            for (var i=0;i<data.length;i++){
                $("#facks").append("<option value='"+data[i].Number+"'>"+data[i].Name+"</option>")
            }
        });

        $("#course, #facks, #groups").change(function(){
            scheduleLayer.removeChildren();


            if ($("#facks").val()!=null&&$("#groups").val()!=null&&$("#course").val()!=null)
                getRasp(parseInt($("#facks").val()),parseInt($("#groups").val()),parseInt($("#course").val()));

            if ($("#groups").attr("forCourse")!=$("#course").val()||$("#groups").attr("forFacks")!=$("#facks").val()){
                $.post("<?php echo e(url('/getGroups')); ?>",{
                    _token:$("[name='_token']").val(),
                    fackId:$("#facks").val(),
                    courseId:$("#course").val()
                },function(data){

                    $("#groups").empty();

                    $("#groups").append("<option value='' disabled selected>Выбери свою группу</option>");

                    for (var i=0;i<data.length;i++){
                        $("#groups").append("<option value='"+data[i].id+"'>"+data[i].Name_group+"</option>")
                    }

                    $("#groups").attr({"forCourse":$("#course").val()});
                    $("#groups").attr({"forFacks":$("#facks").val()});

                });
            }

        });



    });
</script>
</body>

</html>