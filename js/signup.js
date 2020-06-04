$("#signupForm").submit(function () {
    console.log("asd");
    // Stop form from submitting normally
    event.preventDefault();
  
    // Get some values from elements on the page:
    var $form = $(this),
      name = $form.find("input[name='uname']").val(),
      email = $form.find("input[name='email']").val(),
      password = $form.find("input[name='password']").val(),
      phone_no = $form.find("input[name='phone']").val(),
      address = $form.find("input[name='address']").val(),
  
    url = "./php/signup.php";
  
    // Send the data using post
    var posting = $.post(url, {
      uname: name,
      email: email,
      psw: password,
      phone: phone_no,
      address: address
    });
    // Put the results in a div
    posting.done(function (data) {
      console.log(data);
      myObj = JSON.parse(data);
      if (myObj["error"]){
          alert(myObj["info"]);
      }else{
        alert(myObj["data"]);
      }
    });
  
  });