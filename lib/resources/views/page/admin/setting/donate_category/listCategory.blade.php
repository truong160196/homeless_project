
<table class="table">
        <thead>
        <tr>
            <th>Activity</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->category_name}}</td>
                <td>
                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons btn-edit-cate" data-id="{{$category->id}}" data-name="{{$category->category_name}}" data-detail="{{$category->category_detail}}">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons btn-remove-cate" data-id="{{$category->id}}">close</i>
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
