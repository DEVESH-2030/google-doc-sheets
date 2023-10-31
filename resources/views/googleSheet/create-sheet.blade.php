<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"> Add Sheet </button>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Google Doc Sheet</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form  method="POST">
                    <div class="mb-3 mt-3">
                        <label for="first_name">First Name:</label>
                        <input type="first_name" class="form-control" id="first_name" placeholder="Enter first_name"
                            name="first_name" required>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="last_name">Last Name:</label>
                        <input type="last_name" class="form-control" id="last_name" placeholder="Enter last name"
                            name="last_name" required>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email address"
                            name="email" required>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('create-sheet') }}"> <button type="submit" class="btn btn-success">Add</button> </a>
            </div>

        </div>
    </div>
</div>
