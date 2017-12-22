var json={};
$(document).ready(function(){
    $('#delete').click(function () {
        location.href=json.route;
    });
});
function deleteItem(title, message, route){
    json.title=title;
    json.message=message;
    json.route=route;
    $('#modalTitle').text(json.title);
    $('#modalText').html(json.message);
    $('#deleteDialog').modal();
}