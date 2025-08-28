<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
?>  
      
<?php if ($page == 'calendar.php') {   ?>
    <!-- Add Event -->
    <div class="modal fade" id="add_new">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-dark modal-title fw-bold">Add Event</h4>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="calendar.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Event Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Event Type <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Green</option>
                                        <option>Blue</option>
                                        <option>Red</option>
                                        <option>Yellow</option>
                                        <option>Orange</option>
                                        <option>Cyan</option>
                                        <option>Teal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">From</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">To</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Description</label>
                                    <textarea rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Event -->

    <!-- Start Event -->
    <div class="modal fade" id="event_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-dark modal-title fw-bold"><span id="eventTitle"></span></h4>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti titi ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-1">Project Kickoff – Mobile App Redesign</h6>
                    <p class="mb-3">Introductory meeting to outline goals, timelines, roles, and milestones for the redesign project.</p>
                    <span class="fw-semibold mb-1 d-block">Event Date</span>
                    <p class="mb-0">17 July 2025</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Event -->
<?php }?>  

<?php if ($page == 'todo.php') {   ?> 
    <!-- Add Todo -->
    <div class="modal fade" id="add_todo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add To Do</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="todo.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Inprogress</option>
                                        <option>On Hold</option>
                                        <option>Pending</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Created Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="snow-editor"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Select Assignee</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Sophie</option>
                                        <option>Cameron</option>
                                        <option>Doris</option>
                                        <option>Rufana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Todo end -->

    <!-- Edit Todo -->
    <div class="modal fade" id="edit_todo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit To Do</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="todo.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" value="Update calendar and schedule">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Inprogress</option>
                                        <option>On Hold</option>
                                        <option>Pending</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Created Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="snow-editor"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Select Assignee</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Sophie</option>
                                        <option>Cameron</option>
                                        <option>Doris</option>
                                        <option>Rufana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Todo end -->

    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete  this to do?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="todo.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
<?php }?>

<?php if ($page == 'notes.php') {   ?>  
    <!-- Add Note -->
    <div class="modal fade" id="add_note">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Note</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="notes.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Created Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="snow-editor"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Select Assignee</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Sophie</option>
                                        <option>Cameron</option>
                                        <option>Doris</option>
                                        <option>Rufana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add New To Do</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Note end -->

    <!-- Edit Note -->
    <div class="modal fade" id="edit_note">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Note</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="notes.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" value="Meeting with Product Team">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Created Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="snow-editor"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Select Assignee</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Sophie</option>
                                        <option>Cameron</option>
                                        <option>Doris</option>
                                        <option>Rufana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Note end -->

    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this note?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-light me-3" data-bs-dismiss="modal">Cancel</a>
                        <a href="notes.php" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
<?php }?>     

<?php if ($page == 'kanban-view.php') {   ?>  
    <!-- Add Todo -->
    <div class="modal fade" id="add-task">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Task</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="kanban-view.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Task Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>To Do</option>
                                        <option>Inprogress</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Created Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="snow-editor"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Select Assignee</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Sophie</option>
                                        <option>Cameron</option>
                                        <option>Doris</option>
                                        <option>Rufana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Todo end -->

    <!-- Edit Todo -->
    <div class="modal fade" id="edit_task">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="kanban-view.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" value="UI Pages">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>To Do</option>
                                        <option>Inprogress</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Created Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="snow-editor"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Select Assignee</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Sophie</option>
                                        <option>Cameron</option>
                                        <option>Doris</option>
                                        <option>Rufana</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Todo end -->

    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this task?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-light me-3" data-bs-dismiss="modal">Cancel</a>
                        <a href="kanban-view.php" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  --> 
<?php }?>  

<?php if ($page == 'invoice.php') {   ?>
    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this invoice?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-light me-3" data-bs-dismiss="modal">Cancel</a>
                        <a href="invoice.php" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
<?php }?>   

<?php if ($page == 'all-patients-list.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-white position-relative z-1 me-2" data-bs-dismiss="modal">Cancel</a>
                        <a href="patient-details.php" class="btn btn-danger position-relative z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'add-patient.php') {   ?>
    <!-- success modal -->
    <div class="modal fade" id="success_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-success rounded-circle"><i class="ti ti-calendar-check fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Added Successfully</h5>
                    <p class="mb-4">Patient “Hendrita Merkel” has been added to the Patient List</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="patients.php" class="btn btn-outline-light position-relative z-1 w-100">Back To List</a>
                        <a href="patient-details.php" class="btn btn-primary position-relative z-1 w-100">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success modal -->
<?php }?> 

