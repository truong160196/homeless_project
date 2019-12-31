<form class="row" id="form_add_user_donate">
    <input type="hidden" id="donate_id" name="donate_id" value="{{$donate->id}}">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4>User List</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive"
                         style="max-height: 350px; overflow-x: auto"
                            >
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="td-actions text-center">{{$user->username}}</td>
                                        <td class="td-actions text-center">
                                            <a href="https://ropsten.etherscan.io/address/{{$user->address}}" target="_blank">
                                                {{substr($user->address, 0, 10)}}
                                                ...
                                                {{substr($user->address, strlen($user->address) - 10, strlen($user->address))}}
                                            </a>
                                        </td>
                                        <td class="td-actions text-center">
                                            <button
                                                type="button"
                                                data-id="{{$user->id}}"
                                                class="btn btn-info btn-add"
                                                onclick="addUserToDonate({{$user->id}})"
                                            >
                                                <i class="fas fa-plus"></i>
                                                <span class="mg-l-5">Add To Fund</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4>List Fund's User</h4>
                <div class="table-responsive"
                     style="max-height: 350px; overflow-x: auto"
                >
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Hash</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_funds as $user)
                            <tr>
                                <td class="td-actions text-center">{{$user->username}}</td>
                                <td class="td-actions text-center">{{$user->full_name}}</td>
                                <td class="td-actions text-center">
                                    <a href="https://ropsten.etherscan.io/address/{{$user->address}}" target="_blank">
                                        {{substr($user->address, 0, 10)}}
                                        ...
                                        {{substr($user->address, strlen($user->address) - 10, strlen($user->address))}}
                                    </a>
                                </td>
                                <td class="td-actions text-center">
                                    <a href="https://ropsten.etherscan.io/tx/{{$user->hash}}" target="_blank">
                                        {{substr($user->hash, 0, 10)}}
                                        ...
                                        {{substr($user->hash, strlen($user->hash) - 10, strlen($user->hash))}}
                                    </a>
                                </td>
                                <td>{{$user->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
