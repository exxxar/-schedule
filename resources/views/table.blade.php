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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
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

{{csrf_field()}}
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


    'use strict';

    class Shd {
        constructor(params) {
            this.dayArray = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'];
            this.time = [];
            this.params = params;

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

        doElement(name) {
            var el = {
                "group":{"param":{  x: 0 , y: 0 , width: 90 , height: 90 },"type":0},
                "label":{"param":{  x: 0 , y: 0 , text:"", align: 'center', fontSize: 10, fontFamily: 'Calibri', fill: '#26A69A'},"type":1},
                "line":{"param":{   points: [],  stroke: 'gray', strokeWidth: 0.1},"type":3},
                "rect":{"param":{   x: 0, y: 0  , width: 90, height: 90, name: "", fill: 'white', stroke: 'black', strokeWidth: 0.1},"type":5}
            }

            switch(el[name].type){
                case 0: return new Konva.Group(el[name].param);
                case 1: return new Konva.Text(el[name].param);
                case 3: return new Konva.Line(el[name].param);
                case 5: return new Konva.Rect(el[name].param);
            }
        }
        setData(data) {
            this.shdData = data;
        }
        rasp(fn){
            if (this.shdData==undefined)
                return;

            var _y = 0;
            var _x = 0;
            var pr = 1, day = 1;

            for (var i = 1; i <= 49; i++) {
                var week = "", namePr = "", numberAud = "", nameLactor="",subjectData = "";
                if (this.testElem(pr,day,0)==true)
                    week = 0;

                else
                    if (this.testElem(pr,day,1)==true&&this.testElem(pr,day,2)==false)
                        week = 1;
                    else
                        if (this.testElem(pr,day,2)==true&&this.testElem(pr,day,1)==false)
                                week = 2;
                            else
                                if(this.testElem(pr,day,2)==true&&this.testElem(pr,day,1)==true)
                                        week = 3;








                namePr = this.elem(pr,day,week).Name_pr.cutAt(10);
                numberAud = this.elem(pr, day, week).Number_aud;
                nameLactor = this.elem(pr,day,week).Name_lector;
                subjectData =   "Предмет:"+namePr+"<br>Преподаватель:"+numberAud+"<br>Аудитория:"+nameLactor;

                var boxGroup = this.doElement("group");
                boxGroup.setX(_x);
                boxGroup.setY(_y);

                var boxLabel1, boxLabel2;
                if (week!=3){
                    boxLabel1 = this.doElement("label");
                    boxLabel1.setText(namePr);
                    boxLabel1.setX(5);
                    switch (parseInt(week)) {
                        case 2:
                        case 0:
                            boxLabel1.setY(5);
                            break;
                        case 1:
                            boxLabel1.setY(40);
                            break;
                    }
                }

                else {
                    boxLabel1 = this.doElement("label");
                    boxLabel2 = this.doElement("label");
                    boxLabel1.setText(this.elem(pr,day,1).Name_pr);
                    boxLabel1.setX(5);
                    boxLabel1.setY(5);
                    boxLabel2.setText(this.elem(pr,day,2).Name_pr);
                    boxLabel2.setX(5);
                    boxLabel2.setY(40);
                }



                var auditoryLabel1, auditoryLabel2;
                if (week!=3) {

                    auditoryLabel1 = this.doElement("label");
                    auditoryLabel1.setX(5);


                    switch (parseInt(week)) {
                        case 2:
                        case 0:
                            auditoryLabel1.setY(70);
                            break;
                        case 1:
                            auditoryLabel1.setY(32);
                            break;
                    }
                    auditoryLabel1.setText(numberAud);


                }
                else
                {
                    auditoryLabel1 = this.doElement("label");
                    auditoryLabel1.setX(5);
                    auditoryLabel1.setY(32);
                    auditoryLabel2 = this.doElement("label");
                    auditoryLabel2.setX(5);
                    auditoryLabel2.setY(70);
                    auditoryLabel1.setText(this.elem(pr,day,1).Number_aud);
                    auditoryLabel2.setText(this.elem(pr,day,2).Number_aud);
                }

                var weekDevisor = this.doElement("line");
                weekDevisor.setPoints([0, 45, 90, 45]);

                var box = this.doElement("rect");
                box.setName(subjectData);

                box.on('mousemove',function(){
                  fn(this.getName());
                });

                boxGroup.add(box);


                if (week!=3) {
                    boxGroup.add(boxLabel1);
                    boxGroup.add(auditoryLabel1);
                }

                else {
                    boxGroup.add(boxLabel1);
                    boxGroup.add(boxLabel2);
                    boxGroup.add(auditoryLabel1);
                    boxGroup.add(auditoryLabel2);
                }

                if (parseInt(week)!=0)
                    boxGroup.add(weekDevisor);

                this.group.add(boxGroup);
                this.scheduleLayer.add(this.group);

                _y = i % 7 == 0 ? 0 : _y + 90 + 10;
                _x = i % 7 == 0 ? _x + 90 + 10 : _x;
                pr = i% 7 == 0? 1: pr+1;
                day = i%7==0?day+1:day;
            }
            this.scheduleLayer.draw();
        }
        draw(){
            this.scheduleTable.draw();
        }
        elem(pr,day,week) {
            for(var i=0;i<this.shdData.length;i++){
                 if (this.shdData[i].Day == day && this.shdData[i].Number_pr == pr&&week===undefined)
                        return this.shdData[i];
                    else
                        if (this.shdData[i].Day == day && this.shdData[i].Number_pr == pr&& this.shdData[i].Week==week)
                            return this.shdData[i];
                }

            var _d = {"Number_pr":"","Name_pr":"","Name_lector":"","Number_aud":"","Week":0};
            return _d;
        }

        testElem(pr,day,week) {
            for(var i=0;i<this.shdData.length;i++){
                if (this.shdData[i].Day == day && this.shdData[i].Number_pr == pr&& this.shdData[i].Week==week)
                    return true;
            }
            return false;
        }
        bells(data){
            for (var i = 0; i < data.length; i++) {
                var timeLabel = this.doElement("label");
                timeLabel.setX(-50);
                timeLabel.setY(25 + i * 90 + i * 10);
                timeLabel.setFontSize(14);
                timeLabel.setText(data[i].Time_start+"\n"+data[i].Time_end);
                this.group.add(timeLabel);
            }
            this.group.draw();
        }
        days(){
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

        clear(){
            this.scheduleLayer.removeChildren();
        }
    }

    let shd = new Shd({
        container: 'container'
        , width: window.innerWidth
        , height: window.innerHeight
    });

    $.get("{{url('/getBellList')}}",function (data) {
        shd.bells(data);
    });

    shd.days();

    function getRasp(a,b,c){
        $.post("{{url('/getRasp2')}}",{
            _token:$("[name='_token']").val(),
            id_Fack:a,
            id_Group:b,
            Course:c
        },function (data) {
            shd.setData(data);
            shd.rasp(function(a){
                    $(".card-content p").html(a);
            });
        });
    }



</script>
<script>

    $(document).ready(function () {
        $.get("{{url('/getFackList')}}",function(data){
            for (var i=0;i<data.length;i++){
                $("#facks").append("<option value='"+data[i].Number+"'>"+data[i].Name+"</option>")
            }
        });

        $("#course, #facks, #groups").change(function(){
            shd.clear();

            if ($("#facks").val()!=null&&$("#groups").val()!=null&&$("#course").val()!=null)
                getRasp(parseInt($("#facks").val()),parseInt($("#groups").val()),parseInt($("#course").val()));

            if ($("#groups").attr("forCourse")!=$("#course").val()||$("#groups").attr("forFacks")!=$("#facks").val()){
                $.post("{{url('/getGroups')}}",{
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