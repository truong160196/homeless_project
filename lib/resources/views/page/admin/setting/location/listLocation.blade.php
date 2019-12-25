<table class="table">
        <thead>
            <tr>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            <tr>
                <td>{{$location->location_name}}</td>
                <td>
                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons btn-delete-location " data-id="{{$location->id}}">close</i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>