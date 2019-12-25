<table class="table">
        <thead>
        <tr>
            <th>Activity</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activities as $activity)
            <tr>
                <td>{{$activity->activity_name}}</td>
                <td>
                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons btn-edit-activity" data-id="{{$activity->id}}" data-name="{{$activity->activity_name}}" data-detail="{{$activity->activity_detail}}">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons btn-delete-activity" data-id="{{$activity->id}}">close</i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>