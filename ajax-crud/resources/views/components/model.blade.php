
<div id="model" class="fixed z-10 top-[100px] right-1/2 translate-x-1/2 bg-blue-200 opacity-2 w-1/3 p-5 border border-slate-300">
    
    <div id="modal-content">

    </div>
    <button id="model-hide" class="absolute top-1 right-1 ">
        <span class="">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </span>
    </button>
</div>


<script>
    $(document).ready(function(){
        $('#model').hide(0);

        $('#model-hide').on('click', function(event){
            event.preventDefault();
            $('#model').slideUp(500);
            $('#main-body').not('#model').removeClass('blur-sm');
        });


    });
</script>