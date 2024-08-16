<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reivew app</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        .btn {
            @apply px-3 py-2 border rounded text-xl  border-slate-200 hover:bg-gray-100;
        }
        .input{
            @apply border border-slate-200 px-3 py-2 w-full text-xl rounded;
        }
    </style>
</head>
<body>
    <div class="w-[960px] mx-auto">

        {{$slot}}
    </div>
</body>
</html>