
<!-- title -->
<div class="row p-1"> 
        <div class="col-sm-6" >
            <h5 class="m-1">Accounts</h5>
        </div>
        <div class="col-sm-6 text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#createNewAccount">
                Create new account
            </button>
        </div>
    </div>
    
<table class="table table-striped caption-top align-middle table-sm">
    <!-- columns -->
    </thead>
        <tr class="table-dark text-white text-center">
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Privilege</th>
            <th scope="col">T-Points</th>
            <th scope="col">Operations</th>
        </tr>
    </thead>

    <!-- data -->
    <tbody class="text-center" id="displayData">
        <tr>
            <td colspan="5">There is no registered account</td>
        </tr>
    </tbody>
</table>

<!-- pagination -->
<div class="row m-0"> 
    <div class="col-sm-6" >
        <small class="m-1 text-secondary">Total of 0 registered accounts</small>
    </div>
    <div class="col-sm-6">
        <ul class="pagination pagination-sm justify-content-end">
            <li class="page-item active" aria-current="page"><span class="p-1">1</span></li>
            <li class="page-item"><a class="link-secondary p-1 text-decoration-none" href="#">2</a></li>
            <li class="page-item"><a class="link-secondary p-1 text-decoration-none" href="#">3</a></li>
        </ul>
    </div>
</div>

<!-- Create New Account Modal -->
<div class="modal fade" id="createNewAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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
                        <option value="4">DESIGN</option>
                        <option value="5">SCRIPTER</option>
                        <option value="6">DEV</option>
                        <option value="7">BD</option>
                        <option value="8">GM</option>
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

<!-- Edit Account Modal -->
<div class="modal fade" id="editAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">ACCOUNT UPDATE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="text-danger text-center mb-3" id="erroMsg">
                    <!-- Aqui ficará mensagem de erro -->
                </div>

                <!-- Form -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editUsername" placeholder="Username">
                    <label for="editUsername">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="editEmail" placeholder="Email">
                    <label for="editEmail">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="editPassword" placeholder="Password">
                    <label for="editPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="editPrivilege">
                        <option value="0">Normal Player</option>
                        <option value="1">Youtuber</option>
                        <option value="2">Streamer</option>
                        <option value="3">MOD</option>
                        <option value="4">DESIGN</option>
                        <option value="5">SCRIPTER</option>
                        <option value="6">DEV</option>
                        <option value="7">BD</option>
                        <option value="8">GM</option>
                        <option value="9">Owner</option>
                    </select>
                    <label for="editPrivilege">Privilege</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editTpoints" value="0" placeholder="T-Points">
                    <label for="editTpoints">T-Points</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteTitle">DELETE ACCOUNT [ID: 1]</h1>
            </div>

            <div class="modal-body">
            Deleting an account is an irreversible procedure and not recommended, just try banning as a form of punishment. 
            <br>
            <div class="text-danger">Are you sure you want to permanently remove this account?</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
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
</script>