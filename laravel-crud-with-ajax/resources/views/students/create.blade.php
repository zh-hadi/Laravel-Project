<h2 class="text-center text-xl uppercase mb-5 underline">Create Student</h2>
<form  id="submit" class="space-y-5" action="{{route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="border p-2">
        <small id="error_name" class="text-red-400"></small>
    </div>
    <div class="flex flex-col">
        <label for="">Email</label>
        <input type="text" name="email" id="email" class="border p-2">
        <small id="error_email" class="text-red-400"></small>
    </div>
    <div class="flex flex-col">
        <label for="">Photo</label>
        <input type="file" name="photo" id="photo" class="border p-2">
        <img class="img_preview w-[100px] h-[100px] hidden" src="" alt="">
        <small id="error_photo" class="text-red-400"></small>
    </div>
    <div class="float-right">
        <!-- <button type="none" id="model-hide" class="p-2 border rounded bg-red-400 hover:bg-red-500">Cencel</button> -->
        <button type="submit" class="p-2 border rounded bg-green-300 hover:bg-green-400">Create Student</button>
    </div>
</form>

