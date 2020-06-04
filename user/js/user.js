var G_HID = 0;
$("#hotelList li a").on("click", function name() {
  var id = $(this).data('pdsa-dropdown-val');
  G_HID = id;
  var hotel_db = "Hotel_" + id;
  url = "hoteldetails.php";
  var posting = $.post(url, {
    hotel_id: hotel_db,
    view: "available"
  });



  // Put the results in a div
  posting.done(function (data) {


    myObj = JSON.parse(data);

    $("#availableTable").removeClass('hidden');
    $("#availableTable tbody").empty();

    myObj.forEach(elem => {
      var newRowContent = "<tr><td>" + elem["room_no"] + "</td>" +
        "<td>" + elem["type"] + "</td>" +
        "<td>" + elem["room_type"] + "</td>" +
        "<td>" + elem["room_rent"] + "</td>" +
        "<td>" + "<button class='btn btn-primary book-room' data-toggle='modal' data-target='#bookingModal' data-hotel_db=" + hotel_db + " data-room_no=" + elem["room_no"] + " data-rent=" + elem["room_rent"] + " type='button'>Book</button>" + "</td>" +
        "</tr>";
      $("#availableTable tbody").append(newRowContent);
    });

  });
});

$('.dropdown a').click(function () {
  $('#selected').text($(this).text());
  $('#selected').append("<span  class='caret'></span>");
});


$(document).on("click", ".book-room", function () {
  var rid = $(this).data("room_no");
  var room_no = rid;
  var hotel_name = $('#selected').text();
  var room_rent = $(this).data("rent");
  var email = $("#header").data("email");

  $("#exampleInputHotelName").val(hotel_name);
  $("#exampleInputHotelRoomNo").val(room_no);
  $("#exampleInputRoomRent").val(room_rent);
  $("#exampleInputemail").val(email);


});

$("#roomBooking").submit(function () {
   console.log("vhgfhg")
  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var $form = $(this),
    hotel_name = "Hotel_"+G_HID,
    room_no = $form.find("input[name='roomNo']").val(),
    email = $form.find("input[name='email']").val(),
    check_in = $form.find("input[name='checkin']").val(),
    check_out = $form.find("input[name='checkout']").val(),
    totalAmount = $form.find("input[name='totalAmount']").val(),

    url = "roombooking.php";

  // Send the data using post
  var posting = $.post(url, {
    hotel_id: hotel_name,
    room_no: room_no,
    email: email,
    check_in: check_in,
    check_out: check_out,
    total_amount: totalAmount
  });
  // Put the results in a div
  posting.done(function (data) {

    console.log(data)
    if (data == "New Booking added") {
      // $("#bookingModal").modal('hide');

      alert("Room Booked!");
      $("#generateInvoice").removeClass("invisible");
      
    } else {
      $("#result").empty().append(data);
    }




  });

});

$("#generateInvoice").click(function () {

    
  var hotel_id = G_HID,
    user_email =$("#roomBooking").find("input[name='email']").val(),
    checkIn_date = $("#roomBooking").find("input[name='checkin']").val(),
    checkOut_date = $("#roomBooking").find("input[name='checkout']").val(),
    room_no = $("#roomBooking").find("input[name='roomNo']").val(),

  url = "invoice/invoice.php"
  var posting = $.post(url, {
    hotel_id: hotel_id,
    user_email: user_email,
    rm_no: room_no,
    rm_cin: checkIn_date,
    rm_cout: checkOut_date,
  });

  posting.done(function (data) {
    console.log(data);

    var x = window.open();
    x.document.open();
    x.document.write(data);
    x.document.close();
  });
});



$('#exampleInputcheckout').change(function () {
  var checkoutdate = $(this).val();
  var checkindate = $("#exampleInputcheckin").val();
  var room_rent = $("#exampleInputRoomRent").val();

  var date1 = new Date(checkindate);
  var date2 = new Date(checkoutdate);

  var Difference_In_Time = date2.getTime() - date1.getTime();

  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

  var totalRent = Difference_In_Days * parseInt(room_rent);
  $("#exampleInputAmount").val(totalRent);
});