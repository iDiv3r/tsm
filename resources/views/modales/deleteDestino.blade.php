<!-- Main modal -->
<div id="deleteDestino" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  border border-t-orange-500 border-t-4">
            <!-- Modal header -->
            <div class="flex items-center justify-between  p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Eliminar destino
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editarDestino">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="/adminDestinosdele">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <p class="text-center block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Estas seguro que quieres eliminar el Destino: México?</p>
                    <p class=" text-center block mb-2 text-sm font-medium text-gray-900 dark:text-white">Esta acción no se puede revertir</p>
                </div>
                <button type="submit" class= " text-white flex   justify-self-center bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Eliminar destino
                </button>
            </form>
        </div>
    </div>
</div> 