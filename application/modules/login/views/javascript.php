<script>
var BASE_URL = '<?= base_url() ?>';

$(function(){
    // doLogin();
})

doLogin = () => {

    $.ajax({
        url: BASE_URL + 'login/aksi_login',
        method: 'post',
        data: {
            user_username: $('#user_username').val(),
            user_password: $('#user_password').val()
        },
        success : function(res) {
            res = JSON.parse(res)

            var message = "";
            if(res.message){
                message += "Anda Berhasil Login!"
            }else{
                message += "Login Gagal!"
            }
            Swal.fire({
              title: 'Success !',
              text: message,
              icon: 'success',
              height : "50px",
              width : "30%",
              confirmButtonColor: '#007BFF',
              confirmButtonText: "Ok",
            }).then(function() {
                    window.location = BASE_URL + 'dashboard';
            });
            console.log(res);
        }
    });
}
</script>