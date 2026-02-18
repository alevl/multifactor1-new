<div>
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="pt-16 w-full items-center text-center" style="padding-left: 33%">
        {!! QrCode::size(250)->generate('https://multifactor1.com/registro/'.$id_maquina)!!}

        <div class="mt-4 font-bold" style="width:250px; left:0; padding-left: 0%">
            Code Machine : {{ $id_maquina }}
        </div>    
    </div>
</div>