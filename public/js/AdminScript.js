function currentEditFack(fuck){
    $("#fack_id").val(fuck.id);
    $("#fack_name").val(fuck.Name);
    $("#fack_number").val(fuck.Number);
}

function currentEditGroup(group){
    $("#group_id").val(group.id);
    $("#group_name").val(group.Name_group);
    $("#id_Fack").val(group.id_Fack);
    $("#group_course").val(group.Course);
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
});/**
 * Created by exxxa on 14.03.2017.
 */
