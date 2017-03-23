<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Админ</h2>
    <p> </p>

    <ul class="nav nav-tabs" class="main-menu">
        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
        <li><a data-toggle="tab" href="#menu1">Расписание</a></li>
        <li><a data-toggle="tab" href="#menu2">Факультеты</a></li>
        <li><a data-toggle="tab" href="#menu3">Группы</a></li>
        <li><a data-toggle="tab" href="#menu4">Звонки</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>HOME</h3>
            <p>
            <?php $__currentLoopData = $fucks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>This is Name <?php echo e($fuck->Name); ?></p>
                <p>This is Number <?php echo e($fuck->Number); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div id="menu1" class="tab-pane fade">
            <button type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal-1">Редактирование</button>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>id_Fack</th>
                    <th>id_Group</th>
                    <th>Course</th>
                    <th>Name_pr</th>
                    <th>Number_pr</th>
                    <th>Name_lector</th>
                    <th>Number_aud</th>
                    <th>Day</th>
                    <th>Week</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $rasps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rasp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($rasp->id); ?></td>
                        <td><?php echo e($rasp->id_Fack); ?></td>

                        <td><?php echo e($rasp->id_Group); ?></td>
                        <td><?php echo e($rasp->Course); ?></td>
                        <td><?php echo e($rasp->Name_pr); ?></td>
                        <td><?php echo e($rasp->Number_pr); ?></td>
                        <td><?php echo e($rasp->Name_lector); ?></td>
                        <td><?php echo e($rasp->Number_aud); ?></td>
                        <td><?php echo e($rasp->Day); ?></td>
                        <td><?php echo e($rasp->Week); ?></td>
                        <td><a href="<?php echo e(url("admin/raspDel/".$rasp->id)); ?>#menu1">del</a></td>
                        <td><a href="#" data-toggle="modal" onclick="currentEditRasp(<?php echo e($rasp); ?>)" data-target="#myModal-1">Редактирование</a></td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
        <div id="menu2" class="tab-pane fade">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-2">Редактирование</button>


            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Kurs</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $fucks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($fuck->id); ?></td>
                        <td><?php echo e($fuck->Number); ?></td>
                        <td><?php echo e($fuck->Name); ?></td>
                        <td><?php echo e($fuck->Kurs); ?></td>
                        <td><a href="<?php echo e(url("admin/facultDel/".$fuck->id)); ?>#menu2">del</a></td>
                        <td><a href="#" data-toggle="modal" onclick="currentEditFack(<?php echo e($fuck); ?>)" data-target="#myModal-2">Редактирование</a></td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>

        </div>
        <div id="menu3" class="tab-pane fade">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-3">Редактирование</button>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>id_Fack</th>
                    <th>Name_group</th>
                    <th>Course</th>
                </tr>
                </thead>
                <tbody>
                 <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($group->id); ?></td>
                    <td><?php echo e($group->id_Fack); ?></td>

                    <td><?php echo e($group->Name_group); ?></td>
                    <td><?php echo e($group->Course); ?></td>
                    <td><a href="<?php echo e(url("admin/groupDel/".$group->id)); ?>#menu3">del</a></td>
                    <td><a href="#" data-toggle="modal" onclick="currentEditGroup(<?php echo e($group); ?>)" data-target="#myModal-3">Редактирование</a></td>

                </tr>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
        </div>
        <div id="menu4" class="tab-pane fade">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-4">Редактирование</button>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Time</th>
                    <th>Number_pr</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $bells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bell->id); ?></td>
                        <td><?php echo e($bell->Time); ?></td>
                        <td><?php echo e($bell->Number_pr); ?></td>
                        <td><a href="<?php echo e(url("admin/bellDel/".$bell->id)); ?>#menu4">del</a></td>
                        <td><a href="#" data-toggle="modal" onclick="currentEditBell(<?php echo e($bell); ?>)" data-target="#myModal-4">Редактирование</a></td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Окно редактирования</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url("admin/raspModify")); ?>#menu1" method="post">
                    <div class="form-group">
                        <label for="id">Id:</label>
                        <input type="hidden"  class="form-control" id="rasp_id" placeholder="Введите id" name="rasp_id">
                    </div>
                    <div class="form-group">
                        <label for="rasp_idfack">Id_Fack:</label>
                        <input type="text" class="form-control" id="rasp_idfack" placeholder="Введите id факультета" name="rasp_idfack">
                    </div>
                    <div class="form-group">
                        <label for="id_group">Id_Group:</label>
                        <input type="text" class="form-control" id="rasp_idgroup" placeholder="Введите id группы" name="rasp_idgroup">
                    </div>
                    <div class="form-group">
                        <label for="Course">Course:</label>

                        <select class="form-control" name="rasp_course" id="rasp_course">
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($group->Course); ?>"><?php echo e($group->Course); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name_pr">Name_pr:</label>
                        <input type="text" class="form-control" id="rasp_namepr" placeholder="Введите название предмета" name="rasp_namepr">
                    </div>
                    <div class="form-group">
                        <label for="number_pr">Number_pr:</label>
                        <input type="text" class="form-control" id="rasp_namberpr" placeholder="Введите номер предмета" name="rasp_numberpr">
                    </div>
                    <div class="form-group">
                        <label for="name_lector">Name_lector:</label>
                        <input type="text" class="form-control" id="rasp_namelector" placeholder="Введите имя лектора" name="rasp_namelector">
                    </div>
                    <div class="form-group">
                        <label for="mumber_aud">Number_aud:</label>
                        <input type="text" class="form-control" id="rasp_numberaud" placeholder="Введите номер аудитории" name="rasp_numberaud">
                    </div>
                    <div class="form-group">
                        <label for="Day">Day:</label>
                        <input type="text" class="form-control" id="rasp_day" placeholder="Введите день недели" name="rasp_day">
                    </div>
                    <div class="form-group">
                        <label for="Week">Week:</label>
                        <input type="text" class="form-control" id="rasp_week" placeholder="Введите неделю" name="rasp_week">
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-default">Сохранить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal-2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Окно редактирования</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url("admin/facultModify")); ?>#menu2" method="post">

                    <div class="form-group">
                        <label for="Id">Id:</label>
                        <input type="hidden"  class="form-control" id="fack_id" name="fack_id" placeholder="Введите id факультета">
                    </div>
                    <div class="form-group">
                        <label for="Number">Number:</label>
                        <input type="number" class="form-control" id="fack_number" name="fack_number" placeholder="Введите номер факультета">
                    </div>
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" id="fack_name" name="fack_name" placeholder="Введите название факультета">
                    </div>
                    <div class="form-group">
                        <label for="Name">Kurs:</label>
                        <input type="text" class="form-control" id="fack_kurs" name="fack_kurs" placeholder="Введите курс">
                    </div>
                   <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-default">Сохранить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal-3" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Окно редактирования</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url("admin/groupModify")); ?>#menu3" method="post">

                    <div class="form-group">
                        <label for="id">Id:</label>
                        <input type="hidden"  class="form-control" id="group_id" name="group_id" placeholder="Введите id группы">
                    </div>

                    <div class="form-group">
                        <label for="id_Fack">Id_Fack:</label>
                        <select id="id_Fack" name="id_Fack" class="form-control">
                            <?php $__currentLoopData = $fucks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fuck->id); ?>"><?php echo e($fuck->Name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Name_group">Name_group:</label>
                        <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Введите название группы">
                    </div>
                    <div class="form-group">
                        <label for="Course">Course:</label>
                        <input type="text" class="form-control" id="group_course" placeholder="Введите номер курса" name="group_course">
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-default">Сохранить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal-4" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Окно редактирования</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url("admin/bellModify")); ?>#menu4" method="post">
                    <div class="form-group">
                        <label for="Id">Id:</label>
                        <input type="hidden" class="form-control" id="bell_id" name="bell_id" placeholder="Введите id группы">
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="text" class="form-control" id="bell_time" name="bell_time" placeholder="Введите время звонка">
                    </div>
                    <div class="form-group">
                        <label for="number_pr">Number_pr:</label>
                        <input type="number" class="form-control" id="bell_numberpr" name="bell_numberpr" placeholder="Введите номер предмета">
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-default">Сохранить</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>


