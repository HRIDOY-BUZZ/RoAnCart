function isEmail(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 64) && (charCode != 46) && (charCode != 95) && (charCode != 33) && (charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode != 45))
        return false;

    return true;
}

function isAlphaNumSpace(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 64) && (charCode != 46) && (charCode != 95) && (charCode != 33) && (charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode != 32) && (charCode != 45))
        return false;

    return true;
}

function isAddr(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 64) && (charCode != 46) && (charCode != 95) && (charCode != 33) && (charCode > 31 && (charCode < 32 || charCode > 60)))
        return false;

    return true;
}

function isNum(evt) {
    var charCode = evt.which || event.charCode || event.char;
    if ((charCode < 48 || charCode > 57) && (charCode != 43) && (charCode != 45))
        return false;

    return true;
}

$(function() {
    $('#submit_reg').click(function() {
        // alert("Ajax");
        var name = $('#name_reg').val()
        var email = $('#email_reg').val()
        var phone = $('#phone_reg').val()
        var addr = $('#addr_reg').val()
        var password = $('#password_reg').val()
        var con_password = $('#con_password_reg').val()
        var instance2 = M.Modal.getInstance($('#modal2'));

        var mail_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;

        var name_regex = /^[-*(A-Z)*(a-z)*\s*]+$/;

        var phone_regex = /^(\+88)?01[3-9]{1}[0-9]{8}$/;

        if ((name == "") || (email == "") || (phone == "") || (addr == "") || (password == "") || (con_password == "")) {

            $('#reg_error').text("Don't leave the fields blank!");
            // instance2.open();
        } else if (!mail_regex.test(email)) {

            $('#reg_error').text('Enter a valid Email!');
            // instance2.open();
        } else if (!name_regex.test(name)) {

            $('#reg_error').text('Enter a Proper Name!');
            // instance2.open();
        } else if (!phone_regex.test(phone)) {

            $('#reg_error').text('Enter a Valid Contact Number!');
            // instance2.open();
        } else if (password != con_password) {

            $('#reg_error').text("Passwords doesn't match!");
            // instance2.open();
        } else {
            // alert("Ajax");
            $.ajax({
                url: 'backends/register.php',
                type: 'POST',
                data: {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'address': addr,
                    'password': password
                },
                dataType: 'json',
                beforeSend: function() {
                    // $('#my_data').html('<img src="images/ajax-loader.gif" alt="Loading...">');
                    $('#submit_reg').prop("disabled", true);

                },
                success: function(data) {

                    $('#name_reg').val("")

                    $('#email_reg').val("")

                    $('#phone_reg').val("")

                    $('#addr_reg').val("")

                    $('#password_reg').val("")

                    $('#con_password_reg').val("")

                    instance2.close();

                    if (data['code'] == "0") {

                        toggleModal('Error!', data['msg']);

                    } else if (data['code'] == "1") {

                        toggleModal('Success!', data['msg']);

                    }
                    $('#submit_reg').prop("disabled", false);

                }
            });
        }
    })

    $('#login_btn').click(function() {
        var email = $('#email_login').val()
        var password = $('#password_login').val()
        var instance1 = M.Modal.getInstance($('#modal1'));

        var mail_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;

        if ((email == "") || (password == "")) {
            // instance1.open();
            $('#login_error').text("Don't leave the fields blank!");
        } else if (!mail_regex.test(email)) {
            // instance1.open();
            $('#login_error').text('Enter a valid Email!');
            // toggleModal('Error!', 'Enter a valid Email!');
        } else {

            $.ajax({
                url: 'backends/login.php',
                type: 'POST',
                data: {
                    'email': email,
                    'password': password
                },
                dataType: 'json',
                beforeSend: function() {
                    // $('#my_data').html('<img src="images/ajax-loader.gif" alt="Loading...">');
                    $('#login_btn').prop("disabled", true);

                },
                success: function(data) {

                    $('#email_reg').val("")

                    $('#password_reg').val("")

                    instance1.close();

                    if (data['code'] == "0") {

                        toggleModal('Error!', data['msg']);

                    } else if (data['code'] == "1") {

                        toggleModal('Success!', data['msg']);

                        // location.reload(true);
                        setInterval('refreshPage()', 1000);

                    }
                    $('#login_btn').prop("disabled", false);

                }
            });

        }
    })
})

function refreshPage() {
    location.reload(true);
}