function getCourseData(){

    axios.get('/getCourseData')
    .then(function(response){

        if(response.status==200){

        $('#maindivCourse').removeClass('d-none');
        $('#loaderdivCourse').addClass('d-none');
        $('#courseDataTable').DataTable().destroy();
        $('#course_table').empty();
        var courseData= response.data;
        $.each(courseData,function(i,item){
            $(' <tr>').html(

                "<td><img class='table-img' src="+courseData[i].course_img+"> </td>"+
                "<td>"+courseData[i].course_name+"</td>"+
                "<td>"+courseData[i].course_fee+"</td>"+
                "<td>"+courseData[i].course_totalclass+"</td>"+
                "<td><a class='courseDetailsbtn'  data-id="+courseData[i].id+" ><i class='fas fa-eye'></i></a> </td>"+
                "<td><a class='courseEditbtn'  data-id="+courseData[i].id+" ><i class='fas fa-edit'></i></a> </td>"+
                "<td><a class='courseDeletebtn' data-id="+courseData[i].id+" ><i class='fas fa-trash-alt'></i></a> </td>"

            ).appendTo('#course_table');
        })
        //course delete starts
        $('.courseDeletebtn').click(function(){
            var id= $(this).data('id');
            $('#courseDeleteId').html(id);
            //$('#courseDeleteConfirm').attr('data-id',id);
            $('#deleteCourseModal').modal('show');
        });



        //course edit starts
       $('.courseEditbtn').click(function(){
            var id= $(this).data('id');
            $('#courseEditId').html(id);
            $('#courseEditConfirm').attr('data-id',id);
            courseUpdateDetails(id);

            $('#editCourseModal').modal('show');
        });

            $('#courseDataTable').DataTable({"order":false});
            $('.dataTables_length').addClass('bs-select');

    }

        else{
            
            $('#wrongdivCourse').removeClass('d-none')
        }
    })

    .catch(function(error){
        alert(error);

    });

}

$('#Addcoursebtn').click(function(){
    $('#addCourseModal').modal('show');

});

//Course add confirm
$('#CourseAddConfirmBtn').click(function(){
    var CourseName=$('#CourseNameId').val();
    var CourseDes=$('#CourseDesId').val();
    var CourseFee=$('#CourseFeeId').val();
    var CourseEnroll=$('#CourseEnrollId').val();
    var CourseClass=$('#CourseClassId').val();
    var CourseLink=$('#CourseLinkId').val();
    var CourseImg=$('#CourseImgId').val();
    //alert($CourseDes)
    courseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg);
    
})

function courseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg){

    alert("HI")
    //alert(CourseName+CourseDes+CourseFee+CourseEnroll+CourseClass+CourseLink+CourseImg)
    if(CourseName.length==0){
        toastr.error('Course name is empty');
    }
    else if(CourseDes.length==0){
        toastr.error('Course decription is empty');
    }
    else if(CourseFee.length==0){
        toastr.error('Course  is empty');
    }
    else if(CourseEnroll.length==0){
        toastr.error('Enrollment field is empty');
    }
    else if(CourseClass.length==0){
        toastr.error('Class section is empty');
    }
    else if(CourseLink.length==0){
        toastr.error('Course link is empty');
    }
    else if(CourseImg.length==0){
        toastr.error('Course image is empty');
    }

    else
    {
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/courseAdd',{
            CourseName:CourseName,
            CourseDes:CourseDes,
            CourseFee:CourseFee,
            CourseEnroll:CourseEnroll,
            CourseClass:CourseClass,
            CourseLink:CourseLink,
            CourseImg:CourseImg
        
        })
    
            .then(function(response){
                $('#CourseAddConfirmBtn').html("Save changes")
                if(response.data==1){
                    $('#addCourseModal').modal('hide');
                    toastr.success('Course added successfully');
                    $('#CourseNameId').val("")
                    $('#CourseDesId').val("")
                    $('#CourseFeeId').val("")
                    $('#CourseEnrollId').val("")
                    $('#CourseClassId').val("")
                    $('#CourseLinkId').val("")
                    $('#CourseImgId').val("")

                    getCourseData();
                    
                }
                else{
                    $('#addCourseModal').modal('hide');
                    toastr.error('Failed to add Course');
                    getCourseData();
                }
            })
    
            .catch(function(error){
                toastr.error('Something went wrong!');
            })
    


    }


}

