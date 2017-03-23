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

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {


        }

        ::-webkit-scrollbar-thumb {
            background: firebrick;

        }

        ::-webkit-scrollbar-thumb:hover {
            background:orangered;
        }
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
            overflow-y: scroll;
            height: 450px;
            position: relative;
            padding: 10px;
            box-sizing: border-box;
        }



        .shd {
            height:1000px;
            border:1px red solid;
            width: 100%;
            box-sizing: border-box;
        }

        .shd nav {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom:1px solid whitesmoke;
            padding:0px 10px 0px 10px;
            box-sizing: border-box;
         }

        .shd nav ul li {
            width:90px;
        }

        .middle {
            position: relative;
            width: 100%;
            height: 100vh;
            background: olive;
        }

        .left{
            width: 90px;
            height: auto;
            border:2px solid orange;

        }

        .right {
            width: 200px;
            float:left !important;
            height: 200px;
            border:2px red solid;
        }

    </style>
</head>

<body>
<div class="schedule-component">
    <div class="row">
        <div class="col s12 m12">
            <div class="card ">
                <div class="card-image overflow">
                    <div class="shd">
                            <nav class="row">
                                <ul class="col s12 m12">
                                    <li>ПН</li>
                                    <li>ВТ</li>
                                    <li>СР</li>
                                    <li>ЧТ</li>
                                    <li>ПТ</li>
                                    <li>СБ</li>
                                    <li>ВС</li>
                                </ul>
                            </nav>

                            <div class="row">
                               <div class="col s2 m2">
                                   <ul>
                                       <li>1</li>
                                       <li>1</li>
                                       <li>1</li>
                                       <li>1</li>
                                       <li>1</li>
                                       <li>1</li>
                                       <li>1</li>
                                   </ul>
                               </div>

                                <div class="col s10 m10">
                                    <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
                                    </div>

                                    <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
                                    </div>

                                    <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
                                    </div>
                                </div>

                            </div>
                    </div>

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

</body>

</html>