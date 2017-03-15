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
        @foreach ($rasps as $rasp)
        <tr>
            <td>{{ $rasp->id }}</td>
            <td>{{ $rasp->id_Fack}}</td>

            <td>{{ $rasp->id_Group }}</td>
            <td>{{ $rasp->Course }}</td>
            <td>{{ $rasp->Name_pr }}</td>
            <td>{{ $rasp->Number_pr }}</td>
            <td>{{ $rasp->Name_lector }}</td>
            <td>{{ $rasp->Number_aud }}</td>
            <td>{{ $rasp->Day }}</td>
            <td>{{ $rasp->Week }}</td>
            <td><a href="{{ url("admin/raspDel/".$rasp->id) }}#menu1">del</a></td>
            <td><a href="#" data-toggle="modal" onclick="currentEditRasp({{ $rasp }})" data-target="#myModal-1">Редактирование</a></td>

        </tr>

        @endforeach
        </tbody>
    </table>

</div>