$('#courseDeleteConfirm').click(function(){
    //var id = $(this).data('id');
    var id = $('#courseDeleteId').html();
    courseDelete(id);
})
//function for deleting service
function courseDelete(deleteId){
    $('#courseDeleteConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
    axios.post('/courseDelete',{id:deleteId})
    .then(function(response){

    if(response.status==200){
        $('#courseDeleteConfirm').html("Delete")

        if(response.data==1){
            $('#deleteCourseModal').modal('hide');
            toastr.success('Deleted successfully');
            getCourseData();
        }
        else
        {
            $('#deleteCourseModal').modal('hide');
            toastr.error('Delete failed');
            getCourseData();
        }
    }

    else{
        $('#deleteCourseModal').modal('hide');
        toastr.error('Something Went Wrong !');
     }  

    })


    .catch(function(error){
        toastr.error('Something went wrong');
    })


}
//Getting course details for update
function courseUpdateDetails(detailsId){

    axios.post('/courseDetails',{id:detailsId})
    .then(function(response){
        if(response.status==200){
            
            
            var jsondata = response.data;
            $('#CourseNameupdateId').val(jsondata[0].course_name);
            $('#CourseDesupdateId').val(jsondata[0].course_des);
            $('#CourseFeeupdateId').val(jsondata[0].course_fee);
            $('#CourseEnrollupdateId').val(jsondata[0].course_totalenroll);
            $('#CourseClassupdateId').val(jsondata[0].course_totalclass);
            $('#CourseLinkupdateId').val(jsondata[0].course_link);
            $('#CourseImgupdateId').val(jsondata[0].course_img);
        }

    })

    .catch(function(error){
        $('#EditCoursewrong').removeClass('d-none');
    })


}

$('#CourseEditConfirmBtn').click(function(){
    //var id = $(this).data('id');
    var id = $('#courseEditId').html();
    var name = $('#CourseNameupdateId').val();
    var des = $('#CourseDesupdateId').val();
    var fee = $('#CourseFeeupdateId').val();
    var enroll = $('#CourseEnrollupdateId').val();
    var classes = $('#CourseClassupdateId').val();
    var link = $('#CourseLinkupdateId').val();
    var img = $('#CourseImgupdateId').val();
    courseUpdate(id,name,des,fee,enroll,classes,link,img);
})

//Course update post
function courseUpdate(id,name,des,fee,enroll,classes,link,img){

        
    if(name.length==0){
        toastr.error('Course name is empty');
    }
    else if(des.length==0){
        toastr.error('Course decription is empty');
    }
    else if(fee.length==0){
        toastr.error('Course fee is empty');
    }
    else if(enroll.length==0){
        toastr.error('Course enroll is empty');
    }
    else if(classes.length==0){
        toastr.error('course total class is empty');
    }
    else if(link.length==0){
        toastr.error('course link is empty');
    }
    else if(img.length==0){
        toastr.error('course image is empty');
    }

    else
    {
        $('#CourseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/courseUpdate',{
            id:id,
            name:name,
            des:des,
            fee:fee,
            enroll:enroll,
            classes,classes,
            link:link,
            img:img })
    
            .then(function(response){
                $('#CourseEditConfirmBtn').html("Save changes")
                if(response.data==1){
                    $('#editCourseModal').modal('hide');
                    toastr.success('Updated successfully');
                    getCourseData();
                }
                else{
                    $('#editCourseModal').modal('hide');
                    toastr.error('Update failed');
                    getCourseData();
                }
            })
    
            .catch(function(error){
                console(error);
            })
    


    }


}
