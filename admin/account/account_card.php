
<table class="table caption-top align-middle table-sm">
    <!-- title -->
    <div class="row"> 
        <div class="col-sm-6" >
            <h5>Accounts</h5>
        </div>
        <div class="col-sm-6 text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createNewAccount">
                Create new account
            </button>
        </div>
    </div>

    <!-- columns -->
    </thead>
        <tr class="table-dark text-center">
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Privilege</th>
            <th scope="col">T-Points</th>
            <th scope="col">Operations</th>
        </tr>
    </thead>

    <!-- data -->
    <tbody class="text-center" id="displayData">
        
    </tbody>
</table>

<!-- Create New Account Modal -->
<div class="modal fade" id="createNewAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CREATE NEW ACCOUNT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="text-danger text-center mb-3" id="erroMsg">
                    <!-- Aqui ficará mensagem de erro -->
                </div>

                <!-- Form -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="createUsername" placeholder="Username">
                    <label for="createUsername">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="createEmail" placeholder="Email">
                    <label for="createEmail">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="createPassword" placeholder="Password">
                    <label for="createPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="createPrivilege">
                        <option selected value="0">Normal Player</option>
                        <option value="1">Youtuber</option>
                        <option value="2">Streamer</option>
                        <option value="3">MOD</option>
                        <option value="4">MOD</option>
                        <option value="5">MOD</option>
                        <option value="6">MOD</option>
                        <option value="7">MOD</option>
                        <option value="8">MOD</option>
                        <option value="9">Owner</option>
                    </select>
                    <label for="createPrivilege">Privilege</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="createTpoints" value="0" placeholder="T-Points">
                    <label for="createTpoints">T-Points</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addUser()">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
    

    // Mostrar contas criadas em uma lista
    function displayData(){
        var displayData = "true";
        $.ajax({
            url: "account/account_display.php",
            type: 'post',
            data: {
                displaySend: displayData
            },
            success: function(result){
                $("#displayData").html(result);
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
</script>