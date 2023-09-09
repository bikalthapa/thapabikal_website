 //This program will toggle a button and a div for data view and insert //
  var btn = document.getElementById("double_btn");
  var input_field = document.getElementById("input_field");
  var output_field = document.getElementById("output_field");
  btn.addEventListener('click',()=>{
  var btn_state = btn.getAttribute("current_mode");
  if(btn_state=="view"){
    btn.innerHTML = "Add Data";
    output_field.style.display = "";
    input_field.style.display = "none";
    btn.setAttribute("current_mode", "edit");
  }else{
    btn.innerHTML = "View Data";
    input_field.style.display = "";
    output_field.style.display = "none";
    btn.setAttribute("current_mode", "view");
  };
  });

  function tut_type(){
    var tut_type = document.getElementById("tut_option");
    var existing_window = document.getElementById("existing_turtorial");
    var new_window = document.getElementById("new_window");
    if(tut_type.value=="existing"){
      existing_window.style.display = "";
      new_window.style.display = "none";
    }else{
      new_window.style.display = "";
      existing_window.style.display = "none";
    }
  }
  