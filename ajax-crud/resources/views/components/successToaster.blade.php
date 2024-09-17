@props(['message' => 'successfull!'])
<div class="inline-block fixed  top-3 right-3  mr-5" id="toaster">
    <div class="bg-green-200   rounded-t p-3 inline-block" id="toaster_success">
        {{ $message }}
    </div>
    <div class="rounded-b overflow-hidden bg-white h-[2px]">
        <div id="progressBar" class="bg-green-600 h-[2px] w-[0%] text-center"></div>
    </div>
    
    <button id="" class="hide_t absolute top-0.5 right-1 ">
        <span class="">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </span>
    </button>
</div>


<script>
    $(document).ready(function(){
            $('#toaster').hide();


            $(".hide_t").on('click', function(){
                $('#toaster').hide();
            });
    });
</script>