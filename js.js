$(function () {
    login();
    deleteTransakcija();
    findTransakcija();
    sortTransakcijeByIznos();
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


function sortTransakcijeByIznos() {

    $(document).on('click', 'th', function () {

        if (($(this).attr("sortiranje"))) {

            $.ajax({
                url: 'ajax/sort_transakcije.php',
                method: 'POST',
                data: {
                    datum: $(this).val(),
                    user_id: localStorage.getItem('user'),
                    sortiranje: $(this).attr("sortiranje")
                },
                success: function (data) {
                    $('#body_tabela').html(data)
                }
            })
        } else {
            alert("Sortiranje je moguce samo po iznosu!")
        }

        $(this).attr("sortiranje") == "DESC" ? $(this).attr("sortiranje", "ASC") : $(this).attr("sortiranje", "DESC")

    })

}