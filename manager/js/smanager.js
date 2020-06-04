$("#addStaff").submit(function (event) {

  // Stop form from submitting normally
  event.preventDefault();
  console.log("qdwef");
  // Get some values from elements on the page:
  var $form = $(this),
    name = $form.find("input[name='name']").val(),
    email = $form.find("input[name='email']").val(),
    phone = $form.find("input[name='phone']").val(),
    address = $form.find("input[name='address']").val(),
    url = $form.attr("action");

  // Send the data using post
  var posting = $.post(url, {
    name: name,
    email: email,
    phone: phone,
    address: address
  });

  // Put the results in a div
  posting.done(function (data) {
    var content = data;
    console.log(data);
    $("#result").empty().append(data);
  });
});


$("#vsbtn").click(function () {
  // Send the data using post
  populateViewStaffTable();
});

$(document).on("click", ".view-staff", function () {
  var email = $(this).data("email");
  var url = "rmvstaff.php";
  // Send the data using post
  var posting = $.post(url, {
    email: email
  });

  // Put the results in a div
  posting.done(function (data) {

    console.log(data);
    if (data == "Staff Removed") {
      populateViewStaffTable();
    }


  });
});


$("#booked").click(function () {
  $("#availableTable").addClass('hidden');
  console.log("booked");
  // Send the data using post
  url = "viewrooms.php";
  var posting = $.post(url, {
    view: "booked"
  });



  // Put the results in a div
  posting.done(function (data) {
    myObj = JSON.parse(data);
    console.log(myObj)

    $("#bookingTable").removeClass('hidden');
    $("#bookingTable tbody").empty();

    myObj.forEach(elem => {
      var newRowContent = "<tr><td>" + elem["room_no"] + "</td>" +
        "<td>" + elem["name"] + "</td>" +
        "<td>" + elem["check_in"] + "</td>" +
        "<td>" + elem["check_out"] + "</td>" +
        "<td>" + elem["total_amt"] + "</td>" +
        "</tr>";
      $("#bookingTable tbody").append(newRowContent);
    });
  });


});

$("#available").click(function () {
  $("#bookingTable").addClass('hidden');
  console.log("available");
  // Send the data using post
  url = "viewrooms.php";
  var posting = $.post(url, {
    view: "available"
  });



  // Put the results in a div
  posting.done(function (data) {

    myObj = JSON.parse(data);
    console.log("available", data);

    $("#availableTable").removeClass('hidden');
    $("#availableTable tbody").empty();

    myObj.forEach(elem => {
      var newRowContent = "<tr><td>" + elem["room_no"] + "</td>" +
        "<td>" + elem["type"] + "</td>" +
        "<td>" + elem["room_type"] + "</td>" +
        "<td>" + elem["room_rent"] + "</td>" +
        "</tr>";
      $("#availableTable tbody").append(newRowContent);
    });

  });


});


$("#available").click(function () {
  $("#bookingTable").addClass('hidden');
  console.log("available");
  // Send the data using post
  url = "viewrooms.php";
  var posting = $.post(url, {
    view: "available"
  });



  // Put the results in a div
  posting.done(function (data) {

    myObj = JSON.parse(data);
    console.log("available", data);

    $("#availableTable").removeClass('hidden');
    $("#availableTable tbody").empty();

    myObj.forEach(elem => {
      var newRowContent = "<tr><td>" + elem["room_no"] + "</td>" +
        "<td>" + elem["type"] + "</td>" +
        "<td>" + elem["room_type"] + "</td>" +
        "<td>" + elem["room_rent"] + "</td>" +
        "</tr>";
      $("#availableTable tbody").append(newRowContent);
    });

  });


});


// For revenue
$("#revenue").click(function () {
  
  url = "functions.php";
  var posting = $.post(url, {
    view: "totalRevenue",
    from:"",
    to:"",
  });

  // Put the results in a div
  posting.done(function (data) {
    myObj = JSON.parse(data);
    if (!myObj["error"]){
      console.log("Total Revenue",myObj.data);
      $("#totalRevText").text("Total Revenue : "+myObj.data);
    }else{
      console.log("Total Revenue",myObj.info);
      alert(data.info);
    }
    

  });


});



function populateViewStaffTable() {
  url = "viewstaff.php";
  var posting = $.post(url, {
    view: "staff"
  });



  // Put the results in a div
  posting.done(function (data) {

    myObj = JSON.parse(data);
    $("#staffTable").removeClass('invisible');
    $("#staffTable tbody").empty();

    myObj.forEach(elem => {
      var newRowContent = "<tr><td>" + elem["name"] + "</td>" +
        "<td>" + elem["email"] + "</td>" +
        "<td>" + elem["phone"] + "</td>" +
        "<td>" + elem["address"] + "</td>" +
        "<td>" + "<button class='btn btn-primary view-staff' data-email=" + elem["email"] + "  type='button'>Remove</button>" + "</td>" +
        "</tr>";
      $("#staffTable tbody").append(newRowContent);
    });

  });


}