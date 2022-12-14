
<!-- title -->
<div class="row p-1"> 
    <div class="col-sm-6" >
        <h5 class="m-1">Guilds</h5>
    </div>
    <div class="col-sm-6 text-end">
        <!-- Button trigger modal -->
        <button type="button" disabled class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#createNewAccount">
            Create new guild
        </button>
    </div>
</div>

<!-- content -->
<div id="displayGuilds">

</div>

<!-- Create New Guild Modal -->
<div class="modal fade" id="createNewGuild" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CREATE NEW GUILD</h1>
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

<!-- Edit Guild Modal -->
<div class="modal fade" id="editGuild" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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

<!-- Delete Guild Modal -->
<div class="modal fade" id="deleteGuild" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">DELETE ACCOUNT</h1>
            </div>

            <div class="modal-body">
            Deleting an account is an irreversible procedure and not recommended, just try banning as a form of punishment. 
            <br>
            <div class="text-danger">Are you sure you want to permanently remove this account?</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="deleteConfirm" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="guild/js/operations.js"></script>