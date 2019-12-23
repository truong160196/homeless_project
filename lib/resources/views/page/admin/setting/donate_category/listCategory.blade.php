
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
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons btn-remove-cate" data-id="{{$category->id}}">close</i>
                    </button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
