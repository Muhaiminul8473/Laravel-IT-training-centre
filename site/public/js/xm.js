function SendContact(contact_name,contact_mobile,contact_email,contact_msg) {

    if(contact_name.length==0){
        $('#contactSendBtnId').html('আপনার নাম লিখুন !');
        setTimeout(function () {
            $('#contactSendBtnId').html('পাঠিয়ে দিন');
        },2000)
    }
    else if(contact_mobile.length==0){
        $('#contactSendBtnId').html('আপনার মোবাইল নং লিখুন !')
        setTimeout(function () {
            $('#contactSendBtnId').html('পাঠিয়ে দিন');
        },2000)
    }
    else if(contact_email.length==0){
        $('#contactSendBtnId').html('আপনার ইমেইল  লিখুন !')
        setTimeout(function () {
            $('#contactSendBtnId').html('পাঠিয়ে দিন');
        },2000)
    }
    else if(contact_msg.length==0){

        $('#contactSendBtnId').html('আপনার মেসেজ লিখুন !')
        setTimeout(function () {
            $('#contactSendBtnId').html('পাঠিয়ে দিন');
        },2000)

    }
    else {
        $('#contactSendBtnId').html('পাঠানো হচ্ছে...')
        axios.post('/contactSend',{
            contact_name:contact_name,
            contact_mobile:contact_mobile,
            contact_email:contact_email,
            contact_msg: contact_msg,
        })
            .then(function (response) {
                if(response.status==200){
                    if(response.data==1){
                        $('#contactSendBtnId').html('অনুরোধ সফল হয়েছে')
                        setTimeout(function () {
                            $('#contactSendBtnId').html('পাঠিয়ে দিন');
                        },3000)

                    }
                    else{
                        $('#contactSendBtnId').html('অনুরোধ ব্যার্থ হয়েছে ! আবার চেষ্টা করুন ')
                        setTimeout(function () {
                            $('#contactSendBtnId').html('পাঠিয়ে দিন');
                        },3000)
                    }
                }
                else {
                    $('#contactSendBtnId').html('অনুরোধ ব্যার্থ হয়েছে ! আবার চেষ্টা করুন ')
                    setTimeout(function () {
                        $('#contactSendBtnId').html('পাঠিয়ে দিন');
                    },3000)
                }

            }).catch(function (error) {
            $('#contactSendBtnId').html('আবার চেষ্টা করুন')
            setTimeout(function () {
                $('#contactSendBtnId').html('পাঠিয়ে দিন');
            },3000)
        })
    }
}