<script>



    function currentEditFack(fuck){
        $("#fack_id").val(fuck.id);
        $("#fack_name").val(fuck.Name);
        $("#fack_kurs").val(fuck.Kurs);
        $("#fack_number").val(fuck.Number);
    }

    function currentEditGroup(group){
        $("#group_id").val(group.id);
        $("#group_name").val(group.Name_group);
        $("#id_Fack").val(group.id_Fack);
        $("#rasp_course").val(group.Course);
    }

    function currentEditBell(bell){
        $("#bell_id").val(bell.id);
        $("#bell_numberpr").val(bell.Number_pr);
        $("#bell_time").val(bell.Time);

    }

    function currentEditRasp(rasp){
        $("#rasp_id").val(rasp.id);
        $("#rasp_day").val(rasp.Day);
        $("#rasp_idfack").val(rasp.id_Fack);
        $("#rasp_idgroup").val(rasp.id_Group);
        $("#rasp_namberpr").val(rasp.Number_pr);
        $("#rasp_namelector").val(rasp.Name_lector);
        $("#rasp_namepr").val(rasp.Name_pr);
        $("#rasp_numberaud").val(rasp.Number_aud);
        $("#rasp_week").val(rasp.Week);
    }


    $(document).ready(function(){
        $("a[href='"+window.location.hash+"']").click();
        $("button[data-toggle='modal']").click(function(){
                $("form").trigger('reset');
        });
    });
</script>

</body>
</html>
