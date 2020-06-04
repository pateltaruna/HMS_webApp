
// For rooms.php
var grhid = 0;

$('.forRooms a').click(function () {
  $('#selected').text($(this).text());
  var hid = $(this).data("pdsa-dropdown-val");
  console.log(hid);
  grhid = hid;
  $('#selected').append("<span  class='caret'></span>");
  $('#viewBtn').removeClass("hidden");
  $('#booked').attr("data-hid", hid);
  $('#available').attr("data-hid", hid);
  getRevenue(hid);
});

// For revenue
function getRevenue(hid) {

  
  url = "functions.php";
  var posting = $.post(url, {
    hotel_id:hid,
    view: "totalRevenue",
    from:"",
    to:"",
  });

  // Put the results in a div
  posting.done(function (data) {
    console.log(data);
    myObj = JSON.parse(data);
    if (!myObj["error"]){
      console.log("Total Revenue",myObj.data);
      $("#totalRevText").text("Total Revenue : "+myObj.data);
    }else{
      console.log("Total Revenue",myObj.info);
      alert(data.info);
    }

  });

}



$("#booked").click(function() {
  $("#availableTable").addClass('hidden');
  var hid= $("#booked").data("hid");
  console.log("booked");
  // Send the data using post
  url ="viewrooms.php";
  var posting = $.post( url, { hotel_id:grhid,view:"booked" } );
 


  // Put the results in a div
  posting.done(function( data ) {
    
    myObj = JSON.parse(data);
    console.log(myObj)

    $("#bookingTable").removeClass('hidden');
    $("#bookingTable tbody").empty();
    
    myObj.forEach(elem => {
      var newRowContent = "<tr><td>"+elem["room_no"]+"</td>"+
                            "<td>"+elem["name"]+"</td>"+
                            "<td>"+elem["check_in"]+"</td>"+
                            "<td>"+elem["check_out"]+"</td>"+
                            "<td>"+elem["total_amt"]+"</td>"+
                          "</tr>";
      $("#bookingTable tbody").append(newRowContent);
    });      
  });


});
$("#available").click(function() {
  $("#bookingTable").addClass('hidden');

  var hid= $("#available").data("hid");
  console.log("available",hid);
  // Send the data using post
  url ="viewrooms.php";
  var posting = $.post( url, { hotel_id:grhid,view:"available" } );
 


  // Put the results in a div
  posting.done(function( data ) {

    myObj = JSON.parse(data);
    console.log("available",data);

    $("#availableTable").removeClass('hidden');
    $("#availableTable tbody").empty();
    
    myObj.forEach(elem => {
      var newRowContent = "<tr><td>"+elem["room_no"]+"</td>"+
                            "<td>"+elem["type"]+"</td>"+
                            "<td>"+elem["room_type"]+"</td>"+
                            "<td>"+elem["room_rent"]+"</td>"+
                          "</tr>";
      $("#availableTable tbody").append(newRowContent);
    });
    
  });


});



// For Home.php
var ghhid = 0
$('.forManager a').click(function () {
  $('#selected').text($(this).text());
  var hid = $(this).data("pdsa-dropdown-val");
  ghhid = hid;
  $('#selected').append("<span  class='caret'></span>");
});



$("#addManger").submit(function () {

  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var $form = $(this),
    name = $form.find("input[name='name']").val(),
    email = $form.find("input[name='email']").val(),
    password = $form.find("input[name='password']").val(),
    phone_no = $form.find("input[name='phone']").val(),
    address = $form.find("input[name='address']").val(),
    hotel_id = ghhid;

  console.log(name, email, phone_no, address, hotel_id)
  url = "addmanager.php";

  // Send the data using post
  var posting = $.post(url, {
    hotel_id: hotel_id,
    name: name,
    email: email,
    password: password,
    phone_no: phone_no,
    address: address
  });
  // Put the results in a div
  posting.done(function (data) {
    console.log(data);

    if (data == "New manager added") {
      $("#managerModal").modal('hide');
      alert("Manager added!")
      populateViewManagerTable();
    } else {
      $("#result").empty().append(data);
    }


  });

});


$("#viewmanagerbtn").click(function(){
  
  populateViewManagerTable();
  
});

$(document).on("click",".view-manager", function () {
  var email = $(this).data("email");
  var url="rmvmanager.php";
  // Send the data using post
  var posting = $.post(url, { email: email });

  // Put the results in a div
  posting.done(function (data) {

   console.log(data);
   if(data =="Manager Removed"){
      populateViewManagerTable();
   }
   
  
  });  
});

function populateViewManagerTable() {
  var url="viewmanager.php";
  // Send the data using post
  var posting = $.post(url, { view: "manager" });

  // Put the results in a div
  posting.done(function (data) {

    myObj = JSON.parse(data);
      console.log(myObj)

      $("#viewManagerTable").removeClass('hidden');
      $("#viewManagerTable tbody").empty();
      
      myObj.forEach(elem => {
        var newRowContent = "<tr><td>"+elem["name"]+"</td>"+
                              "<td>"+elem["email"]+"</td>"+
                              "<td>"+elem["phone"]+"</td>"+
                              "<td>"+elem["hname"]+"<br>"+elem["location"]+"</td>"+
                              "<td>"+"<button class='btn btn-primary view-manager'   data-email="+elem["email"]+"  type='button'>Remove</button>"+"</td>"+
                            "</tr>";
        $("#viewManagerTable tbody").append(newRowContent);
      });
  
  });
}