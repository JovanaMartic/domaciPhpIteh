$(function () {
    login();
    deleteTransakcija();
});

function login() {

    $(document).on('click', '#loginbutton', function () {

        $.ajax({
            url: 'ajax/login.php',
            method: 'POST',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            success: function (data) {
                data = JSON.parse(data)

                if (data.result == 1) {
                    alert("Uspesan login!")
                    localStorage.setItem('user', data.user)
                    window.location.href = "transakcije.php";
                }
                else {
                    alert("Neuspesan login!")
                }
            }
        })
    })

}



function deleteTransakcija() {

    $(document).on('click', '#delete_transakcijabutton', function () {

        $.ajax({
            url: 'ajax/delete_transakcija.php',
            method: 'POST',
            data: {
                transakcija_id: $(this).attr('transakcija_id'),
            }
        })
    })

}