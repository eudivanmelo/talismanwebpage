// Mostrar contas criadas em uma lista
function displayGuilds(page = 1){
    var displayData = "true";
    $.ajax({
        url: "guild/guild_display.php",
        type: 'post',
        data: {
            displaySend: displayData,
            page: page
        },
        success: function(result){
            $("#displayGuilds").html(result);
        }
    });
}

// Adicionar novo usuário
function addUser(){
    $.ajax({
        url: "account/account_insert.php",
        type: 'post',
        data: {
            Username: $('#createUsername').val(),
            Email: $('#createEmail').val(),
            Password: $('#createPassword').val(),
            Privilege: $('#createPrivilege').val(),
            TPoints: $('#createTpoints').val()
        },
        success: function(result){
            // Limpar classes atuais
            $('#erroMsg').removeClass("text-danger");
            $('#erroMsg').removeClass("text-success");

            // Verificar retorno
            switch(result){
                case "success":
                    // Adicionar classe e mensagem
                    $('#erroMsg').addClass("text-success");
                    $('#erroMsg').html("New account successfully created!");
                    displayData();
                    break;
                case "existname":
                    // Adicionar classe e mensagem
                    $('#erroMsg').addClass("text-danger");
                    $('#erroMsg').html("Username already exists.");
                    break;
                case "existemail":
                    // Adicionar classe e mensagem
                    $('#erroMsg').addClass("text-danger");
                    $('#erroMsg').html("Email already exists.");
                    break;
                default:
                    // Adicionar classe e mensagem
                    $('#erroMsg').addClass("text-danger");
                    $('#erroMsg').html("An error occurred, please try again later");
                    console.log(result); // Mostrar no console qual o erro
                    break;
            }
        }
    });
}

// Editar conta
function editAccount(id){
    // Carregar dados
    $.post("account/account_update.php", {id:id}, function(data, status){
        var account = JSON.parse(data);

        $("#editUsername").val(account.name);
        $("#editEmail").val(account.email);
        $("#editPassword").val(account.pwd);
        $("#editTpoints").val(account.gd);
        $('#editPrivilege').val(account.pv).change();
        
        $("#editAccount").modal('show');
    })  
}

// Deletar conta
function deleteAccount(id, confirm = false){
    if (confirm){
        $.post("account/account_delete.php", {id:id}, function(data, status){
            $('#deleteAccount').modal('hide');
            displayData();
        });
    }else{
        $('#deleteAccount').modal('show');
        $('#deleteConfirm').attr("onclick", "deleteAccount(" + id + ", true)")
    }
}