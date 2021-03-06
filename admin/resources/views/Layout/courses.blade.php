@extends('Layout.app')
@section('content')

<div class="container d-none" id="maindivCourse">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="Addcoursebtn" class="btn btn-success">Add courses</button>
            <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Fee</th>
                        <th class="th-sm">Classes</th>
                        <th class="th-sm">Details</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="course_table">




                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="container mt-5" id="loaderdivCourse">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="spinner-grow text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
<div class="container d-none" id="wrongdivCourse">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Something went wrong!</h3>
        </div>
    </div>
</div>

<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="CourseNameId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Name">
                            <input id="CourseDesId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Description">
                            <input id="CourseFeeId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Fee">
                            <input id="CourseEnrollId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Enroll">
                        </div>
                        <div class="col-md-6">
                            <input id="CourseClassId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Class">
                            <input id="CourseLinkId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Link">
                            <input id="CourseImgId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog" role="document">


        <div class="modal-content">
            <div class="modal-body text-center">
                <h5>Do you want to delete?</h5>
                <h5 id="courseDeleteId d-none" class="mt-4 "> </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                <button id="courseDeleteConfirm" data-id="" type="button" class="btn btn-primary btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="EditCoursewrong" class="col-md-12 text-center d-none">
                    <h3>Something went wrong!</h3>
                </div>
                <h5 class="modal-title">Update course information</h5>
                <h5 id="courseEditId" class="mt-4 d-none "> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="CourseNameupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Name">
                            <input id="CourseDesupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Description">
                            <input id="CourseFeeupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Fee">
                            <input id="CourseEnrollupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Enroll">
                        </div>
                        <div class="col-md-6">
                            <input id="CourseClassupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Class">
                            <input id="CourseLinkupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Link">
                            <input id="CourseImgupdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="CourseEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    getCourseData();
</script>

@endsection