
<x-layout>
    <div class="mx-auto w-[1200px]" id="main-body">
        
        <!-- nav section  -->
        <div class="py-10">
            <nav class="flex justify-between px-5">
                <div>
                    <div class="text-2xl font-semibold">Student Create</div>
                </div>
                <div>
                    <a href="{{route('students.create')}}" id="model-show" class="border px-3 py-2 rounded bg-blue-700 text-white">Add Student</a>
                </div>
            </nav>
        </div>

        <!-- main section  -->
        <div>
            <table class="w-full table_content">
                <thead class="text-left">
                    <tr class="border-b">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody class="text-left">
                    @forelse($students as $key => $student)
                        <tr class="bg-gray-200 p-2">
                            <td>{{ ++$key }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td><img class="w-[100px] h-[100px] photo" src="{{ asset( "storage/".$student->photo ) }}" alt=""></td>
                            <td class="flex gap-2 py-2">
                                <a href="{{ route('students.show', ['student' => $student->id ]) }}" class="show_d bg-blue-400 hover:bg-blue-600 p-1 rounded ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                                <a href="{{route('students.edit', ['student' => $student->id ])}}"id="edit_modal" class="edit_modal bg-green-400 hover:bg-green-600 p-1 rounded ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <form class="delete_d" action="{{route('students.destroy', ['student' => $student->id ])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button href="" class="bg-red-400 hover:bg-red-600 p-1 rounded ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Data</td>
                        </tr>
                    @endforelse
                
                </tbody>
            </table>
        </div>

    </div>


    <div class="alert hidden">
        <h2>Are you sure delete data?</h2>
        <div class="flex float-right gap-3">
            <button class="no rounded bg-red-300 px-4 py-2">No</button>
            <button class="yes rounded bg-green-300 px-4 py-2">Yes</button>
        
        </div>
    </div>





    <script>
        $(document).ready(function(){
            // ajax call

            console.log(location.href);
            

            // create form 
            $('#model-show').on('click', function(e){
                e.preventDefault();
                let modalUrl = $(this).attr('href');
                
                $.ajax({
                    type: 'GET',
                    url: modalUrl,
                    success: function(response){
                        $('#modal-content').html(response);
                        $('#model').slideDown(500).addClass('blur-none');
                        $('#main-body').not('#model').addClass('blur-sm');
                    }
                });
            });



            // store data
            $(document).on('submit', '#submit', function(e){
                e.preventDefault();

                $('#error_name').hide();
                $('#error_email').hide();
                $('#error_photo').hide();

             
                let formData = new FormData(this);
                let modalUrl = $('#submit').attr('action');
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: modalUrl,
                    data: formData,
                    processData:false,
                    contentType: false,
                    success: function(res){
                        if(res.status === 400){
                            for(let error in res.errors){
                                let error_id = 'error_'+error;
                               console.log();
                                $('#'+error_id).text(res.errors[error][0]);
                                $('#'+error_id).show();
                            }
                        }
                        if(res.status === 200){
                            console.log(res.success);
                            $('#toaster_success').text(res.success);
                            $('#toaster').show(function(){
                                let progressBar = $('#progressBar');
                                let width = 0;
                    
                                let intervalSet =setInterval(function(){
                                    width+=1;
                                    if(width==100){
                                        clearInterval(intervalSet);
                                        $('#toaster').hide();
                                        progressBar.text('complited');
                                    }
                    
                                    progressBar.css('width', width+"%");
                                    progressBar.text(width + "%")
                                }, 50);
                            });
                            $('#model').hide();
                            $('#main-body').removeClass('blur-sm');
                            console.log(location.href);
                            $('.table_content').load(location.href+ ' .table_content');
                            console.log('data insert successfully');
                        }
                    },
                    error: function (xhr){
                        console.log(xhr.responseText);
                    }
                    
                });
             });


             // load image file to preview
             $(document).on('change', '#photo', function(e){
                e.preventDefault();
                const $file = this.files[0];
                
                if($file){
                    let reader = new FileReader();
                    reader.onload = function(e){
                        $('.img_preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL($file);
                    $('.img_preview').removeClass('hidden');
                }
             });


             // edit form
             $('.edit_modal').on('click', function(e){
                e.preventDefault();

                let getURL = $(this).attr('href');
                
                $.ajax({
                    type: "GET",
                    url: getURL,
                    success: function(res){
                        $('#modal-content').html(res);
                        $('#model').slideDown(500).addClass('blur-none');
                        $('#main-body').not('#model').addClass('blur-sm');
                    }
                });
             });


             // update data
             $(document).on('submit', '#update', function(e){
                e.preventDefault();

                $('#error_name').hide();
                $('#error_email').hide();
                $('#error_photo').hide();

                let formData = new FormData(this);
                let getURL = $(this).attr('action');

                $.ajax({
                    type: "POST",
                    url:getURL,
                    data: formData,
                    contentType:false,
                    processData:false,
                    success: function(res){
                        if(res.status === 400){
                            for(let error in res.errors){
                                let error_id = "error_"+error;
                                $('#'+error_id).text(res.errors[error]);
                                $('#'+error_id).show();
                            }
                        }
                        if(res.status === 200){
                            $('#toaster_success').text(res.success);
                            $('#toaster').show(function(){
                                let progressBar = $('#progressBar');
                                let width = 0;
                    
                                let intervalSet =setInterval(function(){
                                    width+=1;
                                    if(width==100){
                                        clearInterval(intervalSet);
                                        $('#toaster').hide();
                                        progressBar.text('complited');
                                    }
                    
                                    progressBar.css('width', width+"%");
                                    progressBar.text(width + "%")
                                }, 50);
                            });
                            $('#model').hide();
                            $('#main-body').removeClass('blur-sm');
                            $('.table_content').load(location.href+ ' .table_content');
                        }
                    }
                });
             });


             // delete method
             $(document).on('submit', '.delete_d', function(e){
                console.log('cliking....');
                e.preventDefault();
                $('#toaster').hide();

                let d_data = $('.alert').html();

                let formData = new FormData(this);
                let getURL = $(this).attr('action');
         

                $('#model').show();
            
                $("#modal-content").html(d_data);

                $('.yes').on('click', function(e){
                    e.preventDefault();
            
                    $.ajax({
                        type: "POST",
                        url: getURL,
                        data:formData,
                        contentType:false,
                        processData:false,
                        success: function(res){
                            $('#model').hide();
                            $('#toaster_success').text(res.success);
                            $('#toaster').show(function(){
                                let progressBar = $('#progressBar');
                                let width = 0;
                    
                                let intervalSet =setInterval(function(){
                                    width+=1;
                                    if(width==100){
                                        clearInterval(intervalSet);
                                        $('#toaster').hide();
                                        progressBar.text('complited');
                                    }
                    
                                    progressBar.css('width', width+"%");
                                    progressBar.text(width + "%")
                                }, 50);
                            });
                            $('.table_content').load(location.href+ ' .table_content');
                        }
                    });
                });
             });


             // profile view
             $(document).on('click', '.show_d', function(e){
                e.preventDefault();

                let getURL = $(this).attr('href');
                
                $.ajax({
                    type: "GET",
                    url:getURL,
                    success: function(res){
                        $('#modal-content').html(res);
                        $('#model').slideDown(500).addClass('blur-none');
                        $('#main-body').not('#model').addClass('blur-sm');
                    }
                });
             });

        
        });
    </script>
</x-layout>