<?php if ($page == 'patient-details-appointments.php') {   ?>
    <!-- Start edit Modal -->
    <div id="edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Edit Appointment</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="patient-details-appointments.php">
                    <div class="modal-body pb-0">                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>In Patient</option>
                                        <option>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Anaesthesiology</option>
                                        <option>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Dr. Andrew Clark</option>
                                        <option>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Preferred Mode of Consultation<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>In-Person</option>
                                        <option>Video</option>
                                        <option>Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" value="10:00 AM">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">End Time</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" value="11:00 AM">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" type="text" value="Fever, Headache">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Quick Notes</label>
                                    <textarea class="form-control" rows="4">Provide detailed instructions on how to use prescribed medications. Include dosage, frequency, and any specific application guidelines.</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option selected>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End edit Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white position-relative z-1 w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-danger position-relative z-1 w-100" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Appointment Details</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0);" class="avatar flex-shrink-0">
                                <img src="assets/img/avatars/avatar-31.jpg" class="rounded" alt="patient">
                            </a>
                            <div class="ms-2">
                                <div>
                                    <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="javascript:void(0);">Gifford</a></h6>
                                    <p class="fs-13 mb-0">Patient</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="badge badge-soft-purple">Upcoming</span>
                        </div>
                    </div>  
                    <div class="row mb-3 row-gap-3">
                        <div class="col-sm-12">
                            <h6 class="mb-1">Date & Time</h6>
                            <p class="text-dark mb-1">$500 / 1 Hr</p>
                            <p class="fs-13 mb-0">24 Jan 2024, 09:00 AM to 10:00 PM</p>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="mb-1">Consultation With</h6>
                            <p class="text-dark mb-1">Dr. Laird</p>
                            <p class="fs-13 mb-0">Dermatologist</p>
                        </div>
                    </div>
                    <h6 class="mb-1">Reason</h6>
                    <p class="mb-3">Fever, Stomach pain, Drowsiness</p>
                    <h6 class="mb-1">Notes</h6>
                    <p class="mb-0">Provide detailed instructions on how to use prescribed medications. Include dosage, frequency, and any specific application guidelines.</p>
                </div>
                <div class="modal-footer d-flex align-items-center gap-1">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                    <a href="appointment-consultation.php" class="btn btn-primary">Start Consultation</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?> 

<?php if ($page == 'patient-details-vital-signs.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100 position-relative z-1" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-danger w-100 position-relative z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Vital  Details</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row row-gap-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-droplet fs-16"></i></span>
                                <div>
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Blood Pressure</h6>
                                    <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate"><i class="ti ti-point-filled me-1 text-success fs-18"></i>100/67 mmHg</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-heart-rate-monitor fs-16"></i></span>
                                <div>
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Heart Rate</h6>
                                    <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate"><i class="ti ti-point-filled me-1 text-danger fs-18"></i>89 Bpm</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-hexagons fs-16"></i></span>
                                <div>
                                    <h6 class="fs-14 fw-semibold mb-1">SPO2</h6>
                                    <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate"><i class="ti ti-point-filled me-1 text-success fs-18"></i>98 %</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-temperature fs-16"></i></span>
                                <div>
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Temperature</h6>
                                    <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate"><i class="ti ti-point-filled me-1 text-success fs-18"></i>101 C</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-ease-in fs-16"></i></span>
                                <div>
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Respiratory Rate</h6>
                                    <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate"><i class="ti ti-point-filled me-1 text-danger fs-18"></i>24 rpm</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-circuit-switch-open fs-16"></i></span>
                                <div>
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Weight</h6>
                                    <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate"><i class="ti ti-point-filled me-1 text-success fs-18"></i>100 kg</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?> 

<?php if ($page == 'patient-details-visit-history.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-white w-100 position-relative z-1 me-2" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-danger w-100 position-relative z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start edit Modal -->
    <div id="edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Edit Visit</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="patient-details-visit-history.php">
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>In Patient</option>
                                        <option selected>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Anaesthesiology</option>
                                        <option>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Dr. Andrew Clark</option>
                                        <option>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Date of Visit</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" value="16 Jan, 2025">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Time of Visit</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" value="08:17 AM">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" type="text" value="Fever, Headache">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End edit Modal -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Visit History</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center row-gap-3 mb-4">
                        <div class="col-sm-4">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 fs-14 fw-semibold"> Neurology</h6>
                                <p class="mb-0 text-truncate">25 Jan 2024, 09:00 AM</p>                                       
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-1 fs-14 fw-semibold">Patient</h6>
                            <p class="fs-13 mb-0 text-truncate">James Carter</p>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="fs-14 fw-semibold mb-1">Doctor</h6>
                            <p class="fs-13 mb-0 text-truncate">Dr. Andrew Clark</p>
                        </div>
                    </div>
                    <h6 class="mb-2">Reason for Visit</h6>
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span>Fever, Stomach Pain, Drowsiness</span>
                    </div>
                    <h6 class="mb-2">Assessment</h6>
                    <ol class="ps-3 mb-4">
                        <li class="mb-2">Applying a cool compress to the forehead or the back of the neck may provide some relief. Avoid using cold water, as it can cause shivering and may increase body temperature.</li>
                        <li>Keep an eye on the person's symptoms and seek medical attention if the fever persists, is very high, or if there are other concerning symptoms such as difficulty breathing, persistent vomiting, or severe headache.</li>
                    </ol>
                    <h6 class="mb-2">Treatment</h6>
                    <p class="mb-4">1 Multiple Access</p>
                    <h6 class="mb-2">Follow Up</h6>
                    <p class="mb-4">After 3 Months</p>
                    <h6 class="mb-2">Notes</h6>
                    <p class="mb-0">If the fever is accompanied by other worrisome symptoms or if it lasts for more than a few days, it's essential to consult with a healthcare professional. They can provide a proper diagnosis and recommend appropriate treatment.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?> 

<?php if ($page == 'patient-details-lab-results.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white position-relative w-100 z-1" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-danger position-relative w-100 z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">View Report</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">
                    <div class="invoice-logo d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                        <img src="assets/img/logo-dark.svg" alt="logo-dark" class="logo-white">
                        <img src="assets/img/logo.svg" class="logo-dark" alt="logo">
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <h6 class="mb-2">Dream’s Medical Center</h6>
                                <p class="mb-1 text-dark fw-medium">Dr. Sandy Maria</p>
                                <p class="fs-13 mb-0">MD Aerologist. MBBS,MS</p>
                            </div>
                        </div>
                        <div class="text-lg-end">
                            <p class="mb-1"><span class="text-dark fw-medium">Test Type : </span>CBC</p>
                            <p class="mb-1"><span class="text-dark fw-medium">Collected On: </span>25 Jan 2024, 10:00 AM</p>
                            <p class="mb-0"><span class="text-dark fw-medium">Reported On: </span>25 Jan 2024, 11:00 AM</p>
                        </div>
                    </div>
                    <h6 class="mb-1">Patient Details</h6>
                    <div class="mb-4 bg-light rounded p-2 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h6 class="fs-14 fw-medium mb-0">M. Reyan Verol</h6>
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0">28Y /  Male</p>
                            <p class="mb-0">Blood : O+ve</p>
                            <p class="mb-0">Type : Out Patient</p>
                        </div>
                    </div>
                    <h5 class="mb-3">Complete Blood Count(CBC)</h5>
                    <div class="table-responsive table-nowrap rounded border border-bottom-0">
                        <table class="table mb-0 rounded">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-white">Investigation</th>
                                    <th class="text-white">Result</th>
                                    <th class="text-white">Reference Value</th>
                                    <th class="text-white">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h6 class="mb-0 fs-14 fw-semibold">Differntial WBC Count</h6></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Neutrophils</td>
                                    <td>75</td>
                                    <td>50 - 62</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Lymphocytes</td>
                                    <td>90</td>
                                    <td>20 - 40</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Eosinophils</td>
                                    <td>60</td>
                                    <td>00 - 06</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Monocytes</td>
                                    <td>60</td>
                                    <td>00 - 10</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Basophils</td>
                                    <td>95</td>
                                    <td>00 - 02</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td><h6 class="mb-0 fw-semibold fs-14">Platelet Count</h6></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Platelet Count</td>
                                    <td>150000</td>
                                    <td>150000 - 410000</td>
                                    <td>cumm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class=" mt-3 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                        <div>
                            <img src="assets/img/icons/qr-code.svg" alt="qr-code">
                        </div>
                        <div class="text-center">
                            <img src="assets/img/icons/signature.svg" alt="signature" class="signature mb-1">
                            <p class="mb-0">Authorized Sign</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?> 

<?php if ($page == 'patient-details-prescription.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100 position-relative z-1" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-danger w-100 position-relative z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">View Report</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <div class="modal-body">
                    <div class="invoice-logo d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                        <img src="assets/img/logo-dark.svg" alt="logo-dark" class="logo-white">
                        <img src="assets/img/logo.svg" class="logo-dark" alt="logo">
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <h6 class="mb-2">Dream’s Medical Center</h6>
                                <p class="mb-1 text-dark fw-medium">Dr. Sandy Maria</p>
                                <p class="fs-13 mb-0">MD Aerologist. MBBS,MS</p>
                            </div>
                        </div>
                        <div class="text-lg-end">
                            <p class="mb-1"><span class="text-dark fw-medium">Test Type : </span>CBC</p>
                            <p class="mb-1"><span class="text-dark fw-medium">Collected On: </span>25 Jan 2024, 10:00 AM</p>
                            <p class="mb-0"><span class="text-dark fw-medium">Reported On: </span>25 Jan 2024, 11:00 AM</p>
                        </div>
                    </div>
                    <h6 class="mb-1">Patient Details</h6>
                    <div class="mb-4 bg-light rounded p-2 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h6 class="fs-14 fw-medium mb-0">M. Reyan Verol</h6>
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0">28Y /  Male</p>
                            <p class="mb-0">Blood : O+ve</p>
                            <p class="mb-0">Type : Out Patient</p>
                        </div>
                    </div>
                    <h5 class="mb-3">Complete Blood Count(CBC)</h5>
                    <div class="table-responsive table-nowrap rounded border border-bottom-0">
                        <table class="table mb-0 rounded">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-white">Investigation</th>
                                    <th class="text-white">Result</th>
                                    <th class="text-white">Reference Value</th>
                                    <th class="text-white">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h6 class="mb-0 fs-14 fw-semibold">Differntial WBC Count</h6></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Neutrophils</td>
                                    <td>75</td>
                                    <td>50 - 62</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Lymphocytes</td>
                                    <td>90</td>
                                    <td>20 - 40</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Eosinophils</td>
                                    <td>60</td>
                                    <td>00 - 06</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Monocytes</td>
                                    <td>60</td>
                                    <td>00 - 10</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Basophils</td>
                                    <td>95</td>
                                    <td>00 - 02</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td><h6 class="mb-0 fw-semibold fs-14">Platelet Count</h6></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium text-dark">Platelet Count</td>
                                    <td>150000</td>
                                    <td>150000 - 410000</td>
                                    <td>cumm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class=" mt-3 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                        <div>
                            <img src="assets/img/icons/qr-code.svg" alt="img">
                        </div>
                        <div class="text-center">
                            <img src="assets/img/icons/signature.svg" alt="img" class="signature mb-1">
                            <p class="mb-0">Authorized Sign</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?> 

<?php if ($page == 'patient-details-medical-history.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100 position-relative z-1" data-bs-dismiss="modal">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-danger w-100 position-relative z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Medical History</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>                       
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar flex-shrink-0 bg-primary">
                            <i class="ti ti-history fs-16"></i>
                        </div>
                        <div class="ms-2">
                            <div>
                                <h6 class="fw-semibold fs-14 text-truncate mb-1">Throat Pain</h6>
                                <p class="fs-13 mb-0">25 Jan 2024, (2yrs ago)</p>
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-2">Assessment</h6>
                    <ol class="ps-3">
                        <li class="mb-2">Applying a cool compress to the forehead or the back of the neck may provide some relief. Avoid using cold water, as it can cause shivering and may increase body temperature.</li>
                        <li class="mb-4">Keep an eye on the person's symptoms and seek medical attention if the fever persists, is very high, or if there are other concerning symptoms such as difficulty breathing, persistent vomiting, or severe headache.</li>
                    </ol>
                    <h6 class="fw-semibold mb-2">Notes</h6>
                    <p class="mb-0">If the fever is accompanied by other worrisome symptoms or if it lasts for more than a few days, it's essential to consult with a healthcare professional. They can provide a proper diagnosis and recommend appropriate treatment.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?> 

<?php if ($page == 'patients.php') {   ?>
    <!-- Start add Modal -->
    <div id="add_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h4 class="text-dark modal-title fw-bold text-truncate">New Appointment</h4>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="patients.php">
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>In Patient</option>
                                        <option>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Anaesthesiology</option>
                                        <option>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Dr. Andrew Clark</option>
                                        <option>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Preffered Mode of Consultation<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>In-Person</option>
                                        <option>Video</option>
                                        <option>Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" placeholder="-- : -- : --">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">End Time</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" placeholder="-- : -- : --">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" type="text">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Quick Notes</label>
                                    <textarea class="form-control" placeholder="Additional Information" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End add Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-white position-relative z-1 me-2" data-bs-dismiss="modal">Cancel</a>
                        <a href="patient-details.php" class="btn btn-danger position-relative z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'doctors.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-outline-light w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="doctors.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'all-doctors-list.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-outline-light w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="all-doctors-list.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'add-doctors.php') {   ?>
    <!-- success modal -->
    <div class="modal fade" id="success_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-success rounded-circle"><i class="ti ti-calendar-check fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Added Successfully</h5>
                    <p class="mb-4">Doctor “Dr. Andrew Clark” has been added to the Doctors List</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="doctors.php" class="btn btn-outline-light position-relative z-1 w-100">Back To List</a>
                        <a href="doctor-details.php" class="btn btn-primary position-relative z-1 w-100">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success modal -->
<?php }?>

<?php if ($page == 'visits.php') {   ?>
    <!-- Start Add Modal -->
    <div id="add_visit" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Add New Visit</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="visits.php">
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>In Patient</option>
                                        <option>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Anaesthesiology</option>
                                        <option>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Dr. Andrew Clark</option>
                                        <option>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Date of Visit</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Time of Visit</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" placeholder="-- : -- : --">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" id="choices-text-remove-button" data-choices data-choices-limit="3" data-choices-removeItem type="text">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Visit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

    <!-- Start Edit Modal -->
    <div id="edit_visit" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Edit Visit</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="visits.php">
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>In Patient</option>
                                        <option>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Anaesthesiology</option>
                                        <option selected>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Dr. Andrew Clark</option>
                                        <option selected>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Date of Visit</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" value="15 Jan 2025">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Time of Visit</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" placeholder="-- : -- : --" value="10:00 AM">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" id="choices-text-remove-button1" data-choices data-choices-limit="3" data-choices-removeItem type="text" value="Cough, Cold, Fever">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-outline-light w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="visits.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?>   

<?php if ($page == 'appointments.php') {   ?>
    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Appointment Details</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <a href="patient-details.php" class="avatar flex-shrink-0">
                                <img src="assets/img/avatars/avatar-31.jpg" class="rounded" alt="patient">
                            </a>
                            <div class="ms-2">
                                <div>
                                    <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="patient-details.php">Gifford</a></h6>
                                    <p class="fs-13 mb-0">Patient</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="badge badge-soft-purple">Upcoming</span>
                        </div>
                    </div>  
                    <div class="row mb-3 row-gap-3">
                        <div class="col-sm-12">
                            <h6 class="mb-1">Date & Time</h6>
                            <p class="text-dark mb-1">$500 / 1 Hr</p>
                            <p class="fs-13 mb-0">24 Jan 2024, 09:00 AM to 10:00 PM</p>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="mb-1">Consultation With</h6>
                            <p class="text-dark mb-1">Dr. Laird</p>
                            <p class="fs-13 mb-0">Dermatologist</p>
                        </div>
                    </div>
                    <h6 class="mb-1">Reason</h6>
                    <p class="mb-3">Fever, Stomach pain, Drowsiness</p>
                    <h6 class="mb-1">Notes</h6>
                    <p class="mb-0">Provide detailed instructions on how to use prescribed medications. Include dosage, frequency, and any specific application guidelines.</p>
                </div>
                <div class="modal-footer d-flex align-items-center gap-1">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                    <a href="appointment-consultation.php" type="submit" class="btn btn-primary">Start Consultation</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->

    <!-- Start add Modal -->
    <div id="add_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">New Appointment</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="appointments.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>In Patient</option>
                                        <option>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Anaesthesiology</option>
                                        <option>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Dr. Andrew Clark</option>
                                        <option>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Preffered Mode of Consultation<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>In-Person</option>
                                        <option>Video</option>
                                        <option>Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" placeholder="-- : -- : --">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">End Time</label>
                                    <div class="input-icon-end position-relative">
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" placeholder="-- : -- : --">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" type="text">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Quick Notes</label>
                                    <textarea class="form-control" placeholder="Additional Information" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-0">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End add Modal -->

    <!-- Start edit Modal -->
    <div id="edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-truncate">Edit Appointment</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="appointments.php">
                    <div class="modal-body">                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>James Carter</option>
                                        <option>Emily Davis</option>
                                        <option>Michael Johnson</option>
                                        <option>Olivia Miller</option>
                                        <option>David Smith</option>
                                        <option>Sophia Wilson</option>
                                        <option>Daniel Williams</option>
                                        <option>Isabella Anderson</option>
                                        <option>William Brown</option>
                                        <option>Charlotte Taylor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Patient Type</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>In Patient</option>
                                        <option>Out Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Department<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Anaesthesiology</option>
                                        <option>Dental Surgery</option>
                                        <option>Dermatology</option>
                                        <option>ENT Surgery</option>
                                        <option>Ophthalmology</option>
                                        <option>Orthopaedics</option>
                                        <option>Pediatrics </option>
                                        <option>Radiology</option>
                                        <option>Cardiology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Doctor<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>Dr. Andrew Clark</option>
                                        <option>Dr. Katherine Brooks</option>
                                        <option>Dr. Benjamin Harris</option>
                                        <option>Dr. Laura Mitchell</option>
                                        <option>Dr. Christopher Lewis</option>
                                        <option>Dr. Natalie Foster</option>
                                        <option>Dr. Jonathan Adams</option>
                                        <option>Dr. Rebecca Scott</option>
                                        <option>Dr. Samuel Turner</option>
                                        <option>Dr. Victoria Evans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Preffered Mode of Consultation<span class="text-danger ms-1">*</span></label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>In-Person</option>
                                        <option>Video</option>
                                        <option>Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" value="15 Jun, 2025">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Start Time</label>
                                    <div class="input-icon-end position-relative">
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" value="10:00 AM">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">End Time</label>
                                    <div class="input-icon-end position-relative">  
                                        <input type="text" class="form-control form-control" data-provider="timepickr" data-time-basic="true" value="11:00 AM">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock-hour-10 text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <input class="form-control" type="text" value="Fever, Headache">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Quick Notes</label>
                                    <textarea class="form-control" rows="4">Provide detailed instructions on how to use prescribed medications. Include dosage, frequency, and any specific application guidelines.</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-0">
                                    <label class="form-label">Mode of Payment</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option selected>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End edit Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="appointments.php" class="btn btn-danger w-100" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?>

<?php if ($page == 'contact-list.php') {   ?>
    <!-- Add Contact -->
    <div class="modal fade" id="add_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Contact</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="contact-list.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <textarea rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Contact End -->

    <!-- Edit Contact -->
    <div class="modal fade" id="edit_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Contact</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="contact-list.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="Melinda Allman">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="+41 45879 2548">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="melindaallaman@example.com">
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <textarea rows="4" class="form-control">User friendly design makes it easy to learn and navigate, even for those new to digital records.</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Contact end -->

    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="contact-list.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
<?php }?> 

<?php if ($page == 'contacts.php') {   ?>
    <!-- Add Contact -->
    <div class="modal fade" id="add_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Contact</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="contacts.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <textarea rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Contact end -->

    <!-- Edit Contact -->
    <div class="modal fade" id="edit_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Contact</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="contacts.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="Melinda Allman">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="+41 45879 2548">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="melindaallaman@example.com">
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <textarea rows="4" class="form-control">User friendly design makes it easy to learn and navigate, even for those new to digital records.</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Contact end -->

    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-light me-3" data-bs-dismiss="modal">Cancel</a>
                        <a href="contacts.php" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
<?php }?>

<?php if ($page == 'lab-results.php') {   ?>
    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">View Report</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between invoice-logo flex-wrap gap-2 mb-4">
                        <img src="assets/img/logo-dark.svg" class="logo-white" alt="invoice logo">
                        <img src="assets/img/logo.svg" class="logo-dark" alt="invoice logo">
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                        <div>
                            <h6 class="mb-2">Dream’s Medical Center</h6>
                            <p class="mb-1 text-dark fw-medium">Dr. Sandy Maria</p>
                            <p class="fs-13 mb-0">MD Aerologist. MBBS,MS</p>
                        </div>
                        <div class="text-lg-end">
                            <p class="mb-1"><span class="text-dark fw-medium">Test Type : </span>CBC</p>
                            <p class="mb-1"><span class="text-dark fw-medium">Collected On: </span>25 Jan 2024, 10:00 AM</p>
                            <p class="mb-0"><span class="text-dark fw-medium">Reported On: </span>25 Jan 2024, 11:00 AM</p>
                        </div>
                    </div>
                    <h6 class="mb-2">Patient Details</h6>
                    <div class="mb-4 bg-light rounded p-2 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h6 class="fs-14 fw-medium mb-0">M. Reyan Verol</h6>
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0">28Y /  Male</p>
                            <p class="mb-0">Blood : O+ve</p>
                            <p class="mb-0">Type : Outpatient</p>
                        </div>
                    </div>
                    <h6 class="mb-2">Complete Blood Count(CBC)</h6>
                    <div class="table-responsive table-nowrap mb-4">
                        <table class="table mb-0 rounded border">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-white">Investigation</th>
                                    <th class="text-white">Result</th>
                                    <th class="text-white">Reference Value</th>
                                    <th class="text-white">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4"><h6 class="mb-0 fs-14 fw-semibold">Differntial WBC Count</h6></td>
                                </tr>
                                <tr>
                                    <td>Neutrophils</td>
                                    <td>75</td>
                                    <td>50 - 62</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Lymphocytes</td>
                                    <td>90</td>
                                    <td>20 - 40</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Eosinophils</td>
                                    <td>60</td>
                                    <td>00 - 06</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Monocytes</td>
                                    <td>60</td>
                                    <td>00 - 10</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Basophils</td>
                                    <td>95</td>
                                    <td>00 - 02</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><h6 class="mb-0 fs-14 fw-semibold">Platelet Count</h6></td>
                                </tr>
                                <tr>
                                    <td>Platelet Count</td>
                                    <td>150000</td>
                                    <td>150000 - 410000</td>
                                    <td>cumm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">
                        <div>
                            <img src="assets/img/icons/qr-code.svg" alt="qr-code">
                        </div>
                        <div class="text-end">
                            <div class="mb-1 signature"><img src="assets/img/icons/signature.svg" alt="sign"></div>
                            <p class="mb-0">Authorized Sign</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white position-relative w-100 z-1" data-bs-dismiss="modal">Cancel</a>
                        <a href="lab-results.php" class="btn btn-danger position-relative w-100 z-1" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'medical-results.php') {   ?>
    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">View Report</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between invoice-logo flex-wrap gap-2 mb-4">
                        <img src="assets/img/logo-dark.svg" class="logo-white" alt="invoice logo">
                        <img src="assets/img/logo.svg" class="logo-dark" alt="invoice logo">
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                        <div>
                            <h6 class="mb-2">Dream’s Medical Center</h6>
                            <p class="mb-1 text-dark fw-medium">Dr. Sandy Maria</p>
                            <p class="fs-13 mb-0">MD Aerologist. MBBS,MS</p>
                        </div>
                        <div class="text-lg-end">
                            <p class="mb-1"><span class="text-dark fw-medium">Test Type : </span>CBC</p>
                            <p class="mb-1"><span class="text-dark fw-medium">Collected On: </span>25 Jan 2024, 10:00 AM</p>
                            <p class="mb-0"><span class="text-dark fw-medium">Reported On: </span>25 Jan 2024, 11:00 AM</p>
                        </div>
                    </div>
                    <h6 class="mb-2">Patient Details</h6>
                    <div class="mb-4 bg-light rounded p-2 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h6 class="fs-14 fw-medium mb-0">M. Reyan Verol</h6>
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0">28Y /  Male</p>
                            <p class="mb-0">Blood : O+ve</p>
                            <p class="mb-0">Type : Outpatient</p>
                        </div>
                    </div>
                    <h6 class="mb-2">Complete Blood Count(CBC)</h6>
                    <div class="table-responsive table-nowrap mb-4">
                        <table class="table mb-0 rounded border">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-white">Investigation</th>
                                    <th class="text-white">Result</th>
                                    <th class="text-white">Reference Value</th>
                                    <th class="text-white">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4"><h6 class="mb-0 fs-14 fw-semibold">Differntial WBC Count</h6></td>
                                </tr>
                                <tr>
                                    <td>Neutrophils</td>
                                    <td>75</td>
                                    <td>50 - 62</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Lymphocytes</td>
                                    <td>90</td>
                                    <td>20 - 40</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Eosinophils</td>
                                    <td>60</td>
                                    <td>00 - 06</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Monocytes</td>
                                    <td>60</td>
                                    <td>00 - 10</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td>Basophils</td>
                                    <td>95</td>
                                    <td>00 - 02</td>
                                    <td>%</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><h6 class="mb-0 fs-14 fw-semibold">Platelet Count</h6></td>
                                </tr>
                                <tr>
                                    <td>Platelet Count</td>
                                    <td>150000</td>
                                    <td>150000 - 410000</td>
                                    <td>cumm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">
                        <div>
                            <img src="assets/img/icons/qr-code.svg" alt="qr-code">
                        </div>
                        <div class="text-end">
                            <div class="mb-1 signature"><img src="assets/img/icons/signature.svg" alt="sign"></div>
                            <p class="mb-0">Authorized Sign</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white position-relative z-1 w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="medical-results.php" class="btn btn-danger position-relative z-1  w-100" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'manage-invoices.php') {   ?>
    <!-- Start Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this invoice?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="manage-invoices.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->
<?php }?> 

<?php if ($page == 'pharmacy.php') {   ?>
    <!-- Start view Modal -->
    <div id="add_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="pharmacy.php">
                    <div class="modal-body">                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="text" class="form-control" value="#PR00011" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Offer Price</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Purchase Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expire Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Unit</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>mg</option>
                                        <option>ml</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End view Modal -->

    <!-- Start view Modal -->
    <div id="edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <form action="pharmacy.php">
                    <div class="modal-body">                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="text" class="form-control" value="#PR00011" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="Acetaminophen">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" value="$150">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Offer Price</label>
                                    <input type="text" class="form-control" value="$130">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Purchase Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expire Date</label>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Unit</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option selected>mg</option>
                                        <option>ml</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="text" class="form-control" value="400">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="4">Prevents heart attacks and strokes</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="form-label mb-0">Status</label>
                                    <label class="d-flex align-items-center justify-content-xl-end form-switch">
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked="">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End view Modal -->

    <!-- Start view Modal -->
    <div id="view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Product Detail</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <div class="modal-body">
                    <h6 class="mb-2">Basic Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <h6 class="fs-14 fw-semibold mb-1">Name</h6>
                                <p class="mb-0">Acetaminophen 20mg</p>
                            </div>
                            <div class="mb-2">
                                <h6 class="fs-14 fw-semibold mb-1">Price</h6>
                                <p class="mb-0">$400 (20% Offer)</p>
                            </div>
                            <div class="mb-2">
                                <h6 class="fs-14 fw-semibold mb-1">Purchased Date</h6>
                                <p class="mb-0">17 Jun 2025</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <h6 class="fs-14 fw-semibold mb-1">Expiry Date</h6>
                                <p class="mb-0">22 Jun 2025</p>
                            </div>
                            <div class="mb-2">
                                <h6 class="fs-14 fw-semibold mb-1">Stock</h6>
                                <p class="mb-0">200</p>
                            </div>
                            <div class="mb-2">
                                <h6 class="fs-14 fw-semibold mb-1">Status</h6>
                                <span class="badge badge-soft-success">In Stock</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h6 class="mb-2">Description</h6>
                        <p class="mb-0">Provide detailed instructions on how to use prescribed medications. Include dosage, frequency, and any specific application guidelines.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-danger rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to delete?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white position-relative z-1 w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="pharmacy.php" class="btn btn-danger position-relative z-1 w-100" data-bs-dismiss="modal">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'staffs.php') {   ?>
    <!-- Add New Staff -->
    <div class="modal fade" id="add_staff">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Add  New Staff</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="staffs.php">
                    <div class="modal-body">

                        <ul class="nav nav-tabs nav-item-primary nav-solid-primary mb-3 pb-3 border-bottom border-0 gap-3">
                            <li class="nav-item"><a class="nav-link rounded btn btn-md active" href="#basic-staff" data-bs-toggle="tab">Basic Info</a></li>
                            <li class="nav-item"><a class="nav-link rounded btn btn-md" href="#salery-staff" data-bs-toggle="tab">Salary Info</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Item 1 -->
                            <div class="tab-pane show active" id="basic-staff">
                                <!-- start row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Profile Image<span class="text-danger ms-1">*</span>  </label>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="flex-shrink-0">
                                                    <div class="position-relative d-flex align-items-center border rounded">
                                                        <img src="assets/img/avatars/avatar-39.jpg" class="avatar avatar-xxl" alt="staff">
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex flex-column align-items-start">
                                                    <div class="d-inline-flex align-items-start gap-2">
                                                        <div class="drag-upload-btn btn btn-dark position-relative mb-2">
                                                            <i class="ti ti-arrows-exchange-2 me-1"></i>Change Image
                                                            <input type="file" class="form-control image-sign" multiple="">
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="btn btn-danger d-flex align-items-center gap-1"> <i class="ti ti-trash"></i>  Remove</a>
                                                        </div>
                                                    </div>
                                                    <span class="fs-13 text-body">Use JPEG, PNG, or GIF. Best size: 200x200 pixels. Keep it under 5MB</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">ID</label>
                                            <input type="text" class="form-control" value="#SF0002" disabled>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select class="select">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">DOB</label>
                                            <div class="input-group w-auto input-group-flat">
                                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                <span class="input-group-text">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3"> 
                                            <label class="form-label">Designation</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>Client for Pharmacy</option>
                                                <option>Cleaner</option>
                                                <option>Assitant</option>
                                                <option>Roadways</option>
                                                <option>Turner</option>                                                           
                                                <option>Pharmacist</option>
                                                <option>Assitant</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date</label>
                                            <div class="input-group w-auto input-group-flat">
                                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                <span class="input-group-text">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Staff Type</label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Permanent</option>
                                                <option>Temporary</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job Type</label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Full Time</option>
                                                <option>Half Time</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>New York City</option>
                                                <option>Los Angeles</option>
                                                <option>Chicago</option>
                                                <option>Houston</option>
                                                <option>Phoenix</option>                                                           
                                                <option>Philadelphia</option>
                                                <option>San Antonio</option>
                                                <option>San Diego</option>
                                                <option>Dallas</option>
                                                <option>San Jose</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>California</option>
                                                <option>Texas</option>
                                                <option>Florida</option>
                                                <option>New York</option>
                                                <option>Illinois</option>                                                           
                                                <option>Pennsylvania</option>
                                                <option>Ohio</option>
                                                <option>Georgia</option>
                                                <option>North Carolina</option>
                                                <option>Michigan</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>United States</option>
                                                <option>Canada</option>
                                                <option>United Kingdom</option>
                                                <option>Australia</option>
                                                <option>Germany</option>                                                           
                                                <option>France</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                                <option>Brazil</option>
                                                <option>South Africa</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Pin Code</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-12">
                                        <div class="form-check form-switch d-flex align-items-center justify-content-between gap-2 ps-0 mb-0">
                                            <label class="form-label mb-0" for="status">Status</label>
                                            <input class="form-check-input" type="checkbox" role="switch" id="status">
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>

                            <!-- Item 2 -->
                            <div class="tab-pane" id="salery-staff">
                                <div>
                                    <!-- start row -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Net Salary</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <h6 class="mb-3">Earnings</h6>
                                    <!-- start row -->
                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Basic</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">DA</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">HRA</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Conveyance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Allowance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Medical Allowance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div>
                                                <label class="form-label">Others</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <h6 class="mb-3">Deductions</h6>
                                    <!-- start row -->
                                    <div class="row row-gap-3">
                                        <div class="col-lg-3 col-md-6">
                                            <div>
                                                <label class="form-label">TDS</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div>
                                                <label class="form-label">PF</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div>
                                                <label class="form-label">Leave</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div>
                                                <label class="form-label">Prof . Tax</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div>
                                                <label class="form-label">Labour Welfare</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-0">
                                                <label class="form-label">Others</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Todo end -->

    <!-- Edit Staff -->
    <div class="modal fade" id="edit_staff">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Edit Staff</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="staffs.php">
                    <div class="modal-body">
                        <ul class="nav nav-tabs nav-item-primary nav-solid-primary mb-3 pb-3 border-bottom border-0 gap-3">
                            <li class="nav-item"><a class="nav-link rounded btn btn-md active" href="#basic-editstaff" data-bs-toggle="tab">Basic Info</a></li>
                            <li class="nav-item"><a class="nav-link rounded btn btn-md" href="#salery-editstaff" data-bs-toggle="tab">Salary Info</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Item 1 -->
                            <div class="tab-pane show active" id="basic-editstaff">
                                <!-- start row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Profile Image<span class="text-danger ms-1">*</span>  </label>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="flex-shrink-0">
                                                    <div class="position-relative d-flex align-items-center border rounded">
                                                        <img src="assets/img/avatars/avatar-39.jpg" class="avatar avatar-xxl" alt="staff">
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex flex-column align-items-start">
                                                    <div class="d-inline-flex align-items-start gap-2">
                                                        <div class="drag-upload-btn btn btn-dark position-relative mb-2">
                                                            <i class="ti ti-arrows-exchange-2 me-1"></i>Change Image
                                                            <input type="file" class="form-control image-sign" multiple="">
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="btn btn-danger d-flex align-items-center gap-1"> <i class="ti ti-trash"></i>  Remove</a>
                                                        </div>
                                                    </div>
                                                    <span class="fs-13 text-body">Use JPEG, PNG, or GIF. Best size: 200x200 pixels. Keep it under 5MB</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">ID</label>
                                            <input type="text" class="form-control" value="#SF0025" disabled>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="Benjamin Clark">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select class="select">
                                                <option selected>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">DOB</label>
                                            <div class="input-group w-auto input-group-flat">
                                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" value="01/01/1995">
                                                <span class="input-group-text">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="phone" value="(819) 277-3810">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="benjamin@example.com">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Designation</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option selected>Client for Pharmacy</option>
                                                <option>Cleaner</option>
                                                <option>Assitant</option>
                                                <option>Roadways</option>
                                                <option>Turner</option>                                                           
                                                <option>Pharmacist</option>
                                                <option>Assitant</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date</label>
                                            <div class="input-group w-auto input-group-flat">
                                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" value="17/06/2024">
                                                <span class="input-group-text">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Staff Type</label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option selected>Permanent</option>
                                                <option>Temporary</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job Type</label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option selected>Full Time</option>
                                                <option>Half Time</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" value="10 Elizabeth town Plaza">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" value="Downer’s Grove">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>New York City</option>
                                                <option selected>Los Angeles</option>
                                                <option>Chicago</option>
                                                <option>Houston</option>
                                                <option>Phoenix</option>                                                           
                                                <option>Philadelphia</option>
                                                <option>San Antonio</option>
                                                <option>San Diego</option>
                                                <option>Dallas</option>
                                                <option>San Jose</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>California</option>
                                                <option selected>Texas</option>
                                                <option>Florida</option>
                                                <option>New York</option>
                                                <option>Illinois</option>                                                           
                                                <option>Pennsylvania</option>
                                                <option>Ohio</option>
                                                <option>Georgia</option>
                                                <option>North Carolina</option>
                                                <option>Michigan</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option>United States</option>
                                                <option selected>Canada</option>
                                                <option>United Kingdom</option>
                                                <option>Australia</option>
                                                <option>Germany</option>                                                           
                                                <option>France</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                                <option>Brazil</option>
                                                <option>South Africa</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Pin Code</label>
                                            <input type="text" class="form-control" value="07202">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-12">
                                        <div class="form-check form-switch d-flex align-items-center justify-content-between gap-2 ps-0">
                                            <label class="form-label mb-0" for="statusone">Status</label>
                                            <input class="form-check-input" type="checkbox" role="switch" id="statusone" checked>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>

                            <!-- Item 2 -->
                            <div class="tab-pane" id="salery-editstaff">
                                <div>
                                    <!-- start row -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Net Salary</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <h6 class="mb-3">Earnings</h6>
                                    <!-- start row -->
                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Basic</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">DA</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">HRA</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Conveyance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Allowance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Medical Allowance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Others</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <h6 class="mb-3">Deductions</h6>
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">TDS</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">PF</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Leave</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Prof . Tax</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-md-0 mb-3">
                                                <label class="form-label">Labour Welfare</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-0">
                                                <label class="form-label">Others</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit end -->

    <!-- Staff Deatils -->
    <div class="modal fade" id="view_staff">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Staff Details</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="staffs.php">
                    <div class="modal-body">

                        <div class="d-flex align-items-center mb-4">
                            <a href="javascript:void(0);" class="avatar avatar-xxl flex-shrink-0">
                                <img src="assets/img/avatars/avatar-28.jpg" class="rounded" alt="staff">
                            </a>
                            <div class="ms-3">
                                <div>
                                    <span class="badge badge-sm badge-soft-pink mb-2">#SF0025</span>
                                    <h6 class="fw-semibold text-truncate mb-1"><a href="javascript:void(0);">Benjamin Clark</a></h6>
                                    <p class="fs-13 mb-0">Date Joined : 17 Jun 2024</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs nav-item-primary nav-solid-primary mb-3 gap-3">
                            <li class="nav-item"><a class="nav-link rounded btn btn-md active" href="#basic-viewstaff" data-bs-toggle="tab">Basic Info</a></li>
                            <li class="nav-item"><a class="nav-link rounded btn btn-md" href="#salery-viewstaff" data-bs-toggle="tab">Salary Info</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Item 1 -->
                            <div class="tab-pane show active" id="basic-viewstaff">
                                <h6 class="mb-3">Basic Information</h6>
                                <div class="row row-gap-2">
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Job Type</h6>
                                        <p class="fs-13 mb-0 text-truncate">Full Time</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Mobile</h6>
                                        <p class="fs-13 mb-0 text-truncate">+1 48902 78194</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Email</h6>
                                        <p class="fs-13 mb-0 text-truncate">benjamiin@example.com</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Gender</h6>
                                        <p class="fs-13 mb-0 text-truncate">Male</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">DOB</h6>
                                        <p class="fs-13 mb-0 text-truncate">01 Jan 1995</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Staff Type</h6>
                                        <p class="fs-13 mb-0 text-truncate">Permanent</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <h6 class="fw-semibold fs-14 mb-2">Address</h6>
                                        <p class="mb-0 fs13">10 Elizabethtown Plaza, Downers Grove, Elizabeth UK07202 </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="tab-pane" id="salery-viewstaff">
                                <!-- table start -->
                                <div class="table-responsive table-nowrap">
                                    <table class="table mb-0 border">
                                        <thead>
                                            <tr>
                                                <th class="no-sort">Transaction ID</th>
                                                <th class="no-sort">Amount</th>
                                                <th class="no-sort">Credit On</th>
                                                <th class="no-sort">Salary For</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578193</a></td>
                                                <td>$18600</td>
                                                <td>16 Feb 2025</td>
                                                <td>Jan 2025</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578192</a></td>
                                                <td>$18600</td>
                                                <td>18 Jan 2025</td>
                                                <td>Dec 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578190</a></td>
                                                <td>$18600</td>
                                                <td>15 Dec 2024</td>
                                                <td>Nov 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578189</a></td>
                                                <td>$18600</td>
                                                <td>17 Nov 2024</td>
                                                <td> Oct 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578188</a></td>
                                                <td>$18600</td>
                                                <td>15 Oct 2024</td>
                                                <td>Sep 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578187</a></td>
                                                <td>$18600</td>
                                                <td>18 Sep 2024</td>
                                                <td>Aug 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578186</a></td>
                                                <td>$18600</td>
                                                <td>15 Aug 2024</td>
                                                <td>Jul 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0);">#TN578185</a></td>
                                                <td>$18600</td>
                                                <td>16 Jul 2024</td>
                                                <td>Jun 2024</td>
                                                <td class="text-end">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu p-2">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                                        </li>  
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                        </li>                                      
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- table start -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit end -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="staffs.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'notifications.php') {   ?>
    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="notifications.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'security-settings.php') {   ?>
    <!-- Start Password Modal -->
    <div class="modal fade" id="change_password">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Change Password</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="security-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Current Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat pass-group">
                                <input type="password" class="form-control pass-input">
                                <span class="input-group-text toggle-password ">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat pass-group">
                                <input type="password" class="form-control pass-input">
                                <span class="input-group-text toggle-password ">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat pass-group">
                                <input type="password" class="form-control pass-input">
                                <span class="input-group-text toggle-password ">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Password Modal -->

    <!-- Start Authentication Modal -->
    <div class="modal fade" id="two-factor">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">SMS Two Factor Authentication</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="security-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="password" class="form-control">
                        </div>
                        <p class="mb-0">
                            By providing your phone number, you agree to receive text messages from Figma to enable two-factor authentication when you log in.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Authentication Modal -->

    <!-- Start Change Phone Number Modal -->
    <div class="modal fade" id="change_phonenumber">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Change Phone Number</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="security-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Current Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control w-100" name="phone" placeholder="123-456-7890">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control w-100" name="phone" placeholder="987-654-3218">
                        </div>                        

                        <div class="mb-0">
                            <label class="form-label">Current Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat pass-group">
                                <input type="password" class="form-control pass-input">
                                <span class="input-group-text toggle-password ">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Change Phone Number Modal -->

    <!-- Start Mail Modal -->
    <div class="modal fade" id="change_email">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Change Email</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="security-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Current Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="john@example.com">
                        </div>

                        <div class="mb-3">
                             <label class="form-label">New Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="baskar@example.com">
                        </div>                        

                        <div class="mb-3">
                            <label class="form-label">Current Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-flat pass-group">
                                <input type="password" class="form-control pass-input">
                                <span class="input-group-text toggle-password ">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Mail Modal -->

    <!-- Start Browse Modal -->
    <div class="modal fade" id="browse_device">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Browsers & Devices</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive table-nowrap">
                        <table class="table border mb-0">
                            <thead>
                                <tr>
                                    <th>Device</th>
                                    <th>Date</th>
                                    <th>IP Address</th>
                                    <th>Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chrome - Windows</td>
                                    <td>17 Jun 2025</td>
                                    <td>232.222.12.72</td>
                                    <td>New York / USA</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light me-1"><i class="ti ti-logout"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Safari Macos</td>
                                    <td>10 Jun 2025</td>
                                    <td>224.111.12.75</td>
                                    <td>New York / USA</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light me-1"><i class="ti ti-logout"></i></a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Firefox Windows</td>
                                    <td>22 May 2025</td>
                                    <td>111.222.13.28</td>
                                    <td>New York / USA</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light me-1"><i class="ti ti-logout"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Safari Macos
                                    </td>
                                    <td>15 Jan 2025</td>
                                    <td>333.555.10.54</td>
                                    <td>New York / USA</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light me-1"><i class="ti ti-logout"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Browse Modal -->

    <!-- Start Deactive Modal -->
    <div id="deactivate_account" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4 text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <div class="mb-4">     
                        <h5 class="mb-1"> Deactivate Account </h5>
                        <p class="mb-0">Are you sure you want to deactivate ? </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">Keep Active</a>
                        <a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">Yes, Deactivate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Deactive Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="staffs.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start Delete Account -->
    <div class="modal fade" id="delete_account">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Delete Account</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="security-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <h6 class="fs-14 fw-semibold mb-2"> Why Are You Deleting Your Account? </h6>
                            <p class="fs-13 mb-0"> We're sorry to see you go! To help us improve, please let us know your reason for deleting your account</p>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <div class="form-check mb-1">
                                <input type="radio" name="customRadio" class="form-check-input">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-14 fw-medium">No longer using the service </h6>
                                <p class="fs-13 mb-0">I no longer need this service and won’t be using it in the future.</p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <div class="form-check mb-1">
                            <input type="radio" name="customRadio" class="form-check-input">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-14 fw-medium">Privacy concerns</h6>
                                <p class="fs-13 mb-0">I am concerned about how my data is handled and want to remove</p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <div class="form-check mb-1">
                            <input type="radio" name="customRadio" class="form-check-input">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-14 fw-medium">Too many notifications/emails </h6>
                                <p class="fs-13 mb-0">I’m overwhelmed by the volume of notifications or emails</p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <div class="form-check mb-1">
                            <input type="radio" name="customRadio" class="form-check-input">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-14 fw-medium">Poor user experience</h6>
                                <p class="fs-13 mb-0">I’ve had difficulty using the platform, and it didn’t meet my expectations</p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <div class="form-check mb-1">
                            <input type="radio" name="customRadio" class="form-check-input">
                            </div>
                            <div>
                                <h6 class="mb-0 fs-14 fw-medium">Other (Please specify)</h6>
                            </div>
                        </div>
                        <div class="">
                            <label class="form-label mb-1">Reason</label>
                            <textarea rows="4" placeholder="Reason" class="form-control "></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Delete Modal -->
<?php }?> 

<?php if ($page == 'user-permissions-settings.php') {   ?>
    <!-- Start Add Modal -->
    <div class="modal fade" id="add_role">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Add New Role</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="user-permissions-settings.php">
                    <div class="modal-body">
                        <div>
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

    <!-- Start Edit Modal -->
    <div class="modal fade" id="edit_role">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Edit Role</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="user-permissions-settings.php">
                    <div class="modal-body">
                        <div class="mb-0">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" value="Doctor">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Role Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="user-permissions-settings.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->
<?php }?> 

<?php if ($page == 'plans-billings-settings.php') {   ?>
    <!-- Start Upgrade -->
    <div id="upgrade" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Upgrade Plan</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>      
                </div>
                <div class="modal-body">				
                    <!-- Start Pricing -->
                    <div>
                        <div class="text-center">
                            <div class="d-inline-flex py-2 px-3 rounded-pill bg-light justify-content-center align-items-center mb-3">
                                <p class="mb-0 me-2">Monthly</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                                <p class="mb-0">Yearly</p>
                            </div>
                        </div>

                        <!-- start row -->
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-6 col-sm-12">
                                <div class="card border rounded mb-3">
                                    <div class="card-body">
                                        <div class="pricing-content mb-3">
                                            <div class="mb-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Basic</h6>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <h3 class="d-flex align-items-center">$99<span class="fs-14 fw-normal text-dark me-2">/month</span></h3>
                                                <span class="badge bg-info rounded text-truncate">Only 10 Users</span>
                                            </div>
                                            <p class="mb-3 text-truncate line-clamb-2">Best for Freelancers & small businesses needs simple invoicing.</p>
                                            <a href="#" class="d-flex align-items-center justify-content-center btn border text-dark rounded w-100 mb-3" data-bs-toggle="modal" data-bs-target="#checkout">
                                                <i class="ti ti-shopping-cart me-1"></i> Buy Plan
                                            </a>
                                            <div class="price-hdr text-center">
                                                <h6 class="fs-12 fw-semibold text-dark me-2 ms-2 mb-0">FEATURES</h6>
                                            </div>
                                        </div>									
                                        <div class="mt-3">
                                            <div>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    1 Business Account + 1 User
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    14+ Invoice templates
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Collect Online Payments
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    40+ Reports & Insights
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Variants
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Add custom fields & charges
                                                </span>
                                                <span class="text-dark d-flex align-items-center">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Convert documents
                                                </span>
                                            </div>
                                        </div>							
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-4 col-lg-6 col-sm-12">
                                <div class="card border rounded mb-3">
                                    <div class="card-body">
                                        <div class="pricing-content mb-3">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Standard</h6>
                                                <span class="badge bg-primary text-white">Most Popular</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <h3 class="d-inline-flex align-items-center">$199<span class="fs-14 fw-normal text-gray-9 me-2">/month</span></h3>
                                                <span class="badge bg-info text-truncate">Only 50 Users</span>
                                            </div>
                                            <p class="mb-3 text-truncate line-clamb-2">Growing businesses managing recurring invoices & reports.</p>
                                            <a href="#" class="d-flex align-items-center justify-content-center btn bg-primary border text-white rounded w-100 mb-3" data-bs-toggle="modal" data-bs-target="#checkout">
                                                <i class="ti ti-shopping-cart me-1"></i> Current Plan
                                            </a>
                                            <div class="price-hdr text-center">
                                                <h6 class="fs-12 fw-semibold text-dark me-2 ms-2 mb-0">FEATURES</h6>
                                            </div>
                                        </div>									
                                        <div class="mt-3">
                                            <div>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    1 Business Account + 1 User
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Bulk downloads
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Multiple Price lists
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    User Activity
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Bulk edits
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Multiple Warehouses
                                                </span>
                                                <span class="text-dark d-flex align-items-center">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Online Store
                                                </span>
                                            </div>
                                        </div>								
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-4 col-lg-6 col-sm-12">
                                <div class="card border rounded mb-3">
                                    <div class="card-body">
                                        <div class="pricing-content mb-3">
                                            <div class="mb-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Business</h6>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <h3 class="d-inline-flex align-items-center text-nowrap">$299<span class="fs-14 fw-normal text-gray-9 me-2">/month</span></h3>
                                                <span class="badge bg-info text-truncate">Only 75 Users</span>
                                            </div>
                                            <p class="mb-3 text-truncate line-clamb-2">Best for Large sales teams requiring automation & integrations.</p>
                                            <a href="#" class="d-flex align-items-center justify-content-center btn border taxt-gray-100 rounded w-100 mb-3" data-bs-toggle="modal" data-bs-target="#checkout">
                                                <i class="ti ti-shopping-cart me-1"></i> Buy Plan</a>
                                            <div class="price-hdr text-center">
                                                <h6 class="fs-12 fw-semibold text-dark me-2 ms-2 mb-0">FEATURES</h6>
                                            </div>
                                        </div>									
                                        <div class="mt-3">
                                            <div>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    POS Billing
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Batch & Expiry
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Serial Number/ IMEI Tracking
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Subscription/ Recurring
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Product Grouping
                                                </span>
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Additional CESS
                                                </span>
                                                <span class="text-dark d-flex align-items-center">
                                                    <i class="ti ti-circle-check-filled text-success me-2"></i>
                                                    Bank Reconciliation
                                                </span>
                                            </div>
                                        </div>								
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- End Pricing -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Upgrade -->

    <!-- Start Mew Modal -->
    <div id="new_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Add New Card</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>     
                </div>
                <form action="plans-billings-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name on the Card  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Card Number  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                             <label class="form-label">Expire Date <span class="text-danger">*</span></label>
                            <div class="input-group w-auto input-group-flat">
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                <span class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">CVV <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Mew Modal -->

    <!-- Start Edit Modal -->
    <div id="edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Edit Card</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>     
                </div>
                <form action="plans-billings-settings.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name on the Card  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="James Peterson">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Card Number  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="5396 5250 1908 1568">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expire Date <span class="text-danger">*</span></label>
                            <div class="input-group w-auto input-group-flat">
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" value="12/12/2025">
                                <span class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CVV <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="556">
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <label class="form-label mb-0">Status</label>
                            <label class="d-flex align-items-center form-switch ps-2">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <!-- Start Delete Modal  -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirm Deletion</h6>
                    <p class="mb-3">Are you sure you want to delete this?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        <a href="staffs.php" class="btn btn-danger w-100">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal  -->

    <!-- Start Checkout Modal -->
    <div id="checkout" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">Checkout</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>       
                </div>
                <div class="modal-body">

                    <form action="#">
                        <!-- start row -->
                        <div class="row">
                            <div class="col-lg-6 mb-lg-0 mb-3">
                                <!-- Items -->
                                <div class="border-bottom mb-4 pb-4">
                                    <h6 class="mb-3">Basic Information</h6>
                                    <!-- start row -->
                                    <div class="row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-0">
                                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-0">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-0 w-100">
                                                <label class="form-label d-block">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control w-100" name="phone">
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>

                                <!-- Items -->
                                <div class="">
                                    <h6 class="mb-3">Address </h6>
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">State <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3 mb-lg-0">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-0 w-100">
                                                <label class="form-label d-block">Postal Code<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div> 
                             
                            <div class="col-lg-6 bg-light rounded pt-2 position-relative">
                                <div class="card border-0">
                                    <div class="card-body bg-white ">
                                        <h6 class="mb-3">Subscription Details </h6>
                                        <p class="d-flex align-items-center justify-content-between flex-wrap gap-2 text-body mb-2 fs-14">Plan Name  <span class="text-dark">Basic</span> </p>
                                        <p class="d-flex align-items-center justify-content-between flex-wrap gap-2 text-body mb-2 fs-14">Plan Amount  <span class="text-dark">$99.00 </span> </p>
                                        <p class="d-flex align-items-center justify-content-between flex-wrap gap-2 text-body mb-2 fs-14">Tax  <span class="text-dark">$0.00 </span> </p>
                                        <p class="d-flex align-items-center justify-content-between flex-wrap gap-2 text-body mb-2 fs-14">Total  <span class="text-dark">$99.00 </span> </p>
                                    </div>
                                </div>

                                <div class="position-lg-absolute bottom-0 start-0 mb px-3 w-100">
                                    <div class="d-flex align-items-center p-2 rounded badge-soft-success gap-2 justify-content-center">
                                        <div class="">
                                            <img src="assets/img/icons/shield-img.png" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fs-14 mb-1">100% Cashback Guarantee</h6>
                                            <p class="mb-0 fs-14"> We Protect Your Money</p>
                                        </div>
                                    </div>

                                    <div class="text-btn mt-4">
                                        <a href="" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#success_modal">Pay $99.00</a>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div> 
                        <!-- end row -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Checkout Modal -->

     <!-- Start Success Modal  -->
    <div class="modal fade" id="success_modal">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-3 position-relative z-1">
                        <img src="assets/img/icons/success-imgs.svg" alt="" class="img-fluid">
                    </div>
                    <h5 class="mb-1">Payment Successful</h5>
                    <p class="mb-3">Your purchase of the Basic Plan has been completed with Reference Number #12559845</p>
                    <div class="d-flex justify-content-center">
                        <a href="plans-billings-settings.php" class="btn btn-white position-relative z-1 me-2" data-bs-dismiss="modal">Back to Plans</a>
                        <a href="" class="btn btn-primary position-relative z-1" data-bs-toggle="modal" data-bs-target="#view_details">Purchase Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Success Modal  -->

    <!-- Start view Modal -->
    <div id="view_details" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="text-dark modal-title fw-bold text-truncate">View Details</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>        
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-end flex-wrap gap-2 mb-4">                       
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <a href="javascript:void(0);" class="btn btn-outline-light"><i class="ti ti-file-download me-1"></i>Download PDF</a>
                            <a href="javascript:void(0);" class="btn btn-outline-light"><i class="ti ti-printer me-1"></i>Print</a>
                        </div>
                    </div>
                    <div class="p-3 rounded bg-light mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-3">
                                <div>
                                    <h4 class="mb-0">Subscription Invoice</h4>
                                </div>
                                <div class="invoice-logo">
                                    <img src="assets/img/logo-dark.svg" alt="logo-dark" class="logo-white">
                                    <img src="assets/img/logo.svg" class="logo-dark" alt="logo">
                                </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between row-gap-3 flex-wrap">
                            <div>
                                <h6 class="mb-2">To</h6>
                                <p class="mb-1">Name : <span class="text-dark">James Carter</span></p>
                                <p class="mb-1">Address : <span class="text-dark">8/15 Francis street, UK 454787</span></p>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-2">ID</h6>
                                <p class="mb-1">Invoiced ID : <span class="text-dark">#IV0020</span></p>
                                <p class="mb-1">Invoice Date : : <span class="text-dark">17 Jun 2025</span></p>
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-3">Product / Service Items</h5>
                    <div class="table-responsive table-nowrap rounded border border-bottom-0 mb-4">
                        <table class="table mb-0 rounded">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-white">#</th>
                                    <th class="text-white">Product/Service</th>
                                    <th class="text-white">Quantity</th>
                                    <th class="text-white">Rate</th>
                                    <th class="text-white">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="text-dark">Basic</td>
                                    <td>2</td>
                                    <td>$99.00</td>
                                    <td>$99.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fw-semibold text-dark mb-0 fs-14">Amount</p>
                                <p class="fw-semibold text-dark mb-0">$99.00</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fw-semibold text-dark mb-0">CGST (9%)</p>
                                <p class="fw-semibold text-dark mb-0">$12</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fw-semibold text-dark mb-0">SGST (9%)</p>
                                <p class="fw-semibold text-dark mb-0">$12</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                <p class="fw-semibold text-dark mb-0">Discount (25%)</p>
                                <p class="fw-semibold text-danger mb-0">- $24</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="mb-0">Total (USD)</h5>
                                <h5 class="mb-0">$99.00</h5>
                            </div>
                        </div>
                    </div>
                    <p><span class="text-dark fw-semibold">Total Amount In Words</span> Ninety Nine Dollars</p>
                    <div class="border-top mt-4 pt-4 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                        <div>
                            <p class="mb-2">Scan to the pay</p>
                            <img src="./assets/img/icons/qr-code.svg" alt="img">
                        </div>
                        <div>
                        <h6 class="mb-2">Payment Info</h6>
                        <p class="fw-medium mb-2">Debit Card <span class="fw-semibold text-dark float-end ms-5">4654 **** **** 4195</span></p>
                        <p class="fw-medium mb-0">Amount <span class="fw-semibold text-dark float-end">$1,972.43</span></p>
                        </div>
                    </div>
                    <div class="border-top mt-4 pt-4 d-flex justify-content-between align-items-center gap-3 flex-wrap">
                        <div>
                            <h6 class="fw-semibold fs-14 mb-1">Terms and Conditions</h6>
                            <ol class="ps-3 mb-3">
                                <li class="mb-1">Goods once sold cannot be taken back or exchanged.</li>
                                <li>We are not the manufacturers the company provides warranty as per its terms</li>
                            </ol>
                            <h6 class="fw-semibold fs-14 mb-1">Notes</h6>
                            <p class="fs-13 mb-0">All charges are final and include applicable taxes, fees, and additional costs</p>
                        </div>
                        <div class="text-center">
                            <img src="./assets/img/icons/signature.svg" alt="img" class="signature">
                            <h6 class="fw-semibold fs-14 mb-1">Ted M. Davis</h6>
                            <p class="mb-0">Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view Modal -->
<?php }?>

<?php if ($page == 'video-call.php') {   ?>
    <!-- Add Participent -->
    <div class="modal fade" id="add_participent">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Participant</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="video-call.php">
                    <div class="modal-body">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <span class="input-group-text">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-57.jpg" alt="user" class="img-fluid rounded-circle"></span>
                            <div>
                                <h6 class="fs-14 mb-1">James Hong </h6>
                                <p class="mb-0">+1 54789 31795</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-58.jpg" alt="user" class="img-fluid rounded-circle"></span>
                            <div>
                                <h6 class="fs-14 mb-1">Daniel Williams </h6>
                                <p class="mb-0">+1 19325 24785</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-59.jpg" alt="user" class="img-fluid rounded-circle"></span>
                            <div>
                                <h6 class="fs-14 mb-1">Olivia Miller </h6>
                                <p class="mb-0">+1 34852 34985</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"> Add Participant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Participent -->
<?php }?>

<?php if ($page == 'voice-call.php') {   ?>
    <!-- Add Participent -->
    <div class="modal fade" id="add_participent">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Participant</h5>
                    <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
                </div>
                <form action="voice-call.php">
                    <div class="modal-body">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <span class="input-group-text">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-57.jpg" alt="user" class="img-fluid rounded-circle"></span>
                            <div>
                                <h6 class="fs-14 mb-1">James Hong </h6>
                                <p class="mb-0">+1 54789 31795</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-58.jpg" alt="user" class="img-fluid rounded-circle"></span>
                            <div>
                                <h6 class="fs-14 mb-1">Daniel Williams </h6>
                                <p class="mb-0">+1 19325 24785</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-59.jpg" alt="user" class="img-fluid rounded-circle"></span>
                            <div>
                                <h6 class="fs-14 mb-1">Olivia Miller </h6>
                                <p class="mb-0">+1 34852 34985</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Participant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Participent -->
<?php }?>