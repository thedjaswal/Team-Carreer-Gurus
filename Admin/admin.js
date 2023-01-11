
function edit_btn() 
{
    var edit = document.getElementById("Edit_btn");
    var cancel = document.getElementById("Cancel_btn");
    var save = document.getElementById("Save_btn");
    var x = document.getElementById("Edit_btn");
    console.log(x.value);
    
    cancel.style.display = "block";
    save.style.display = "block";
    edit.style.display = "none";

    document.getElementById("Status").readOnly = false;
}

function save_btn() 
{
    var edit = document.getElementById("Edit_btn");
    var cancel = document.getElementById("Cancel_btn");
    var save = document.getElementById("Save_btn");
    
    cancel.style.display = "none";
    save.style.display = "none";
    edit.style.display = "block";
    document.getElementById("Status").readOnly = true;

}
function cancel_btn()
{
    var edit = document.getElementById("Edit_btn");
    var cancel = document.getElementById("Cancel_btn");
    var save = document.getElementById("Save_btn");

    cancel.style.display = "none";
    save.style.display = "none";
    edit.style.display = "block";
    document.getElementById("Status").readOnly = true;
}