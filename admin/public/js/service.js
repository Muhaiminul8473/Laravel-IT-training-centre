

    function getServiceData(){

       
        axios.get('/getServicesData')
        .then(function(response){

            if(response.status==200){
            $('#maindiv').removeClass('d-none');
            $('#loaderdiv').addClass('d-none');
            $('#serviceDataTable').DataTable().destroy();
            $('#service_table').empty();
            var serviceData= response.data;
            $.each(serviceData,function(i,item){
                $(' <tr>').html(

                    "<td><img class='table-img' src="+serviceData[i].service_img+"> </td>"+
                    "<td>"+serviceData[i].service_name+"</td>"+
                    "<td>"+serviceData[i].service_des+"</td>"+
                    "<td><a class='serviceEditbtn'  data-id="+serviceData[i].id+" ><i class='fas fa-edit'></i></a> </td>"+
                    "<td><a class='serviceDeletebtn' data-id="+serviceData[i].id+" ><i class='fas fa-trash-alt'></i></a> </td>"

                ).appendTo('#service_table');
            })
            //service delete starts
            $('.serviceDeletebtn').click(function(){
                var id= $(this).data('id');
                $('#serviceDeleteId').html(id);
                $('#serviceDeleteConfirm').attr('data-id',id);
                $('#deleteModal').modal('show');
            });



            //Service edit starts
            $('.serviceEditbtn').click(function(){
                var id= $(this).data('id');
                $('#serviceEditId').html(id);
                $('#serviceEditConfirm').attr('data-id',id);
                serviceUpdateDetails(id);

                $('#editModal').modal('show');
            });

                $('#serviceDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');

        }

            else{
                $('#wrongdiv').removeClass('d-none')
            }
        })

        .catch(function(error){
            $('#wrongdiv').removeClass('d-none')

        });

    }



    $('#serviceDeleteConfirm').click(function(){
        //var id = $(this).data('id');
        var id = $('#serviceDeleteId').html();
        serviceDelete(id);
    })
    //function for deleting service
    function serviceDelete(deleteId){
        $('#serviceDeleteConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/serviceDelete',{id:deleteId})
        .then(function(response){

        if(response.status==200){
            $('#serviceDeleteConfirm').html("Add")

            if(response.data==1){
                $('#deleteModal').modal('hide');
                toastr.success('Deleted successfully');
                getServiceData();
            }
            else
            {
                $('#deleteModal').modal('hide');
                toastr.error('Delete failed');
                getServiceData();
            }
        }

        else{
            $('#deleteModal').modal('hide');
            toastr.error('Something Went Wrong !');
         }  

        })
    

        .catch(function(error){
            toastr.error('Something went wrong');
        })


    }

    //function for getting service details for update
    function serviceUpdateDetails(detailsId){

        axios.post('/serviceDetails',{id:detailsId})
        .then(function(response){
            if(response.status==200){
                $('#Editloader').addClass('d-none');
                $('.modal-body').removeClass('d-none');
                
                var jsondata = response.data;
                $('#serviceNameId').val(jsondata[0].service_name);
                $('#serviceDescId').val(jsondata[0].service_des);
                $('#serviceImgId').val(jsondata[0].service_img);
            }
            else{
                $('#Editloader').addClass('d-none');
                $('#Editwrong').removeClass('d-none');
            }
        })

        .catch(function(error){
            $('#Editwrong').removeClass('d-none');
        })


    }

    $('#serviceEditConfirm').click(function(){
        //var id = $(this).data('id');
        var id = $('#serviceEditId').html();
        var name = $('#serviceNameId').val();
        var des = $('#serviceDescId').val();
        var img = $('#serviceImgId').val();
        serviceUpdate(id,name,des,img);
    })

    //Service update post
    function serviceUpdate(id,name,des,img){

        
        if(name.length==0){
            toastr.error('Service name is empty');
        }
        else if(des.length==0){
            toastr.error('Service decription is empty');
        }
        else if(img.length==0){
            toastr.error('Service image is empty');
        }

        else
        {
            $('#serviceEditConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
            axios.post('/serviceUpdate',{
                id:id,
                name:name,
                des:des,
                img:img })
        
                .then(function(response){
                    $('#serviceEditConfirm').html("Add")
                    if(response.data==1){
                        $('#editModal').modal('hide');
                        toastr.success('Updated successfully');
                        getServiceData();
                    }
                    else{
                        $('#editModal').modal('hide');
                        toastr.error('Update failed');
                        getServiceData();
                    }
                })
        
                .catch(function(error){
                    console(error);
                })
        


        }


    }

    $('#Addbtn').click(function(){
        $('#addModal').modal('show');
        

    });

    //Service add section starts
    $('#serviceAddConfirm').click(function(){

        var name= $('#serviceNameAddId').val();
        var des= $('#serviceDescAddId').val();
        var img= $('#serviceImgAddId').val();
        serviceAdd(name,des,img);


    })

    function serviceAdd(name,des,img){

        if(name.length==0){
            toastr.error('Service name is empty');
        }
        else if(des.length==0){
            toastr.error('Service decription is empty');
        }
        else if(img.length==0){
            toastr.error('Service image is empty');
        }

        else
        {
            $('#serviceAddConfirm').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
            axios.post('/serviceAdd',{
                name:name,
                des:des,
                img:img })
        
                .then(function(response){
                    $('#serviceEditConfirm').html("Save changes")
                    if(response.data==1){
                        $('#addModal').modal('hide');
                        toastr.success('Service added successfully');
                        $('#serviceNameAddId').val("")
                        $('#serviceDescAddId').val("")
                        $('#serviceImgAddId').val("")
                        getServiceData();
                        
                    }
                    else{
                        $('#addModal').modal('hide');
                        toastr.error('Failed to add service');
                        getServiceData();
                    }
                })
        
                .catch(function(error){
                    toastr.error('Something went wrong!');
                })
        


        }


    }