@extends('admin.main.index')

@section('title')
    Upload Certificate
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card d-flex justify-content">

                    <div class="card-header">
                        <h4 class="card-title">Upload Certificate</h4>
                    </div>
                    <div class="card-body">
                        <div class="progress" id="progress_bar" style="display:none; height:50px;">
                            <div class="progress-bar bg-success" id="progress_bar_process" role="progressbar" style="width:0%; height:50px;">0%

                            </div>
                        </div>
                        <div id="uploaded_image" class="row mt-5"></div>
                       <div class="row">
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-10">
                                <div id="drag_drop">
                                    Drag & Drop File Here
                                </div>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                       </div>
                       <div style="text-align: center">
                            <h5 class="text text-danger mt-5">Or Select</h5>
                            <form id="cert_form" enctype="multipart/form-data">
                                @csrf
                                <input id="cert_input" name="image" style="border: 1px solid #d1d1d1; padding: 5px 15px;" type="file" id="">
                            </form>
                       </div>
                    </div>

                </div>



            </div>
        </div>
    </div>

@endsection


@section('scripts')

<script>

    function _(element)
    {
        return document.getElementById(element);
    }

    _('drag_drop').ondragover = function(event)
    {
        this.style.borderColor = '#333';
        return false;
    }

    _('drag_drop').ondragleave = function(event)
    {
        this.style.borderColor = '#ccc';
        return false;
    }


    _('drag_drop').ondrop = function(event)
    {
        event.preventDefault();

        var form_data  = new FormData();

        var image_number = 1;

        var error = '';

        var drop_files = event.dataTransfer.files;

        for(var count = 0; count < drop_files.length; count++)
        {
            if(!['image/jpeg', 'image/png', 'video/mp4'].includes(drop_files[count].type))
            {
                error += '<div class="alert alert-danger"><b>'+image_number+'</b> Selected File must be .jpg or .png Only.</div>';
            }
            else
            {
                form_data.append("images[]", drop_files[count]);
            }

            image_number++;
        }

        if(error != '')
        {
            _('uploaded_image').innerHTML = error;
            _('drag_drop').style.borderColor = '#ccc';
        }
        else
        {
            _('progress_bar').style.display = 'block';





            var ajax_request = new XMLHttpRequest();



            ajax_request.open("post", "/administrator/certificate/{{Crypt::encrypt($user_id)}}/{{Crypt::encrypt($course_id)}}");

            ajax_request.upload.addEventListener('progress', function(event){


                var percent_completed = Math.round((event.loaded / event.total) * 100);

                _('progress_bar_process').style.width = percent_completed + '%';

                _('progress_bar_process').innerHTML = percent_completed + '% completed';

            });

            ajax_request.addEventListener('load', function(event){

                _('uploaded_image').innerHTML = '<div class="alert alert-success">Files Uploaded Successfully</div>';

                _('drag_drop').style.borderColor = '#ccc';

            });

            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            ajax_request.setRequestHeader('X-CSRF-TOKEN', token);
            ajax_request.send(form_data);
        }
    }

</script>

<script>
    $(document).ready(function() {
        $('#cert_input').on('change', function() {
            // Get the selected file
            // var file = $(this).prop('files')[0];

            $('#cert_form').submit(function(event) {
                event.preventDefault();

                var formData = new FormData(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/administrator/certificate-db/{{Crypt::encrypt($user_id)}}/{{Crypt::encrypt($course_id)}}',
                    method: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        alert(data.message);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#cert_form').submit();
        });
    });
</script>
@endsection
