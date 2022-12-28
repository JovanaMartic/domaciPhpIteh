$(function () {
    login();
    deleteTransakcija();
    findTransakcija();
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


function findTransakcija() {

    $(document).on('keyup', '#datum_input', function () {

        $.ajax({
            url: 'ajax/find_transakcija.php',
            method: 'POST',
            data: {
                datum: $(this).val(),
                user_id: localStorage.getItem('user')
            },
            success: function (data) {
                $('#body_tabela').html(data)
            }
        })
    })

}