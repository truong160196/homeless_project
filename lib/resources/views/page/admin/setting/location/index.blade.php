<div class="content-body">
    <div class="button-actions">
        <button
            type="button"
            class="btn btn-info"
            id="btn_create_user"
        >
            <i class="material-icons">add_box</i> Create New Location
        </button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sign contract for "What are conference organizers afraid of?"</td>
                <td class="td-actions text-right">
                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@include('page.admin.setting.location.modalCreateLocation')
